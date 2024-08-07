<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function __construct()
    {
        $this->model = new User;
        $this->table = $this->model->table;
        $this->loc = 'user.';
    }

    public function index()
    {
        $user = User::all();
        return view("user.index", compact('user'));
    }

    public function register()
    {
        $user = User::all();
        return view("user.register", compact('user'));
    }

    // public function login()
    // {
    //     $user = User::all();
    //     return view("user.login", compact('user'));
    // }

    public function login()
    {
        $user = User::all();
        return view("user.login", compact('user'));
    }

    public function detail(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            return view("user.detail", compact('user'));
        } else {
            return redirect()->route("user.index")->withErrors(['errors' => 'Data User tidak valid']);
        }
    }

    public function changePassView()
    {
        return view("user.change_password");
    }

    function store(Request $request)
    {

        $validation = $request->validate([
            'nama_user' => 'required|max:255',
            'email' => [
                'required',
                Rule::notIn(User::where('email', $request->email)->pluck('email')->toArray())
            ],
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'profile_picture' => 'nullable|image|max:2048',
            'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,jpg|max:2048'
        ]);

        $model = $this->model;
        $model->id = $request->id;
        $model->nama_user = $request->nama_user;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->profile_picture = $request->profile_picture;
        $profile_picture = '';
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $text = $request->profile_picture->getClientOriginalExtension();
            $profile_picture = "foto-" . time() . "." . $text;
            $request->profile_picture->storeAs("public", $profile_picture);
            $model->profile_picture = $profile_picture;
        };
        $model->bukti_pembayaran = $request->bukti_pembayaran;
        $bukti_pembayaran = '';
        if ($request->hasFile('bukti_pembayaran') && $request->file('bukti_pembayaran')->isValid()) {
            $text = $request->bukti_pembayaran->getClientOriginalExtension();
            $bukti_pembayaran = "foto-" . time() . "." . $text;
            $request->bukti_pembayaran->storeAs("public", $bukti_pembayaran);
            $model->bukti_pembayaran = $bukti_pembayaran;
        };
        $model->id_role = 2;
        $model->status = "Pending";
        $model->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->route('user.login');
    }

    public function validateUser(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->status = 'Aktif';
            $user->save();

            return redirect()->back()->with('status', 'User status updated to Aktif.');
        }

        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }

    public function rejectUser(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->status = 'Ditolak';
            $user->save();

            return redirect()->back()->with('status', 'User status updated to Ditolak');
        }

        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            return view("user.edit", compact('user'));
        } else {
            return redirect()->route("user.index")->withErrors(['errors' => 'Data user tidak valid']);
        }
    }

    public function update(Request $request, $id)
    {

        $validation = $request->validate([
            'nama_user' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
            'password' => 'nullable',
            'tanggal_lahir' => 'required',
            'profile_picture' => 'nullable|image|max:2048',
            'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        ]);	

        $model = $this->model->where('id', $id)->first();
        if (!$model) {
            $request->session()->flash("error", "Data tidak ditemukan");
            return redirect()->route('user.index');
        }
        $model->nama_user = $request->nama_user;
        $model->email = $request->email;
        if ($request->filled('password')) {
            $model->password = bcrypt($request->password);
        }
        $model->tanggal_lahir = $request->tanggal_lahir;
        if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            if ($model->profile_picture && Storage::exists('public/' . $model->profile_picture)) {
                Storage::delete('public/' . $model->profile_picture);
            }
            $text = $request->profile_picture->getClientOriginalExtension();
            $profile_picture = "foto-" . time() . "." . $text;
            $request->profile_picture->storeAs("public", $profile_picture);
            $model->profile_picture = $profile_picture;
        }
        if ($request->hasFile('bukti_pembayaran') && $request->file('bukti_pembayaran')->isValid()) {
            if ($model->bukti_pembayaran && Storage::exists('public/' . $model->bukti_pembayaran)) {
                Storage::delete('public/' . $model->bukti_pembayaran);
            }
            $text = $request->bukti_pembayaran->getClientOriginalExtension();
            $bukti_pembayaran = "bukti-" . time() . "." . $text;
            $request->bukti_pembayaran->storeAs("public", $bukti_pembayaran);
            $model->bukti_pembayaran = $bukti_pembayaran;
        }
        $model->status = $request->status ?? $model->status;
        $model->save();

        $request->session()->flash("info", "Data berhasil diperbarui");
        return redirect()->route('user.detail', ['id' => $id]); 
    }

    function destroy($id)
    {
        $destroy = get_class($this->model)::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}

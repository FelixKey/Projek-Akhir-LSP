<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    function update(Request $request, $id)
    {
        // $this->authorize('update',User::class);
        $update = get_class($this->model)::find($id);
        $update->id = $request->id;
        $update->nama_user = $request->nama_user;
        $update->password = bcrypt($request->password);
        $update->tanggal_lahir = $request->tanggal_lahir;
        $update->profile_picture = $request->profile_picture;
        $update->bukti_pembayaran = $request->bukti_pembayaran;
        $update->id_role = $request->id_role;
        $update->status = $request->status;
        $update->save();
        $request->session()->flash("info", "Data berhasil diubah");
        return redirect()->route('user.index');
    }

    function destroy($id)
    {
        // $this->authorize('delete',User::class);
        $destroy = get_class($this->model)::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}

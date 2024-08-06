<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
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
            $user = User::all();
            return view("user.detail", compact('user'));
        } else {
            return redirect()->route("user.index")->withErrors(['errors' => 'Data User tidak valid']);
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user = User::all();
            return view("user.edit", compact('user'));
        } else {
            return redirect()->route("user.index")->withErrors(['errors' => 'Data User tidak valid']);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {

            $validation = $request->validate([
                'nama_user' => 'required|max:255',
                'email' => [
                    'required',
                    Rule::notIn(User::where([['email', '=', $request->email], ['id', '<>', $user->id]])->pluck('email')->toArray())
                ],
                'bukti_pembayaran' => 'required'
            ]);

            $user->nama_user = $request->nama_user;
            $user->email = $request->email;
            $user->bukti_pembayaran = $request->email;
            $user->save();

            $request->session()->flash("info", "Data user $request->nama_user berhasil diupdate!");
            return redirect()->route("user.index");
        } else {
            return redirect()->route("user.index")->withErrors(['errors' => 'Data User tidak valid']);
        }
    }

    public function changePassView()
    {
        return view("user.change_password");
    }

    

    public function store(Request $request){

        // $validation = $request->validate([
        //     'nama_user' => 'required|max:255',
        //     'email' => [
        //         'required',
        //         Rule::notIn(User::where('email', $request->email)->pluck('email')->toArray())
        //     ],
        //     'password' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'bukti_pembayaran' => 'required',
        //     'profile_picture' => 'required',
        // ]);

        $user = new user();
        $increment = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA ='" . env('db_mahasiswabaru') . "' AND TABLE_NAME ='" . $user->getTable() . "'")[0]->AUTO_INCREMENT;
        $user->id = "P".str_pad($increment,3,"0",STR_PAD_LEFT);
        $user->nama_user = $request->nama_user;
        $user->email = $request-> email;
        $user->password = bcrypt($user->password);
        $user->save();

        $request->session()->flash("info", "Data user $request->nama_user (ID : $user->id_user) berhasil dibuat!");
        return redirect()->route("user.register");
    }
}

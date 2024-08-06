<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index", compact('mahasiswa'));
    }

    public function create(){
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.create", compact('mahasiswa'));
    }

    public function detail(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            $mahasiswa = Mahasiswa::all();
            return view("mahasiswa.detail", compact('mahasiswa'));
        } else {
            return redirect()->route("mahasiswa.index")->withErrors(['errors' => 'Data Mahasiswa tidak valid']);
        }
    }

    public function edit(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if($mahasiswa){
            $mahasiswa = Mahasiswa::all();
            
            return view("mahasiswa.edit", compact('mahasiswa'));
        }else{
            return redirect()->route("mahasiswa.index")->withErrors(['errors' => 'Data mahasiswa tidak valid']);
        }
    }

    public function destroy(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        
        if($mahasiswa){
            try{
                $mahasiswa->delete();
                $request->session()->flash("info", "Data Mahasiswa berhasil dihapus!");
            }catch(QueryException $ex){
                return redirect()->route("mahasiswa.index")->withErrors(['errors' => 'Data Mahasiswa gagal dihapus']);
            }
        }else{
            $request->session()->flash("info", "Data Mahasiswa tidak valid");
        }
        
        return redirect()->route("mahasiswa.index");
    }
}

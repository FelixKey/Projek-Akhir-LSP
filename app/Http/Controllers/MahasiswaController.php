<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
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

    public function validateMahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            $mahasiswa->status = 'Divalidasi';
            $mahasiswa->save();

            return redirect()->back()->with('status', 'Mahasiswa status updated to Divalidasi.');
        }

        return redirect()->back()->withErrors(['error' => 'Mahasiswa not found.']);
    }

    public function rejectMahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            $mahasiswa->status = 'Ditolak';
            $mahasiswa->save();

            return redirect()->back()->with('status', 'Mahasiswa status updated to Ditolak');
        }

        return redirect()->back()->withErrors(['error' => 'Mahasiswa not found.']);
    }

    public function detail(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa) {
            return view("mahasiswa.detail", compact('mahasiswa'));
        } else {
            return redirect()->route("mahasiswa.index")->withErrors(['errors' => 'Data Mahasiswa tidak valid']);
        }
    }

    public function edit(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if($mahasiswa){
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

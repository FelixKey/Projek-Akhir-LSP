<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    function __construct()
    {
        $this->model = new Mahasiswa;
        $this->table = $this->model->table;
        $this->loc = 'mahasiswa.';
    }

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

    function store(Request $request)
    {

        $validation = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required',
            'tanggal_lahir' => 'required',
            'program_studi' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
        ]);

        $model = $this->model;
        $model->id = $request->id;
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->no_telp = $request->no_telp;
        $model->asal_sekolah = $request->asal_sekolah;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->program_studi = $request->program_studi;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->agama = $request->agama;
        $model->status = "Belum Divalidasi";
        $model->id_user = $request->id_user;
        $model->save();
        $request->session()->flash("info", "Data baru berhasil ditambahkan");
        return redirect()->route('mahasiswa.index');
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

<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    function __construct()
    {
        $this->model = new Information;
        $this->table = $this->model->table;
        $this->loc = 'information.';
    }

    public function index(){
        $information = Information::all();
        return view("information.index", compact('information'));
    }

    public function create(){
        $information = Information::all();
        return view("information.create", compact('information'));
    }

    function store(Request $request)
    {
        // $this->authorize('create',User::class);
        $model = $this->model; 
        $model->id = $request->id;
        $model->judul = $request->judul;
        $model->id_author = Auth::user()->id;
        $model->deskripsi = $request->deskripsi;
        $model->thumbnail = $request->thumbnail;
        $thumbnail='';
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $text = $request->thumbnail->getClientOriginalExtension();
            $thumbnail = "foto-".time() . "." . $text;
            $request->thumbnail->storeAs("public", $thumbnail);
            $model->thumbnail = $thumbnail;
        };
        $model->save();
        $request->session()->flash("info", "Data Informasi berhasil ditambahkan");
        return redirect()->route('information.index');
    }

    public function detail(Request $request, $id)
    {
        $information = Information::find($id);

        if ($information) {
            return view("information.detail", compact('information'));
        } else {
            return redirect()->route("information.index")->withErrors(['errors' => 'Data Informasi tidak valid']);
        }
    }

    public function edit(Request $request, $id)
    {
        $information = Information::find($id);

        if($information){
            return view("information.edit", compact('information'));
        }else{
            return redirect()->route("information.index")->withErrors(['errors' => 'Data Informasi tidak valid']);
        }
    }

    public function destroy(Request $request, $id)
    {
        $information = Information::find($id);
        
        if($information){
            try{
                $information->delete();
                $request->session()->flash("info", "Data Informasi berhasil dihapus!");
            }catch(QueryException $ex){
                return redirect()->route("information.index")->withErrors(['errors' => 'Data informasi gagal dihapus']);
            }
        }else{
            $request->session()->flash("info", "Data informasi tidak valid");
        }
        
        return redirect()->route("information.index");
    }
}

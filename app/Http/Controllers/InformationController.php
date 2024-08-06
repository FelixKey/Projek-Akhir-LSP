<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(){
        $information = Information::all();
        return view("information.index", compact('information'));
    }

    public function create(){
        $information = Information::all();
        return view("information.create", compact('information'));
    }

    public function detail(Request $request, $id)
    {
        $information = Information::find($id);

        if ($information) {
            $information = Information::all();
            return view("information.detail", compact('information'));
        } else {
            return redirect()->route("information.index")->withErrors(['errors' => 'Data Informasi tidak valid']);
        }
    }

    public function edit(Request $request, $id)
    {
        $information = Information::find($id);

        if($information){
            $information = Information::all();
            
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

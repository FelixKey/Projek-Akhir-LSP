<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingMahasiswaController extends Controller
{
    public function index()
    {
        return view('pending_mahasiswa');
    }
}

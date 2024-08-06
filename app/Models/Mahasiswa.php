<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'no_telp',
        'tanggal_lahir',
        'asal_sekolah',
        'program_studi',
        'jenis_kelamin',
        'agama',
        'status',
        'profile_picture',
        'id_user'
    ];
}

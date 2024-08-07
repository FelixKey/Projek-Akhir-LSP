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
        'id_user'
    ];

    public function user(){
        return $this->hasOne(User::class,"id","id_user");
    }
}

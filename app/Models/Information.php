<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table='informations';

    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,"id","id_author");
    }

    protected $fillable=[
        'judul',
        'id_author',
        'deskripsi',
        'thumbnail',
        'status'
    ];
}

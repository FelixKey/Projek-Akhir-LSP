<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255);
            $table->text('alamat');
            $table->string('no_telp', 32);
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->enum('program_studi',['Informatika','Sistem Informasi','Teknik Elektro','Manajemen Informatika','Manajemen','Akuntansi']);		
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->enum('agama',['Kristen','Katolik','Islam','Buddha','Hindu','Konghucu','Lainnya']);	
            $table->enum('status',['Belum Divalidasi','Divalidasi']);
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};

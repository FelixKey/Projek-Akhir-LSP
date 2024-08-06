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
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('judul',255);
            $table->unsignedBigInteger('id_author');
            $table->foreign('id_author')->references('id')->on('users')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('thumbnail')->default('user.png');
            $table->enum('status',['Aktif','Tidak Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
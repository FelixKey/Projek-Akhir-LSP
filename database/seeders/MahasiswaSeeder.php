<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('mahasiswas')->insert([
            'nama' => 'Felix Kurniawan',
            'alamat'=> 'Jl. Letnan Mukmin 1018B',
            'no_telp'=> '081266992603',
            'tanggal_lahir'=> '2003-07-18',
            'asal_sekolah'=> 'SMA Xaverius 3 Palembang',
            'program_studi'=> 'Informatika',
            'jenis_kelamin'=> 'Laki-laki',
            'agama'=> 'Kristen',
            'status'=> 'Belum Divalidasi',
            'id_user'=> '1',
        ]);
    }
}

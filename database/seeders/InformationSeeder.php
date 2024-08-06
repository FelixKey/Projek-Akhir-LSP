<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('informations')->insert([
            'judul' => 'Pengumuman Penerimaan Mahasiswa Baru',
            'id_author'=> '1',
            'deskripsi'=> 'lorem ipsum dolor sit amet consectetur 
                            adipiscing elit sed do eiusmod tempor incididunt ut labore 
                            et dolore magna aliqua ut enim ad minim veniam quis nostrud 
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                            consequat duis aute irure dolor in reprehenderit in voluptate 
                            velit esse cillum dolore eu fugiat nulla pariatur excepteur 
                            sint occaecat cupidatat non proident sunt in culpa qui officia 
                            deserunt mollit anim id est laborum',
            'thumbnail'=> 'kosong',
            'status'=> 'Tidak Aktif',

        ]);
    }
}

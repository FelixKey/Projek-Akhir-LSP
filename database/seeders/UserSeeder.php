<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            'nama_user' => 'Felix Kurniawan',
            'email' => 'felix@gmail.com',
            'password' => \Hash::make('12345678'), 
            'tanggal_lahir' => '2003-07-18',
            'bukti_pembayaran' => 'kosong',
            'id_role' => '1',
            'profile_picture' => 'kosong',
        ]);
        
    }
}
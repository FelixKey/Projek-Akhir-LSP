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
            'nama_user' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('12345678'), 
            'tanggal_lahir' => '2003-07-18',
            'bukti_pembayaran' => 'bukti_pembayaran.png',
            'id_role' => '1', //admin
            'status' => 'Aktif',
            'profile_picture' => 'user.png',
        ]);

        \DB::table('users')->insert([
            'nama_user' => 'Felix Kurniawan',
            'email' => 'felix123@gmail.com',
            'password' => \Hash::make('12345678'), 
            'tanggal_lahir' => '2003-07-18',
            'bukti_pembayaran' => 'bukti_pembayaran.png',
            'id_role' => '2', //calon mahasiswa
            'status' => 'Pending',
            'profile_picture' => 'user.png',
        ]);
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('role')->insert([
            'id' => 1,
            'kode_role' => 'A001',
            'nama_role' => 'Admin',
        ]);

        \DB::table('role')->insert([
            'id' => 2,
            'kode_role' => 'A002',
            'nama_role' => 'Camaba'
        ]);
    }
}

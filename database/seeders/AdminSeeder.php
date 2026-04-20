<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus admin lama jika ada, lalu buat ulang (hanya 1 admin)
        DB::table('users')->where('role', 'admin')->delete();

        DB::table('users')->insert([
'name'       => 'Admin Goclean',
'email'      => 'admin@goclean.com',
            'password'   => Hash::make('goclean'),
            'role'       => 'admin',
            'is_active'  => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

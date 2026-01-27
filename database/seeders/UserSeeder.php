<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@goclean.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Staff user
        DB::table('users')->insert([
            'name' => 'Staff User',
            'email' => 'staff@goclean.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Customer user
        DB::table('users')->insert([
            'name' => 'Customer User',
            'email' => 'customer@goclean.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $staffs = [
            [
                'name' => 'Budi Santoso',
                'email' => 'staff1@goclean.com',
                'password' => Hash::make('staff123'),
                'role' => 'staff',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sari Wijaya',
                'email' => 'staff2@goclean.com',
                'password' => Hash::make('staff123'),
                'role' => 'staff',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($staffs);
    }
}


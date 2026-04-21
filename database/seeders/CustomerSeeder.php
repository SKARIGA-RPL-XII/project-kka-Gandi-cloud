<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus customer demo lama
        User::where('email', 'customer@goclean.com')->delete();

        User::create([
            'name' => 'Customer Demo',
            'email' => 'customer@goclean.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
            'is_active' => true,
        ]);
    }
}


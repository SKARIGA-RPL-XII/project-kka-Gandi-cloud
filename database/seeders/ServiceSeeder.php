<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Pembersihan Standar',
                'description' => 'Pembersihan rutin rumah/apartemen standar (ruang tamu, kamar tidur, dapur, kamar mandi)',
                'duration' => 180, // 3 jam
                'price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pembersihan Menyeluruh',
                'description' => 'Deep cleaning lengkap termasuk lemari, jendela, exhaust, dan detail lainnya',
                'duration' => 360, // 6 jam
                'price' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuci Sofa & Karpet',
                'description' => 'Cuci sofa, karpet, dan permadani dengan mesin steam professional',
                'duration' => 120, // 2 jam
                'price' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pembersihan Kantor',
                'description' => 'Layanan pembersihan kantor per 100m²',
                'duration' => 240, // 4 jam
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Service::insert($services);
    }
}


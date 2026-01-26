<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        DB::table('site_settings')->insert([
            'id' => 1,
            'site_name' => 'Go Clean Website',
            'site_description' => 'Platform layanan kebersihan terpercaya',
            'contact_email' => 'admin@goclean.com',
            'contact_phone' => '+62 812-3456-7890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
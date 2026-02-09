<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            ['key' => 'site_name', 'value' => 'GOCLEAN', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'site_description', 'value' => 'Layanan pembersihan profesional terpercaya', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_email', 'value' => 'info@goclean.id', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_phone', 'value' => '0812-3456-7890', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'maintenance_mode', 'value' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'allow_registration', 'value' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'email_notifications', 'value' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

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
        Schema::table('orders', function (Blueprint $table) {
            // Add missing columns if they don't exist
            if (!Schema::hasColumn('orders', 'layanan')) {
                $table->string('layanan')->after('user_id');
            }
            if (!Schema::hasColumn('orders', 'tanggal')) {
                $table->date('tanggal')->after('layanan');
            }
            if (!Schema::hasColumn('orders', 'alamat')) {
                $table->text('alamat')->after('tanggal');
            }
            if (!Schema::hasColumn('orders', 'total')) {
                $table->decimal('total', 10, 2)->default(0)->after('alamat');
            }
            if (!Schema::hasColumn('orders', 'status')) {
                $table->enum('status', ['pending', 'proses', 'selesai', 'batal'])->default('pending')->after('total');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['layanan', 'tanggal', 'alamat', 'total', 'status']);
        });
    }
};
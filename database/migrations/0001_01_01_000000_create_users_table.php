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
         Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->enum('role', ['admin','customer','staff'])->default('customer');
        $table->rememberToken();
        $table->timestamps();
    });

        Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique();
        $table->string('phone')->nullable();
        $table->text('address')->nullable();
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });

        Schema::create('staff', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique();
        $table->string('assigned_area')->nullable();
        $table->boolean('active')->default(true);
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });

    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->integer('duration'); // menit
        $table->decimal('price', 12, 2);
        $table->timestamps();
    });


Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id');
        $table->unsignedBigInteger('service_id');
        $table->unsignedBigInteger('staff_id')->nullable();
        $table->dateTime('schedule');
        $table->enum('status', ['pending','confirmed','assigned','in_progress','done','cancelled'])->default('pending');
        $table->decimal('total', 12, 2);
        $table->timestamps();

        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        $table->foreign('staff_id')->references('id')->on('staff')->nullOnDelete();
    });

    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('order_id');
        $table->enum('method', ['qris'])->default('qris');
        $table->enum('status', ['pending','uploaded','verified','rejected'])->default('pending');
        $table->string('proof')->nullable(); // upload bukti bayar
        $table->timestamp('paid_at')->nullable();
        $table->timestamps();

        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

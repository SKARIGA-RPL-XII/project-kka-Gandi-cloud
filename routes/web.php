<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Customer routes
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

// Staff routes
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    });
});

// Order routes for customers
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/order', [App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/customer/history', [App\Http\Controllers\OrderController::class, 'history'])->name('order.history');
});

require __DIR__.'/auth.php';

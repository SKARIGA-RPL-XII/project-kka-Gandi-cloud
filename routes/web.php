<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Test route untuk customer dashboard
Route::get('/customer/test', function () {
    $user = (object)['name' => 'John Doe', 'email' => 'john@example.com'];
    $orders = collect([
        (object)['id' => 1, 'layanan' => 'Pembersihan Rumah', 'status' => 'pending', 'tanggal' => '2024-01-26'],
        (object)['id' => 2, 'layanan' => 'Deep Cleaning', 'status' => 'proses', 'tanggal' => '2024-01-25'],
    ]);
    
    return view('customer.dashboard', compact('user', 'orders'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Customer routes
use App\Http\Controllers\CustomerController;

Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
});

// Admin routes
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
    Route::get('/admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
});

// Staff routes
use App\Http\Controllers\StaffController;

Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/staff/orders', [StaffController::class, 'orders'])->name('staff.orders');
    Route::post('/staff/order/{id}/accept', [StaffController::class, 'acceptOrder'])->name('staff.order.accept');
    Route::post('/staff/order/{id}/complete', [StaffController::class, 'completeOrder'])->name('staff.order.complete');
    Route::post('/staff/order/{id}/reject', [StaffController::class, 'rejectOrder'])->name('staff.order.reject');
});
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', fn()=>view('admin.dashboard'));
    Route::get('/analytics', fn()=>view('admin.analytics'));
    Route::get('/content', fn()=>view('admin.content'));
});

// Order routes for customers
use App\Http\Controllers\OrderController;

Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');

require __DIR__.'/auth.php';

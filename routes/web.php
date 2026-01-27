<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Test routes
Route::get('/admin/test', function () {
    $stats = [
        'total_users' => 10,
        'total_orders' => 5,
        'total_products' => 3,
        'total_revenue' => 150000
    ];
    return view('admin.dashboard', compact('stats'));
});

Route::get('/customer/test', function () {
    $user = (object)['name' => 'John Doe', 'email' => 'john@example.com'];
    $orders = collect([
        (object)['id' => 1, 'layanan' => 'Pembersihan Rumah', 'status' => 'pending', 'tanggal' => '2024-01-26'],
        (object)['id' => 2, 'layanan' => 'Deep Cleaning', 'status' => 'proses', 'tanggal' => '2024-01-25'],
    ]);
    return view('customer.dashboard', compact('user', 'orders'));
});

Route::get('/staff/test', function () {
    $recent_orders = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as customer_name')
        ->orderBy('orders.created_at', 'desc')
        ->limit(5)
        ->get();
    
    $stats = [
        'pending_orders' => DB::table('orders')->where('status', 'pending')->count(),
        'in_progress' => DB::table('orders')->where('status', 'proses')->count(),
        'completed_today' => DB::table('orders')->where('status', 'selesai')->whereDate('updated_at', today())->count(),
        'total_earnings' => DB::table('orders')->where('status', 'selesai')->sum('total') ?? 0
    ];
    
    return view('staff.dashboard', compact('stats', 'recent_orders'));
});

// Staff actions
Route::post('/staff/order/{id}/accept', function($id) {
    DB::table('orders')->where('id', $id)->update(['status' => 'proses', 'updated_at' => now()]);
    return redirect('/staff/test')->with('success', 'Pesanan berhasil diterima');
});

Route::post('/staff/order/{id}/reject', function($id) {
    DB::table('orders')->where('id', $id)->update(['status' => 'batal', 'updated_at' => now()]);
    return redirect('/staff/test')->with('success', 'Pesanan ditolak');
});

Route::post('/staff/order/{id}/complete', function($id) {
    DB::table('orders')->where('id', $id)->update(['status' => 'selesai', 'updated_at' => now()]);
    return redirect('/staff/test')->with('success', 'Pekerjaan selesai');
});

// Order routes
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Customer routes
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
    Route::get('/admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
});

// Staff routes
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/staff/orders', [StaffController::class, 'orders'])->name('staff.orders');
    Route::post('/staff/order/{id}/accept', [StaffController::class, 'acceptOrder'])->name('staff.order.accept');
    Route::post('/staff/order/{id}/complete', [StaffController::class, 'completeOrder'])->name('staff.order.complete');
    Route::post('/staff/order/{id}/reject', [StaffController::class, 'rejectOrder'])->name('staff.order.reject');
    Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');

});

require __DIR__.'/auth.php';
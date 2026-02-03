<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/process', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'role' => 'required|in:customer,staff,admin',
        'password' => 'required|min:8|confirmed'
    ]);
    
    return response()->json(['success' => true]);
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Test routes untuk development
Route::get('/customer/test', function () {
    $user = (object)['name' => 'John Doe', 'email' => 'john@example.com'];
    
    // Buat data sample orders langsung
    $orders = collect([
        (object)[
            'id' => 1,
            'layanan' => 'Pembersihan Rumah',
            'status' => 'pending',
            'tanggal' => '2024-01-28',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'total' => 150000,
            'payment_method' => 'QRIS',
            'created_at' => now(),
            'updated_at' => now()
        ],
        (object)[
            'id' => 2,
            'layanan' => 'Deep Cleaning',
            'status' => 'proses',
            'tanggal' => '2024-01-29',
            'alamat' => 'Jl. Sample No. 456, Bandung',
            'total' => 300000,
            'payment_method' => 'Cash',
            'created_at' => now(),
            'updated_at' => now()
        ],
        (object)[
            'id' => 3,
            'layanan' => 'Pembersihan Kantor',
            'status' => 'selesai',
            'tanggal' => '2024-01-27',
            'alamat' => 'Jl. Bisnis No. 789, Surabaya',
            'total' => 200000,
            'payment_method' => 'QRIS',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
    
    return view('customer.dashboard', compact('user', 'orders'));
});

Route::get('/staff/test', function () {
    // Buat data sample untuk staff dashboard
    $recent_orders = collect([
        (object)[
            'id' => 1,
            'customer_name' => 'John Doe',
            'layanan' => 'Pembersihan Rumah',
            'status' => 'pending',
            'tanggal' => '2024-01-28',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'total' => 150000,
            'created_at' => now(),
            'updated_at' => now()
        ],
        (object)[
            'id' => 2,
            'customer_name' => 'Jane Smith',
            'layanan' => 'Deep Cleaning',
            'status' => 'proses',
            'tanggal' => '2024-01-29',
            'alamat' => 'Jl. Sample No. 456, Bandung',
            'total' => 300000,
            'created_at' => now(),
            'updated_at' => now()
        ],
        (object)[
            'id' => 3,
            'customer_name' => 'Bob Wilson',
            'layanan' => 'Pembersihan Kantor',
            'status' => 'selesai',
            'tanggal' => '2024-01-27',
            'alamat' => 'Jl. Bisnis No. 789, Surabaya',
            'total' => 200000,
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
    
    $stats = [
        'pending_orders' => 1,
        'in_progress' => 1,
        'completed_today' => 1,
        'total_earnings' => 650000
    ];
    
    return view('staff.dashboard', compact('stats', 'recent_orders'));
});

Route::get('/admin/test', function () {
    $stats = [
        'total_users' => 25,
        'total_orders' => 48,
        'total_services' => 6,
        'total_revenue' => 7500000
    ];
    return view('admin.dashboard', compact('stats'));
});

// Admin test routes untuk demo
Route::get('/admin/services/test', function () {
    $services = collect([
        (object)[
            'id' => 1,
            'name' => 'Pembersihan Rumah',
            'description' => 'Layanan pembersihan menyeluruh untuk rumah tinggal',
            'price' => 150000,
            'duration' => '2-4 jam',
            'status' => 'active',
            'created_at' => now()
        ],
        (object)[
            'id' => 2,
            'name' => 'Pembersihan Kantor',
            'description' => 'Jaga kebersihan lingkungan kerja Anda',
            'price' => 200000,
            'duration' => '3-5 jam',
            'status' => 'active',
            'created_at' => now()
        ],
        (object)[
            'id' => 3,
            'name' => 'Deep Cleaning',
            'description' => 'Pembersihan mendalam untuk area sulit dijangkau',
            'price' => 300000,
            'duration' => '4-6 jam',
            'status' => 'active',
            'created_at' => now()
        ]
    ]);
    return view('admin.services', compact('services'));
});

Route::get('/admin/users/test', function () {
    $users = collect([
        (object)[
            'id' => 1,
            'name' => 'John Customer',
            'email' => 'customer@test.com',
            'role' => 'customer',
            'created_at' => now()
        ],
        (object)[
            'id' => 2,
            'name' => 'Jane Staff',
            'email' => 'staff@test.com',
            'role' => 'staff',
            'created_at' => now()
        ],
        (object)[
            'id' => 3,
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'created_at' => now()
        ]
    ]);
    return view('admin.users', compact('users'));
});

Route::get('/admin/orders/test', function () {
    $orders = collect([
        (object)[
            'id' => 1,
            'customer_name' => 'John Doe',
            'service_name' => 'Pembersihan Rumah',
            'status' => 'pending',
            'total' => 150000,
            'created_at' => now()
        ],
        (object)[
            'id' => 2,
            'customer_name' => 'Jane Smith',
            'service_name' => 'Deep Cleaning',
            'status' => 'proses',
            'total' => 300000,
            'created_at' => now()
        ],
        (object)[
            'id' => 3,
            'customer_name' => 'Bob Wilson',
            'service_name' => 'Pembersihan Kantor',
            'status' => 'selesai',
            'total' => 200000,
            'created_at' => now()
        ]
    ]);
    return view('admin.orders', compact('orders'));
});

Route::get('/admin/settings/test', function () {
    $settings = (object)[
        'site_name' => 'GOCLEAN',
        'site_description' => 'Layanan pembersihan profesional terpercaya',
        'contact_email' => 'info@goclean.id',
        'contact_phone' => '0812-3456-7890'
    ];
    return view('admin.settings', compact('settings'));
});

// Route untuk form layanan
Route::get('/admin/services/create/test', function () {
    return view('admin.service-create');
});

Route::post('/admin/services/store/test', function () {
    return redirect('/admin/services/test')->with('success', 'Layanan berhasil ditambahkan!');
});

Route::get('/admin/services/{id}/edit/test', function ($id) {
    $service = (object)[
        'id' => $id,
        'name' => 'Pembersihan Rumah',
        'description' => 'Layanan pembersihan menyeluruh untuk rumah tinggal',
        'price' => 150000,
        'duration' => '2-4 jam',
        'status' => 'active'
    ];
    return view('admin.service-edit', compact('service'));
});



Route::post('/admin/services/{id}/delete/test', function ($id) {
    return redirect('/admin/services/test')->with('success', 'Layanan berhasil dihapus!');
});

Route::get('/staff/orders/test', function () {
    $allOrders = collect([
        (object)[
            'id' => 1,
            'customer_name' => 'John Doe',
            'layanan' => 'Pembersihan Rumah',
            'status' => 'pending',
            'tanggal' => '2024-01-28',
            'alamat' => 'Jl. Contoh No. 123, Jakarta',
            'total' => 150000,
            'created_at' => now()
        ],
        (object)[
            'id' => 2,
            'customer_name' => 'Jane Smith',
            'layanan' => 'Deep Cleaning',
            'status' => 'proses',
            'tanggal' => '2024-01-29',
            'alamat' => 'Jl. Sample No. 456, Bandung',
            'total' => 300000,
            'created_at' => now()
        ],
        (object)[
            'id' => 3,
            'customer_name' => 'Bob Wilson',
            'layanan' => 'Pembersihan Kantor',
            'status' => 'selesai',
            'tanggal' => '2024-01-27',
            'alamat' => 'Jl. Bisnis No. 789, Surabaya',
            'total' => 200000,
            'created_at' => now()
        ],
        (object)[
            'id' => 4,
            'customer_name' => 'Alice Brown',
            'layanan' => 'Pembersihan Rumah',
            'status' => 'batal',
            'tanggal' => '2024-01-26',
            'alamat' => 'Jl. Test No. 321, Medan',
            'total' => 150000,
            'created_at' => now()
        ]
    ]);
    
    $status = request('status');
    if ($status) {
        $orders = $allOrders->where('status', $status);
    } else {
        $orders = $allOrders;
    }
        
    return view('staff.orders', compact('orders'));
});

Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/payment', [OrderController::class, 'payment'])->name('order.payment');
Route::post('/order/payment/process', [OrderController::class, 'processPayment'])->name('order.payment.process');
Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');

// Staff actions untuk testing
Route::post('/staff/order/{id}/accept', function($id) {
    return redirect('/staff/test')->with('success', 'Pesanan #' . $id . ' berhasil diterima dan sedang dikerjakan');
});

Route::post('/staff/order/{id}/reject', function($id) {
    return redirect('/staff/test')->with('success', 'Pesanan #' . $id . ' ditolak');
});

Route::post('/staff/order/{id}/complete', function($id) {
    return redirect('/staff/test')->with('success', 'Pekerjaan #' . $id . ' berhasil diselesaikan');
});

// Simple routes untuk testing
Route::get('/profile', function() {
    return view('customer.profile');
})->name('profile');
Route::get('/help', function() {
    return view('customer.help');
})->name('help');

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
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    
  Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/services', [AdminController::class, 'services'])
        ->name('admin.services');

    Route::get('/admin/services/create', [AdminController::class, 'createService'])
        ->name('admin.services.create');

    Route::post('/admin/services', [AdminController::class, 'storeService'])
        ->name('admin.services.store');

    Route::get('/admin/services/{id}/edit', [AdminController::class, 'editService'])
        ->name('admin.services.edit');

    Route::put('/admin/services/{id}', [AdminController::class, 'updateService'])
        ->name('admin.services.update');

    Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])
        ->name('admin.services.delete');

});

    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
});

// Staff routes
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/staff/orders', [StaffController::class, 'orders'])->name('staff.orders');
    Route::post('/staff/order/{id}/accept', [StaffController::class, 'acceptOrder'])->name('staff.order.accept');
    Route::post('/staff/order/{id}/complete', [StaffController::class, 'completeOrder'])->name('staff.order.complete');
    Route::post('/staff/order/{id}/reject', [StaffController::class, 'rejectOrder'])->name('staff.order.reject');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');

    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');

    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.delete');
});
require __DIR__.'/auth.php';
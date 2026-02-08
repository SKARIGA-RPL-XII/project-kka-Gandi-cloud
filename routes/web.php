<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login-db');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();
        
        // Redirect based on role
        switch($user->role) {
            case 'admin':
                return redirect('/admin/test');
            case 'staff':
                return redirect('/staff/test');
            case 'customer':
                return redirect('/customer/test');
            default:
                Auth::logout();
                return redirect('/login')->with('error', 'Role tidak valid');
        }
    }
    
    return back()->with('error', 'Email atau password salah!');
})->name('login.post');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login')->with('success', 'Berhasil logout');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register/process', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|in:customer,staff',
        'password' => 'required|min:8|confirmed'
    ]);
    
    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'role' => $validated['role'],
        'password' => \Illuminate\Support\Facades\Hash::make($validated['password'])
    ]);
    
    return response()->json(['success' => true, 'message' => 'Registrasi berhasil!']);
});

// Test routes
Route::get('/customer/test', function () {
    $user = (object)['name' => 'John Doe', 'email' => 'john@example.com'];
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
        ]
    ]);
    return view('customer.dashboard', compact('user', 'orders'));
});

// Staff test route with real-time order updates
Route::get('/staff/test', function () {
    // Get orders from localStorage simulation
    $recent_orders = collect(json_decode(request()->cookie('orders', '[]')))->map(function($order) {
        return (object)$order;
    });
    
    // Add default orders if empty
    if ($recent_orders->isEmpty()) {
        $recent_orders = collect([
            (object)[
                'id' => 1,
                'customer_name' => 'John Doe',
                'layanan' => 'Pembersihan Rumah',
                'status' => 'pending',
                'tanggal' => '2024-01-28',
                'alamat' => 'Jl. Contoh No. 123, Jakarta',
                'total' => 150000,
                'created_at' => now()
            ]
        ]);
    }
    
    $stats = [
        'pending_orders' => $recent_orders->where('status', 'pending')->count(),
        'in_progress' => $recent_orders->where('status', 'proses')->count(),
        'completed_today' => $recent_orders->where('status', 'selesai')->count(),
        'total_earnings' => $recent_orders->where('status', 'selesai')->sum('total')
    ];
    
    return view('staff.dashboard', compact('stats', 'recent_orders'));
});

// Admin test routes
Route::get('/admin/test', function () {
    $stats = [
        'total_users' => 25,
        'total_orders' => 48,
        'total_services' => 6,
        'total_revenue' => 7500000
    ];
    return view('admin.dashboard', compact('stats'));
});

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
        ]
    ]);
    return view('admin.services', compact('services'));
});

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

Route::get('/admin/users/test', function () {
    $users = collect([
        (object)[
            'id' => 1,
            'name' => 'John Customer',
            'email' => 'customer@test.com',
            'role' => 'customer',
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

// Staff orders test route
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
        ]
    ]);
    $status = request('status');
    $orders = $status ? $allOrders->where('status', $status) : $allOrders;
    return view('staff.orders', compact('orders'));
});

// Staff actions with status updates
Route::post('/staff/order/{id}/accept', function($id) {
    return redirect('/staff/test')->with('success', 'Pesanan #' . $id . ' berhasil diterima')->with('order_status', ['id' => $id, 'status' => 'proses']);
});

Route::post('/staff/order/{id}/reject', function($id) {
    return redirect('/staff/test')->with('success', 'Pesanan #' . $id . ' ditolak')->with('order_status', ['id' => $id, 'status' => 'batal']);
});

Route::post('/staff/order/{id}/complete', function($id) {
    return redirect('/staff/test')->with('success', 'Pekerjaan #' . $id . ' berhasil diselesaikan')->with('order_status', ['id' => $id, 'status' => 'selesai']);
});

// Order routes
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/payment', [OrderController::class, 'payment'])->name('order.payment');
Route::post('/order/payment/process', [OrderController::class, 'processPayment'])->name('order.payment.process');
Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');

// QRIS API routes
Route::post('/api/generate-qris', [OrderController::class, 'generateQRIS']);
Route::get('/api/check-payment-status/{transactionId}', [OrderController::class, 'checkPaymentStatus']);

// Profile routes
Route::get('/profile', function() {
    return view('customer.profile');
})->name('profile');

Route::get('/help', function() {
    return view('customer.help');
})->name('help');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Customer routes
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
});

// Staff routes
Route::middleware(['auth', 'staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/staff/orders', [StaffController::class, 'orders'])->name('staff.orders');
    Route::post('/staff/order/{id}/accept', [StaffController::class, 'acceptOrder'])->name('staff.order.accept');
    Route::post('/staff/order/{id}/complete', [StaffController::class, 'completeOrder'])->name('staff.order.complete');
    Route::post('/staff/order/{id}/reject', [StaffController::class, 'rejectOrder'])->name('staff.order.reject');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.services');
    Route::get('/admin/services/create', [AdminController::class, 'createService'])->name('admin.services.create');
    Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::get('/admin/services/{id}/edit', [AdminController::class, 'editService'])->name('admin.services.edit');
    Route::put('/admin/services/{id}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
});

require __DIR__.'/auth.php';
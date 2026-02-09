<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'));
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));
Route::post('/contact', function(\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string'
    ]);
    
    \App\Models\Contact::create($validated);
    return back()->with('success', 'Pesan berhasil dikirim!');
})->name('contact.store');
Route::get('/help', fn() => view('customer.help'))->name('help');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', fn() => view('login'))->name('login');

Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();
        $user = Auth::user();

        return match($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            'customer' => redirect()->route('customer.dashboard'),
            default => redirect('/login')
        };
    }

    return back()->with('error', 'Email atau password salah!');
})->name('login.post');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/

Route::get('/register', fn() => view('auth.register'))->name('register');

Route::post('/register/process', function (Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed'
    ]);

    \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'role' => 'customer',
        'password' => bcrypt($validated['password'])
    ]);

    return redirect('/login')->with('success', 'Registrasi berhasil!');
});

/*
|--------------------------------------------------------------------------
| ORDER ROUTES (Customer)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','customer'])->group(function () {

    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
        ->name('customer.dashboard');

    Route::get('/order/create', [OrderController::class, 'create'])
        ->name('order.create');

    Route::post('/order/store', [OrderController::class, 'store'])
        ->name('order.store');

    Route::get('/order/payment', [OrderController::class, 'payment'])
        ->name('order.payment');

    Route::post('/order/payment/process', [OrderController::class, 'processPayment'])
        ->name('order.payment.process');

    Route::get('/order/history', [OrderController::class, 'history'])
        ->name('order.history');

    Route::get('/customer/profile', function() {
        return view('customer.profile');
    })->name('customer.profile');
});

/*
|--------------------------------------------------------------------------
| STAFF ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','staff'])->group(function () {

    Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])
        ->name('staff.dashboard');

    Route::get('/staff/orders', [StaffController::class, 'orders'])
        ->name('staff.orders');

    Route::post('/staff/order/{id}/accept', [StaffController::class, 'acceptOrder'])
        ->name('staff.order.accept');

    Route::post('/staff/order/{id}/start', [StaffController::class, 'startOrder'])
        ->name('staff.order.start');

    Route::post('/staff/order/{id}/reject', [StaffController::class, 'rejectOrder'])
        ->name('staff.order.reject');

    Route::post('/staff/order/{id}/complete', [StaffController::class, 'completeOrder'])
        ->name('staff.order.complete');

    Route::delete('/staff/order/{id}', [StaffController::class, 'deleteOrder'])
        ->name('staff.order.delete');

    Route::get('/staff/profile', [StaffController::class, 'profile'])
        ->name('staff.profile');

    Route::put('/staff/profile/update', [StaffController::class, 'updateProfile'])
        ->name('staff.profile.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/orders', [AdminController::class, 'orders'])
        ->name('admin.orders');

    Route::delete('/admin/orders/{id}', [AdminController::class, 'deleteOrder'])
        ->name('admin.orders.delete');

    Route::get('/admin/users', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::post('/admin/staff/store', [AdminController::class, 'storeStaff'])
        ->name('admin.staff.store');

    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])
        ->name('admin.users.edit');

    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])
        ->name('admin.users.update');

    Route::post('/admin/users/{id}/toggle', [AdminController::class, 'toggleUserStatus'])
        ->name('admin.users.toggle');

    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])
        ->name('admin.users.delete');

    Route::get('/admin/services', [AdminController::class, 'services'])
        ->name('admin.services');

    Route::get('/admin/services/create', [AdminController::class, 'createService'])
        ->name('admin.services.create');

    Route::post('/admin/services/store', [AdminController::class, 'storeService'])
        ->name('admin.services.store');

    Route::get('/admin/services/{id}/edit', [AdminController::class, 'editService'])
        ->name('admin.services.edit');

    Route::put('/admin/services/{id}', [AdminController::class, 'updateService'])
        ->name('admin.services.update');

    Route::delete('/admin/services/{id}', [AdminController::class, 'deleteService'])
        ->name('admin.services.delete');

    Route::get('/admin/settings', [AdminController::class, 'settings'])
        ->name('admin.settings');

    Route::post('/admin/settings/update', [AdminController::class, 'updateSettings'])
        ->name('admin.settings.update');

    Route::post('/admin/settings/toggle', [AdminController::class, 'toggleSetting'])
        ->name('admin.settings.toggle');

    Route::get('/admin/contacts', [AdminController::class, 'contacts'])
        ->name('admin.contacts');

    Route::delete('/admin/contacts/{id}', [AdminController::class, 'deleteContact'])
        ->name('admin.contacts.delete');

});

/*
|--------------------------------------------------------------------------
| QRIS API
|--------------------------------------------------------------------------
*/

Route::post('/api/generate-qris', [OrderController::class, 'generateQRIS']);
Route::get('/api/check-payment-status/{transactionId}', [OrderController::class, 'checkPaymentStatus']);

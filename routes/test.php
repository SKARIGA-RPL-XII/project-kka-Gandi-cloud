<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/test', function () {
    $stats = [
        'total_users' => 10,
        'total_orders' => 5,
        'total_products' => 3,
        'total_revenue' => 150000
    ];
    
    return view('admin.dashboard', compact('stats'));
});
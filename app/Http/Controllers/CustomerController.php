<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CustomerController extends Controller
{
    // =======================
    // DASHBOARD CUSTOMER
    // =======================
    public function dashboard()
    {
        $user = Auth::user();

        // Ambil semua order milik user
        $orders = Order::with('service')
            ->where('customer_id', $user->id)
            ->latest()
            ->get();

        return view('customer.dashboard', compact('user', 'orders'));
    }

    // =======================
    // HISTORY ORDER
    // =======================
    public function history()
    {
        $orders = Order::with('service')
            ->where('customer_id', Auth::id())
            ->latest()
            ->get();

        return view('customer.order-history', compact('orders'));
    }
}
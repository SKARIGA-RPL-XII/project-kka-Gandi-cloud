<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $customer = \App\Models\Customer::where('user_id', Auth::id())->first();
        $orders = $customer
            ? \App\Models\Order::with('service')->where('customer_id', $customer->id)->latest()->get()
            : collect();
        return view('customer.dashboard', compact('user', 'orders'));
    }
}
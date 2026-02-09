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
        
        // Cari customer_id dari user_id
        $customer = \App\Models\Customer::where('user_id', Auth::id())->first();
        
        if ($customer) {
            $orders = \App\Models\Order::where('customer_id', $customer->id)
                ->with('service')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $orders = collect();
        }
        
        return view('customer.dashboard', compact('user', 'orders'));
    }
}
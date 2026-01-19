<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('staff.dashboard', compact('orders'));
    }

    public function accept(Order $order)
    {
        $order->update(['status' => 'accepted']);
        return back()->with('success', 'Pesanan diterima!');
    }

    public function reject(Order $order)
    {
        $order->update(['status' => 'rejected']);
        return back()->with('success', 'Pesanan ditolak!');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalPesanan = Order::count();
        $totalCustomer = User::where('role', 'customer')->count();
        $totalStaff = User::where('role', 'staff')->count();
        $pesananPending = Order::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalPesanan', 'totalCustomer', 'totalStaff', 'pesananPending'));
    }

    public function laporan()
    {
        $orders = Order::latest()->get();
        return view('admin.laporan', compact('orders'));
    }
}

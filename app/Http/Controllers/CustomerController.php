<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        // Mock data untuk testing
        $orders = collect([
            (object)['id' => 1, 'layanan' => 'Pembersihan Rumah', 'status' => 'pending', 'tanggal' => '2024-01-26'],
            (object)['id' => 2, 'layanan' => 'Deep Cleaning', 'status' => 'proses', 'tanggal' => '2024-01-25'],
        ]);
        
        return view('customer.dashboard', compact('user', 'orders'));
    }
}
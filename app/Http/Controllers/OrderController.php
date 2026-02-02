<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        return view('customer.order-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required|string',
            'tanggal' => 'required|date|after:today',
            'alamat' => 'required|string|min:10',
        ]);

        // Hitung total berdasarkan layanan
        $prices = [
            'Pembersihan Rumah' => 150000,
            'Pembersihan Kantor' => 200000,
            'Deep Cleaning' => 300000,
        ];

        $total = $prices[$request->layanan] ?? 100000;
        
        // Simpan data ke session untuk pembayaran
        session([
            'order_data' => [
                'layanan' => $request->layanan,
                'tanggal' => $request->tanggal,
                'alamat' => $request->alamat,
                'total' => $total
            ]
        ]);
        
        return redirect('/order/payment')->with('success', 'Silakan pilih metode pembayaran');
    }

    public function history()
    {
        // Simulasi data histori pesanan
        $orders = collect([
            (object)[
                'id' => 1,
                'layanan' => 'Pembersihan Rumah',
                'status' => 'selesai',
                'tanggal' => '2024-01-26',
                'alamat' => 'Jl. Contoh No. 123, Jakarta',
                'total' => 150000,
                'payment_method' => 'QRIS',
                'created_at' => '2024-01-26 08:00:00'
            ],
            (object)[
                'id' => 2,
                'layanan' => 'Deep Cleaning',
                'status' => 'proses',
                'tanggal' => '2024-01-28',
                'alamat' => 'Jl. Sample No. 456, Bandung',
                'total' => 300000,
                'payment_method' => 'Cash',
                'created_at' => '2024-01-27 10:00:00'
            ],
            (object)[
                'id' => 3,
                'layanan' => 'Pembersihan Kantor',
                'status' => 'pending',
                'tanggal' => '2024-01-30',
                'alamat' => 'Jl. Bisnis No. 789, Surabaya',
                'total' => 200000,
                'payment_method' => 'QRIS',
                'created_at' => '2024-01-28 14:00:00'
            ]
        ]);

        return view('customer.order-history', compact('orders'));
    }
    
    public function payment()
    {
        $orderData = session('order_data');
        if (!$orderData) {
            return redirect('/order/create')->with('error', 'Data pesanan tidak ditemukan');
        }
        
        return view('customer.payment', compact('orderData'));
    }
    
    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:qris,cash'
        ]);
        
        $orderData = session('order_data');
        if (!$orderData) {
            return redirect('/order/create')->with('error', 'Data pesanan tidak ditemukan');
        }
        
        // Simulasi proses pembayaran
        session()->forget('order_data');
        
        return redirect('/customer/test')->with('success', 'Pesanan berhasil dibuat dengan pembayaran ' . strtoupper($request->payment_method) . '! Menunggu konfirmasi dari petugas.');
    }
}

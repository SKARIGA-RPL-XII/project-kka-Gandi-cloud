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
        
        // Create new order
        $newOrder = [
            'id' => rand(1000, 9999),
            'customer_name' => 'Customer',
            'layanan' => $orderData['layanan'],
            'status' => 'pending',
            'tanggal' => $orderData['tanggal'],
            'alamat' => $orderData['alamat'],
            'total' => $orderData['total'],
            'payment_method' => strtoupper($request->payment_method),
            'created_at' => now()->toDateTimeString()
        ];
        
        session()->forget('order_data');
        
        return redirect('/customer/test')
            ->with('success', 'Pesanan berhasil dibuat! Menunggu konfirmasi dari petugas.')
            ->with('new_order', $newOrder);
    }
    
    public function generateQRIS(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'order_id' => 'required|string',
            'customer_name' => 'required|string'
        ]);
        
        // Simulasi generate QRIS
        // Dalam production, gunakan API payment gateway seperti Midtrans, Xendit, dll
        $transactionId = 'TRX-' . time() . '-' . rand(1000, 9999);
        $qrString = "00020101021226670016COM.NOBUBANK.WWW01189360050300000898740214" . $request->order_id . "0303UMI51440014ID.CO.QRIS.WWW0215ID10" . $transactionId . "0303UMI5204481253033605802ID5912GOCLEAN5915Jakarta6304";
        
        // Store transaction in session for checking
        session(['qris_transaction_' . $transactionId => [
            'status' => 'pending',
            'amount' => $request->amount,
            'order_id' => $request->order_id,
            'created_at' => now()
        ]]);
        
        return response()->json([
            'success' => true,
            'data' => [
                'transaction_id' => $transactionId,
                'qr_string' => $qrString,
                'amount' => $request->amount,
                'expired_at' => now()->addMinutes(15)->toISOString()
            ]
        ]);
    }
    
    public function checkPaymentStatus($transactionId)
    {
        // Check transaction status
        $transaction = session('qris_transaction_' . $transactionId);
        
        if (!$transaction) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'Transaction not found'
            ]);
        }
        
        // Simulasi: Auto-paid setelah 10 detik untuk demo
        $createdAt = $transaction['created_at'];
        if (now()->diffInSeconds($createdAt) > 10) {
            session(['qris_transaction_' . $transactionId => array_merge($transaction, ['status' => 'paid'])]);
            return response()->json([
                'status' => 'paid',
                'message' => 'Payment successful'
            ]);
        }
        
        return response()->json([
            'status' => $transaction['status'],
            'message' => 'Waiting for payment'
        ]);
    }
}

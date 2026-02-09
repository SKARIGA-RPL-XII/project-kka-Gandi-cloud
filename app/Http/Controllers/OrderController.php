<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create()
    {
        $services = \App\Models\Service::all();
        return view('customer.order-create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date|after:today',
            'alamat' => 'required|string|min:10',
        ]);

        // Ambil data service dari database
        $service = \App\Models\Service::findOrFail($request->service_id);
        
        // Simpan data ke session untuk pembayaran
        session([
            'order_data' => [
                'service_id' => $service->id,
                'layanan' => $service->name,
                'tanggal' => $request->tanggal,
                'alamat' => $request->alamat,
                'total' => $service->price
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
        
        // Cari atau buat customer
        $customer = \App\Models\Customer::firstOrCreate(
            ['user_id' => auth()->id()],
            ['phone' => null, 'address' => $orderData['alamat']]
        );
        
        // Buat order baru dengan total dari session
        \App\Models\Order::create([
            'customer_id' => $customer->id,
            'service_id' => $orderData['service_id'],
            'schedule' => $orderData['tanggal'],
            'status' => 'pending',
            'total' => $orderData['total'],
            'payment_method' => $request->payment_method
        ]);
        
        session()->forget('order_data');
        
        return redirect('/customer/dashboard')
            ->with('success', 'Pesanan berhasil dibuat! Menunggu konfirmasi dari staff.');
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

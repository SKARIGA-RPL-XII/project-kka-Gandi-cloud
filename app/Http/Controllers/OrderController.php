<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('order', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date|after:today',
            'alamat' => 'required|min:10',
        ]);

        $service = Service::findOrFail($request->service_id);

        $order = Order::create([
            'user_id' => auth()->id(),
            'service_id' => $request->service_id,
            'order_date' => $request->tanggal,
            'address' => $request->alamat,
            'total_price' => $service->price,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        session(['new_order_id' => $order->id]);

        return redirect()->route('order.payment')
            ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
    }

    public function payment()
    {
        $orderId = session('new_order_id');
        if (!$orderId) {
            return redirect()->route('order.history')->with('error', 'Tidak ada pesanan untuk dibayar.');
        }

        $order = Order::with('service', 'user')->findOrFail($orderId);

        $orderData = [
            'layanan' => $order->service->name,
            'tanggal' => $order->order_date,
            'alamat' => $order->address,
            'total' => $order->total_price,
        ];

        return view('customer.payment', compact('orderData', 'order'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:transfer,cash',
        ]);

        $orderId = session('new_order_id');
        if (!$orderId) {
            return redirect()->route('order.history')->with('error', 'Pesanan tidak ditemukan.');
        }

        $order = Order::findOrFail($orderId);
        $order->update([
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method === 'cash' ? 'pending' : 'paid',
        ]);

        session()->forget('new_order_id');

        return redirect()->route('order.history')
            ->with('success', 'Pembayaran berhasil dikonfirmasi! Pesanan Anda sedang diproses.');
    }
    public function create()
{
    $services = \App\Models\Service::all(); // ambil layanan
    return view('customer.order-create', compact('services'));
}
public function history()
{
    $orders = Order::with('service')->where('user_id', Auth::id())->latest()->get();

    return view('customer.order-history', compact('orders'));
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Service;
use App\Models\Customer;
use App\Models\User;

class OrderController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('customer.order-create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'tanggal'    => 'required|date|after:today',
            'alamat'     => 'required|string|min:10',
        ]);

        $service = Service::findOrFail($request->service_id);

        session(['order_data' => [
            'service_id' => $service->id,
            'layanan'    => $service->name,
            'tanggal'    => $request->tanggal,
            'alamat'     => $request->alamat,
            'total'      => $service->price,
        ]]);

        return redirect()->route('order.payment');
    }

    public function payment()
    {
        $orderData = session('order_data');
        if (!$orderData) {
            return redirect()->route('order.create')->with('error', 'Data pesanan tidak ditemukan.');
        }
        return view('customer.payment', compact('orderData'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:transfer,cash'
        ]);

        $orderData = session('order_data');
        if (!$orderData) {
            return redirect()->route('order.create')->with('error', 'Sesi pesanan habis. Silakan buat pesanan ulang.');
        }

        // Cari atau buat customer record
        $customer = Customer::firstOrCreate(
            ['user_id' => auth()->id()],
            ['phone' => null, 'address' => $orderData['alamat']]
        );

        // Auto-assign staff dengan pesanan aktif paling sedikit
        $staff = User::where('role', 'staff')
            ->where('is_active', true)
            ->withCount(['orders as active_orders' => function ($q) {
                $q->whereIn('status', ['pending', 'confirmed', 'in_progress']);
            }])
            ->orderBy('active_orders', 'asc')
            ->first();

        Order::create([
            'customer_id'    => $customer->id,
            'service_id'     => $orderData['service_id'],
            'staff_id'       => $staff ? $staff->id : null,
            'schedule'       => $orderData['tanggal'],
            'status'         => 'pending',
            'total'          => $orderData['total'],
            'payment_method' => $request->payment_method,
        ]);

        session()->forget('order_data');

        return redirect()->route('customer.dashboard')
            ->with('success', 'Pesanan berhasil dibuat! Menunggu konfirmasi dari staff.');
    }

    public function history()
    {
        $customer = Customer::where('user_id', auth()->id())->first();
        $orders = $customer
            ? Order::with('service')->where('customer_id', $customer->id)->latest()->get()
            : collect();

        return view('customer.order-history', compact('orders'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function create()
    {
        return view('customer.order-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'schedule'   => 'required|date',
        ]);

        Order::create([
            'user_id'    => auth()->id(),
            'service_id' => $request->service_id,
            'schedule'   => $request->schedule,
            'status'     => 'pending',
            'total'      => 0
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function history()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('customer.order-history', compact('orders'));
    }
    
}

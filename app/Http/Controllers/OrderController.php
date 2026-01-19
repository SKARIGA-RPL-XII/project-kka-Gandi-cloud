<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function create()
    {
        return view('customer.order');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'tanggal' => 'required|date',
            'alamat' => 'required'
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'layanan' => $request->layanan,
            'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
            'status' => 'pending'
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }
    public function history()
{
    $orders = \App\Models\Order::where('user_id', Auth::id())->get();
    return view('customer.history', compact('orders'));
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function history()
{
    $orders = DB::table('orders')
        ->where('user_id', Auth::id())
        ->orderBy('id', 'desc')
        ->get();

    return view('customer.order-history', compact('orders'));
}

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required|string',
            'tanggal' => 'required|date',
            'alamat' => 'required|string',
        ]);

        DB::table('orders')->insert([
    'user_id'    => Auth::id(),
    'service_id' => $request->service_id,
    'schedule'   => $request->schedule,
    'total'      => 100000,
    'status'     => 'pending',
    'created_at' => now(),
    'updated_at' => now(),
]);


        return redirect('/customer/test')->with('success', 'Pesanan berhasil dibuat!');
    }
}
public function history()
{
    $orders = DB::table('orders')
        ->where('user_id', Auth::id())
        ->orderBy('id', 'desc')
        ->get();
 DB::table('orders')->insert([
    'user_id'    => Auth::id(),
    'service_id' => $request->service_id,
    'schedule'   => $request->schedule,
    'total'      => 100000,
    'status'     => 'pending',
    'created_at' => now(),
    'updated_at' => now(),
]);
    return view('customer.order-history', compact('orders'));
}

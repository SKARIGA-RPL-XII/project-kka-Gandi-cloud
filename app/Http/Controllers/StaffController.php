<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'pending_orders' => DB::table('orders')->where('status', 'pending')->count(),
            'in_progress' => DB::table('orders')->where('status', 'proses')->count(),
            'completed_today' => DB::table('orders')->where('status', 'selesai')->whereDate('updated_at', today())->count(),
            'total_earnings' => DB::table('orders')->where('status', 'selesai')->sum('total') ?? 0
        ];
        
        $recent_orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name as customer_name')
            ->orderBy('orders.created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('staff.dashboard', compact('stats', 'recent_orders'));
    }

    public function orders()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name as customer_name')
            ->orderBy('orders.created_at', 'desc')
            ->paginate(10);
            
        return view('staff.orders', compact('orders'));
    }

    public function acceptOrder($id)
    {
        DB::table('orders')->where('id', $id)->update([
            'status' => 'proses',
            'updated_at' => now()
        ]);
        
        return redirect()->back()->with('success', 'Pesanan berhasil diterima');
    }

    public function completeOrder($id)
    {
        DB::table('orders')->where('id', $id)->update([
            'status' => 'selesai',
            'updated_at' => now()
        ]);
        
        return redirect()->back()->with('success', 'Pekerjaan berhasil diselesaikan');
    }

    public function rejectOrder($id)
    {
        DB::table('orders')->where('id', $id)->update([
            'status' => 'batal',
            'updated_at' => now()
        ]);
        
        return redirect()->back()->with('success', 'Pesanan ditolak');
    }
}
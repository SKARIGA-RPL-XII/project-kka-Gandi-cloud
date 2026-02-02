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

    public function orders(Request $request)
    {
        // Simulasi data pesanan untuk staff
        $allOrders = collect([
            (object)[
                'id' => 1,
                'customer_name' => 'John Doe',
                'layanan' => 'Pembersihan Rumah',
                'status' => 'pending',
                'tanggal' => '2024-01-28',
                'alamat' => 'Jl. Contoh No. 123, Jakarta',
                'total' => 150000,
                'created_at' => now()
            ],
            (object)[
                'id' => 2,
                'customer_name' => 'Jane Smith',
                'layanan' => 'Deep Cleaning',
                'status' => 'proses',
                'tanggal' => '2024-01-29',
                'alamat' => 'Jl. Sample No. 456, Bandung',
                'total' => 300000,
                'created_at' => now()
            ],
            (object)[
                'id' => 3,
                'customer_name' => 'Bob Wilson',
                'layanan' => 'Pembersihan Kantor',
                'status' => 'selesai',
                'tanggal' => '2024-01-27',
                'alamat' => 'Jl. Bisnis No. 789, Surabaya',
                'total' => 200000,
                'created_at' => now()
            ],
            (object)[
                'id' => 4,
                'customer_name' => 'Alice Brown',
                'layanan' => 'Pembersihan Rumah',
                'status' => 'batal',
                'tanggal' => '2024-01-26',
                'alamat' => 'Jl. Test No. 321, Medan',
                'total' => 150000,
                'created_at' => now()
            ]
        ]);
        
        // Filter berdasarkan status jika ada
        if ($request->has('status') && $request->status) {
            $orders = $allOrders->where('status', $request->status);
        } else {
            $orders = $allOrders;
        }
            
        return view('staff.orders', compact('orders'));
    }

    public function acceptOrder($id)
    {
        // Simulasi terima pesanan
        return redirect()->back()->with('success', 'Pesanan #' . $id . ' berhasil diterima dan sedang dikerjakan');
    }

    public function completeOrder($id)
    {
        // Simulasi selesaikan pesanan
        return redirect()->back()->with('success', 'Pekerjaan #' . $id . ' berhasil diselesaikan');
    }

    public function rejectOrder($id)
    {
        // Simulasi tolak pesanan
        return redirect()->back()->with('success', 'Pesanan #' . $id . ' ditolak');
    }
}
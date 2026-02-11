<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;

class StaffController extends Controller
{
   public function dashboard()
{
    try {
        $staffId = auth()->id();

        $orders = Order::with(['customer', 'service'])
            ->where('staff_id', $staffId)
            ->whereIn('status', ['pending', 'confirmed', 'in_progress'])
            ->latest()
            ->limit(10)
            ->get();
        
        $stats = [
            'pending_orders' => Order::where('staff_id', $staffId)->where('status', 'pending')->count(),
            'confirmed' => Order::where('staff_id', $staffId)->where('status', 'confirmed')->count(),
            'in_progress' => Order::where('staff_id', $staffId)->where('status', 'in_progress')->count(),
            'completed_today' => Order::where('staff_id', $staffId)
                ->where('status', 'done')
                ->whereDate('updated_at', today())
                ->count(),
            'completed_week' => Order::where('staff_id', $staffId)
                ->where('status', 'done')
                ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->count(),
            'completed_month' => Order::where('staff_id', $staffId)
                ->where('status', 'done')
                ->whereMonth('updated_at', now()->month)
                ->count(),
            'cancelled' => Order::where('staff_id', $staffId)->where('status', 'cancelled')->count(),
            'total_orders' => Order::where('staff_id', $staffId)->count(),
            'total_earnings' => Order::where('staff_id', $staffId)
                ->where('status', 'done')
                ->sum('total') ?? 0
        ];
        
        return view('staff.dashboard', compact('stats', 'orders'));

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function orders(Request $request)
    {
        $query = Order::with(['customer.user', 'service']);
        
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        
        $orders = $query->orderBy('created_at', 'desc')->get();
        return view('staff.orders', compact('orders'));
    }

    public function acceptOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'confirmed']);
            return redirect()->back()->with('success', 'Pesanan berhasil diterima. Silakan mulai pekerjaan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menerima pesanan: ' . $e->getMessage());
        }
    }

    public function startOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'in_progress']);
            return redirect()->back()->with('success', 'Pekerjaan dimulai. Selesaikan pekerjaan setelah selesai.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memulai pekerjaan: ' . $e->getMessage());
        }
    }

    public function completeOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'done']);
            return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyelesaikan pesanan: ' . $e->getMessage());
        }
    }

    public function rejectOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'Pesanan ditolak');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menolak pesanan: ' . $e->getMessage());
        }
    }

    public function deleteOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return redirect()->back()->with('success', 'Pesanan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pesanan: ' . $e->getMessage());
        }
    }

    public function profile()
    {
        $user = auth()->user();
       $staffId = auth()->id();

$stats = [
    'total_completed' => Order::where('staff_id', $staffId)->where('status', 'done')->count(),
    'total_earnings' => Order::where('staff_id', $staffId)->where('status', 'done')->sum('total') ?? 0,
    'pending' => Order::where('staff_id', $staffId)->where('status', 'pending')->count(),
    'in_progress' => Order::where('staff_id', $staffId)->where('status', 'in_progress')->count()
];

        return view('staff.profile', compact('user', 'stats'));
    }

    public function updateProfile(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . auth()->id(),
                'phone' => 'nullable|string|max:20',
                'password' => 'nullable|min:8|confirmed'
            ]);

            $user = auth()->user();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            
            if (!empty($validated['password'])) {
                $user->password = Hash::make($validated['password']);
            }
            
            $user->save();

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;

class StaffController extends Controller
{
    public function dashboard()
    {
        try {
            $orders = Order::with(['customer.user', 'service'])
                ->whereIn('status', ['pending', 'confirmed', 'in_progress'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
            
            $stats = [
                'pending_orders' => Order::where('status', 'pending')->count(),
                'confirmed' => Order::where('status', 'confirmed')->count(),
                'in_progress' => Order::where('status', 'in_progress')->count(),
                'completed_today' => Order::where('status', 'done')->whereDate('updated_at', today())->count(),
                'completed_week' => Order::where('status', 'done')->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
                'completed_month' => Order::where('status', 'done')->whereMonth('updated_at', now()->month)->count(),
                'cancelled' => Order::where('status', 'cancelled')->count(),
                'total_orders' => Order::count(),
                'total_earnings' => Order::where('status', 'done')->sum('total') ?? 0
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
        Order::findOrFail($id)->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Pesanan berhasil diterima. Silakan mulai pekerjaan.');
    }

    public function startOrder($id)
    {
        Order::findOrFail($id)->update(['status' => 'in_progress']);
        return redirect()->back()->with('success', 'Pekerjaan dimulai. Selesaikan pekerjaan setelah selesai.');
    }

    public function completeOrder($id)
    {
        Order::findOrFail($id)->update(['status' => 'done']);
        return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan');
    }

    public function rejectOrder($id)
    {
        Order::findOrFail($id)->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Pesanan ditolak');
    }

    public function deleteOrder($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus');
    }

    public function profile()
    {
        $user = auth()->user();
        $stats = [
            'total_completed' => Order::where('status', 'done')->count(),
            'total_earnings' => Order::where('status', 'done')->sum('total') ?? 0,
            'pending' => Order::where('status', 'pending')->count(),
            'in_progress' => Order::where('status', 'in_progress')->count()
        ];
        return view('staff.profile', compact('user', 'stats'));
    }

    public function updateProfile(Request $request)
    {
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
            $user->password = bcrypt($validated['password']);
        }
        
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}
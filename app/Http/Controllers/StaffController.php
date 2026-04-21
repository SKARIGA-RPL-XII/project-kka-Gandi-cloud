<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Order;
use App\Models\User;

class StaffController extends Controller
{
    public function dashboard()
    {
        try {
            $staffId = auth()->user()->id;

            $orders = Order::with(['customer', 'service'])
                ->where('payment_status', 'paid')
                ->where(function($q) use ($staffId) {
                    $q->whereNull('staff_id')->orWhere('staff_id', $staffId);
                })
                ->whereIn('status', ['pending', 'terima', 'mulai'])
                ->latest()
                ->limit(10)
                ->get();
            
            $stats = [
                'pending_orders' => Order::where('staff_id', $staffId)->where('status', 'pending')->count(),
                'terima_count' => Order::where('staff_id', $staffId)->where('status', 'terima')->count(),
                'mulai_count' => Order::where('staff_id', $staffId)->where('status', 'mulai')->count(),
                'selesai_today' => Order::where('staff_id', $staffId)
                    ->where('status', 'selesai')
                    ->whereDate('updated_at', today())
                    ->count(),
                'selesai_week' => Order::where('staff_id', $staffId)
                    ->where('status', 'selesai')
                    ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->count(),
                'selesai_month' => Order::where('staff_id', $staffId)
                    ->where('status', 'selesai')
                    ->whereMonth('updated_at', now()->month)
                    ->count(),
                'tolak_count' => Order::where('staff_id', $staffId)->where('status', 'tolak')->count(),
                'total_orders' => Order::where('staff_id', $staffId)->where('payment_status', 'paid')->count(),
                'total_earnings' => Order::where('staff_id', $staffId)
                    ->where('status', 'selesai')
                    ->sum('total_price') ?? 0
            ];
            
            return view('staff.dashboard', compact('stats', 'orders'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function orders(Request $request)
    {
        $staffId = auth()->user()->id();
        
        $query = Order::with(['customer', 'service'])
            ->where('payment_status', 'paid')
            ->where(function($q) use ($staffId) {
                $q->whereNull('staff_id')->orWhere('staff_id', $staffId);
            });
        
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        
        $orders = $query->orderBy('created_at', 'desc')->get();
        return view('staff.orders', compact('orders'));
    }

    public function terimaOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update([
                'status' => 'terima',
                'staff_id' => auth()->id()
            ]);
            return redirect()->back()->with('success', 'Pesanan berhasil diterima. Silakan proses pekerjaan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menerima pesanan: ' . $e->getMessage());
        }
    }

    public function mulaiOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'mulai']);
            return redirect()->back()->with('success', 'Pesanan mulai diproses.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memulai pesanan: ' . $e->getMessage());
        }
    }

    public function selesaiOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'selesai']);
            return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyelesaikan pesanan: ' . $e->getMessage());
        }
    }

    public function pendingOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'pending']);
            return redirect()->back()->with('success', 'Pesanan dikembalikan ke pending.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengubah status: ' . $e->getMessage());
        }
    }

    public function tolakOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'tolak']);
            return redirect()->back()->with('success', 'Pesanan berhasil ditolak.');
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
            'total_completed' => Order::where('staff_id', $staffId)->where('status', 'selesai')->count(),
            'total_earnings' => Order::where('staff_id', $staffId)->where('status', 'selesai')->sum('total_price') ?? 0,
            'pending' => Order::where('staff_id', $staffId)->where('status', 'pending')->count(),
            'mulai' => Order::where('staff_id', $staffId)->where('status', 'mulai')->count()
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
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->email), // password awal
        'role' => 'staff',
        'first_login' => true,
        'is_active' => true,
    ]);

    return back()->with('success', 'Staff berhasil ditambahkan');
}
}

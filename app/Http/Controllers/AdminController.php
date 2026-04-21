<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Customer;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => \App\Models\User::count(),
            'total_customers' => \App\Models\User::where('role', 'customer')->count(),
            'total_staff' => \App\Models\User::where('role', 'staff')->count(),
            'total_orders' => \App\Models\Order::count(),
            'pending_orders' => \App\Models\Order::where('status', 'pending')->count(),
            'completed_orders' => \App\Models\Order::where('status', 'done')->count(),
            'total_services' => \App\Models\Service::count(),
'total_revenue' => 0,
'revenue_today' => 0,
'revenue_month' => 0
        ];
        
$recentOrders = \App\Models\Order::with(['user', 'service', 'staff'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        $recentUsers = \App\Models\User::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentUsers'));
    }

    public function services()
    {
        $services = \App\Models\Service::orderBy('created_at', 'desc')->get();
        return view('admin.services', compact('services'));
    }

    public function createService()
    {
        return view('admin.service-create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        \App\Models\Service::create($validated);
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function editService($id)
    {
        $service = \App\Models\Service::findOrFail($id);
        return view('admin.service-edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        \App\Models\Service::findOrFail($id)->update($validated);
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function deleteService($id)
    {
        \App\Models\Service::findOrFail($id)->delete();
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil dihapus!');
    }

    public function users()
    {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

public function storeStaff(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
        ]);

        User::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['email']), // Password awal = email
            'role'      => 'staff',
            'is_active' => true,
        ]);

        return redirect()->route('admin.users')->with('success', 'Staff berhasil ditambahkan! Password awal: ' . $validated['email']);
    }

    public function editUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        
        // Protect admin account
        if ($user->role === 'admin') {
            return response()->json(['error' => 'Admin account cannot be edited.'], 403);
        }
        
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        
        // Protect admin account
        if ($user->role === 'admin') {
            return redirect()->route('admin.users')->with('error', 'Admin account cannot be modified.');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user->update($validated);
        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui!');
    }

    public function toggleUserStatus($id)
    {
        $user = \App\Models\User::findOrFail($id);
        
        // Protect admin account
        if ($user->role === 'admin') {
            return redirect()->route('admin.users')->with('error', 'Admin account status cannot be changed.');
        }
        
        $user->update(['is_active' => !$user->is_active]);
        $status = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.users')->with('success', 'User berhasil '.$status.'!');
    }

    public function deleteUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        
        // Protect admin account
        if ($user->role === 'admin') {
            return redirect()->route('admin.users')->with('error', 'Admin account cannot be deleted.');
        }
        
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus!');
    }

    public function orders()
    {
$orders = \App\Models\Order::with(['user', 'service', 'staff'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.orders', compact('orders'));
    }

    public function deleteOrder($id)
    {
        \App\Models\Order::findOrFail($id)->delete();
        return redirect()->route('admin.orders')->with('success', 'Pesanan berhasil dihapus!');
    }

    public function settings()
    {
        $settings = (object)[
            'site_name' => \App\Models\Setting::get('site_name', 'GOCLEAN'),
            'site_description' => \App\Models\Setting::get('site_description', 'Layanan pembersihan profesional terpercaya'),
            'contact_email' => \App\Models\Setting::get('contact_email', 'info@goclean.id'),
            'contact_phone' => \App\Models\Setting::get('contact_phone', '0812-3456-7890'),
            'maintenance_mode' => \App\Models\Setting::get('maintenance_mode', '0'),
            'allow_registration' => \App\Models\Setting::get('allow_registration', '1'),
            'email_notifications' => \App\Models\Setting::get('email_notifications', '1'),
        ];
        
        $stats = [
            'visitors_today' => \App\Models\Order::whereDate('created_at', today())->count(),
            'orders_today' => \App\Models\Order::whereDate('created_at', today())->count(),
            'users_today' => \App\Models\User::whereDate('created_at', today())->count(),
        ];
        
        return view('admin.settings', compact('settings', 'stats'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
        ]);

        foreach ($validated as $key => $value) {
            \App\Models\Setting::set($key, $value);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }

    public function toggleSetting(Request $request)
    {
        $key = $request->input('key');
        $value = $request->input('value');
        
        \App\Models\Setting::set($key, $value);
        
        return response()->json(['success' => true, 'message' => 'Setting updated']);
    }

    public function contacts()
    {
        $contacts = \App\Models\Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts', compact('contacts'));
    }

    public function deleteContact($id)
    {
        \App\Models\Contact::findOrFail($id)->delete();
        return redirect()->route('admin.contacts')->with('success', 'Pesan berhasil dihapus!');
    }
}
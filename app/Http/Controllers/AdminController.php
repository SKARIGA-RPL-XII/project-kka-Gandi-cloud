<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Simulasi data statistik admin
        $stats = [
            'total_users' => 25,
            'total_orders' => 48,
            'total_services' => 6,
            'total_revenue' => 7500000
        ];
        
        return view('admin.dashboard', compact('stats'));
    }

    public function services()
    {
        // Simulasi data layanan
        $services = collect([
            (object)[
                'id' => 1,
                'name' => 'Pembersihan Rumah',
                'description' => 'Layanan pembersihan menyeluruh untuk rumah tinggal',
                'price' => 150000,
                'duration' => '2-4 jam',
                'status' => 'active',
                'created_at' => now()
            ],
            (object)[
                'id' => 2,
                'name' => 'Pembersihan Kantor',
                'description' => 'Jaga kebersihan lingkungan kerja Anda',
                'price' => 200000,
                'duration' => '3-5 jam',
                'status' => 'active',
                'created_at' => now()
            ],
            (object)[
                'id' => 3,
                'name' => 'Deep Cleaning',
                'description' => 'Pembersihan mendalam untuk area sulit dijangkau',
                'price' => 300000,
                'duration' => '4-6 jam',
                'status' => 'active',
                'created_at' => now()
            ]
        ]);
        
        return view('admin.services', compact('services'));
    }

    public function createService()
    {
        return view('admin.service-create');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
        ]);

        // Simulasi penyimpanan layanan baru
        return redirect()->route('admin.services')->with('success', 'Layanan "' . $request->name . '" berhasil ditambahkan!');
    }

    public function editService($id)
    {
        // Simulasi data layanan untuk edit
        $service = (object)[
            'id' => $id,
            'name' => 'Pembersihan Rumah',
            'description' => 'Layanan pembersihan menyeluruh untuk rumah tinggal',
            'price' => 150000,
            'duration' => '2-4 jam',
            'status' => 'active'
        ];
        
        return view('admin.service-edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string',
        ]);

        // Simulasi update layanan
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function deleteService($id)
    {
        // Simulasi hapus layanan
        return redirect()->route('admin.services')->with('success', 'Layanan berhasil dihapus!');
    }

    public function users()
    {
        // Simulasi data users
        $users = collect([
            (object)[
                'id' => 1,
                'name' => 'John Customer',
                'email' => 'customer@test.com',
                'role' => 'customer',
                'created_at' => now()
            ],
            (object)[
                'id' => 2,
                'name' => 'Jane Staff',
                'email' => 'staff@test.com',
                'role' => 'staff',
                'created_at' => now()
            ]
        ]);
        
        return view('admin.users', compact('users'));
    }

    public function orders()
    {
        // Simulasi data pesanan untuk admin
        $orders = collect([
            (object)[
                'id' => 1,
                'customer_name' => 'John Doe',
                'service_name' => 'Pembersihan Rumah',
                'status' => 'pending',
                'total' => 150000,
                'created_at' => now()
            ],
            (object)[
                'id' => 2,
                'customer_name' => 'Jane Smith',
                'service_name' => 'Deep Cleaning',
                'status' => 'proses',
                'total' => 300000,
                'created_at' => now()
            ]
        ]);
        
        return view('admin.orders', compact('orders'));
    }

    public function settings()
    {
        // Simulasi data pengaturan
        $settings = (object)[
            'site_name' => 'GOCLEAN',
            'site_description' => 'Layanan pembersihan profesional terpercaya',
            'contact_email' => 'info@goclean.id',
            'contact_phone' => '0812-3456-7890'
        ];
        
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
        ]);

        // Simulasi update pengaturan
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
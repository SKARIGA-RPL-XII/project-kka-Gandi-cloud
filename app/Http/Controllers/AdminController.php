<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users' => DB::table('users')->count(),
            'total_orders' => DB::table('orders')->count() ?? 0,
            'total_products' => DB::table('products')->count() ?? 0,
            'total_revenue' => DB::table('orders')->sum('total') ?? 0
        ];
        
        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = DB::table('users')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function settings()
    {
        $settings = DB::table('site_settings')->first();
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

        DB::table('site_settings')->updateOrInsert(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'site_description' => $request->site_description,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'updated_at' => now()
            ]
        );

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }

    public function content()
    {
        $pages = DB::table('pages')->get();
        return view('admin.content', compact('pages'));
    }

    public function analytics()
    {
        $monthlyVisits = DB::table('site_visits')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as visits')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();

        return view('admin.analytics', compact('monthlyVisits'));
    }
}
@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')

{{-- Greeting --}}
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Selamat datang, {{ auth()->user()->name }} 👋</h2>
    <p class="text-gray-500 text-sm mt-1">Berikut ringkasan aktivitas GOCLEAN hari ini.</p>
</div>

{{-- Stats Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-lg"></i>
            </div>
            <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Total</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_users'] }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Users</p>
        <p class="text-xs text-gray-400 mt-1">{{ $stats['total_customers'] }} customer · {{ $stats['total_staff'] }} staff</p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-clipboard-list text-green-600 text-lg"></i>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">Pesanan</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_orders'] }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Pesanan</p>
        <p class="text-xs text-gray-400 mt-1">{{ $stats['pending_orders'] }} pending · {{ $stats['completed_orders'] }} selesai</p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-broom text-yellow-600 text-lg"></i>
            </div>
            <span class="text-xs font-medium text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">Layanan</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_services'] }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Layanan</p>
        <p class="text-xs text-gray-400 mt-1">Layanan aktif tersedia</p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-wallet text-purple-600 text-lg"></i>
            </div>
            <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">Revenue</span>
        </div>
        <p class="text-xl font-bold text-gray-800">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Revenue</p>
        <p class="text-xs text-gray-400 mt-1">Bulan ini: Rp {{ number_format($stats['revenue_month'], 0, ',', '.') }}</p>
    </div>
</div>

{{-- Revenue Row --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-5 text-white shadow-sm">
        <div class="flex items-center gap-3 mb-2">
            <i class="fas fa-calendar-day text-white/70"></i>
            <p class="text-white/80 text-sm">Revenue Hari Ini</p>
        </div>
        <p class="text-2xl font-bold">Rp {{ number_format($stats['revenue_today'], 0, ',', '.') }}</p>
    </div>
    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-5 text-white shadow-sm">
        <div class="flex items-center gap-3 mb-2">
            <i class="fas fa-calendar-alt text-white/70"></i>
            <p class="text-white/80 text-sm">Revenue Bulan Ini</p>
        </div>
        <p class="text-2xl font-bold">Rp {{ number_format($stats['revenue_month'], 0, ',', '.') }}</p>
    </div>
    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-5 text-white shadow-sm">
        <div class="flex items-center gap-3 mb-2">
            <i class="fas fa-chart-bar text-white/70"></i>
            <p class="text-white/80 text-sm">Rata-rata per Order</p>
        </div>
        <p class="text-2xl font-bold">Rp {{ $stats['total_orders'] > 0 ? number_format($stats['total_revenue'] / $stats['total_orders'], 0, ',', '.') : 0 }}</p>
    </div>
</div>

{{-- Quick Actions --}}
<div class="mb-6">
    <h3 class="text-base font-semibold text-gray-700 mb-3">Aksi Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        <a href="{{ route('admin.users') }}" class="bg-white border border-gray-100 rounded-2xl p-4 flex items-center gap-3 hover:shadow-md hover:border-blue-200 transition group">
            <div class="w-10 h-10 bg-blue-100 group-hover:bg-blue-500 rounded-xl flex items-center justify-center transition">
                <i class="fas fa-user-plus text-blue-500 group-hover:text-white transition"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-700">Tambah Staff</p>
                <p class="text-xs text-gray-400">Kelola users</p>
            </div>
        </a>
        <a href="{{ route('admin.services.create') }}" class="bg-white border border-gray-100 rounded-2xl p-4 flex items-center gap-3 hover:shadow-md hover:border-green-200 transition group">
            <div class="w-10 h-10 bg-green-100 group-hover:bg-green-500 rounded-xl flex items-center justify-center transition">
                <i class="fas fa-plus text-green-500 group-hover:text-white transition"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-700">Tambah Layanan</p>
                <p class="text-xs text-gray-400">Buat layanan baru</p>
            </div>
        </a>
        <a href="{{ route('admin.orders') }}" class="bg-white border border-gray-100 rounded-2xl p-4 flex items-center gap-3 hover:shadow-md hover:border-yellow-200 transition group">
            <div class="w-10 h-10 bg-yellow-100 group-hover:bg-yellow-500 rounded-xl flex items-center justify-center transition">
                <i class="fas fa-eye text-yellow-500 group-hover:text-white transition"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-700">Lihat Pesanan</p>
                <p class="text-xs text-gray-400">{{ $stats['pending_orders'] }} pending</p>
            </div>
        </a>
        <a href="{{ route('admin.contacts') }}" class="bg-white border border-gray-100 rounded-2xl p-4 flex items-center gap-3 hover:shadow-md hover:border-purple-200 transition group">
            <div class="w-10 h-10 bg-purple-100 group-hover:bg-purple-500 rounded-xl flex items-center justify-center transition">
                <i class="fas fa-envelope text-purple-500 group-hover:text-white transition"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-700">Pesan Masuk</p>
                <p class="text-xs text-gray-400">Lihat kontak</p>
            </div>
        </a>
    </div>
</div>

{{-- Recent Orders & Users --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

    {{-- Recent Orders --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-50">
            <h3 class="font-semibold text-gray-800">Pesanan Terbaru</h3>
            <a href="{{ route('admin.orders') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
                Lihat semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentOrders as $order)
            <div class="flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr($order->customer->user->name ?? 'U', 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $order->customer->user->name ?? 'Unknown' }}</p>
                        <p class="text-xs text-gray-400">{{ $order->service->name ?? '-' }} · {{ date('d M', strtotime($order->schedule)) }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                    @php
                        $badge = ['pending'=>'bg-yellow-100 text-yellow-700','confirmed'=>'bg-blue-100 text-blue-700','in_progress'=>'bg-indigo-100 text-indigo-700','done'=>'bg-green-100 text-green-700','cancelled'=>'bg-red-100 text-red-700'];
                        $label = ['pending'=>'Pending','confirmed'=>'Dikonfirmasi','in_progress'=>'Proses','done'=>'Selesai','cancelled'=>'Batal'];
                    @endphp
                    <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $badge[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                        {{ $label[$order->status] ?? $order->status }}
                    </span>
                </div>
            </div>
            @empty
            <div class="text-center py-10 text-gray-400">
                <i class="fas fa-inbox text-3xl mb-2 block opacity-40"></i>
                <p class="text-sm">Belum ada pesanan</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Recent Users --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-50">
            <h3 class="font-semibold text-gray-800">User Terbaru</h3>
            <a href="{{ route('admin.users') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
                Lihat semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($recentUsers as $user)
            <div class="flex items-center justify-between px-5 py-3 hover:bg-gray-50 transition">
                <div class="flex items-center gap-3">
                    @php
                        $colors = ['admin'=>'from-purple-400 to-purple-600','staff'=>'from-blue-400 to-blue-600','customer'=>'from-green-400 to-green-600'];
                    @endphp
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br {{ $colors[$user->role] ?? 'from-gray-400 to-gray-600' }} flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ $user->name }}</p>
                        <p class="text-xs text-gray-400">{{ $user->email }}</p>
                    </div>
                </div>
                @php
                    $roleBadge = ['admin'=>'bg-purple-100 text-purple-700','staff'=>'bg-blue-100 text-blue-700','customer'=>'bg-green-100 text-green-700'];
                @endphp
                <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $roleBadge[$user->role] ?? 'bg-gray-100 text-gray-600' }}">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
            @empty
            <div class="text-center py-10 text-gray-400">
                <i class="fas fa-users text-3xl mb-2 block opacity-40"></i>
                <p class="text-sm">Belum ada user</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection

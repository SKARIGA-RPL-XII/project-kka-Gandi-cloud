@extends('admin.layout')
@section('title','Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-lg shadow-lg text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm">Total Users</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['total_users'] }}</p>
                <p class="text-blue-100 text-xs mt-2">Customer: {{ $stats['total_customers'] }} | Staff: {{ $stats['total_staff'] }}</p>
            </div>
            <i class="fas fa-users text-5xl text-blue-200 opacity-50"></i>
        </div>
    </div>

    <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-lg shadow-lg text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm">Total Orders</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['total_orders'] }}</p>
                <p class="text-green-100 text-xs mt-2">Pending: {{ $stats['pending_orders'] }} | Done: {{ $stats['completed_orders'] }}</p>
            </div>
            <i class="fas fa-shopping-cart text-5xl text-green-200 opacity-50"></i>
        </div>
    </div>

    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 p-6 rounded-lg shadow-lg text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-yellow-100 text-sm">Total Layanan</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['total_services'] }}</p>
                <p class="text-yellow-100 text-xs mt-2">Layanan aktif</p>
            </div>
            <i class="fas fa-broom text-5xl text-yellow-200 opacity-50"></i>
        </div>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-lg shadow-lg text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm">Total Revenue</p>
                <p class="text-2xl font-bold mt-1">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
                <p class="text-purple-100 text-xs mt-2">Bulan ini: Rp {{ number_format($stats['revenue_month'], 0, ',', '.') }}</p>
            </div>
            <i class="fas fa-money-bill-wave text-5xl text-purple-200 opacity-50"></i>
        </div>
    </div>
</div>

<!-- Revenue Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-calendar-day text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Revenue Hari Ini</h3>
                <p class="text-xl font-bold text-gray-800">Rp {{ number_format($stats['revenue_today'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-calendar-week text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Revenue Bulan Ini</h3>
                <p class="text-xl font-bold text-gray-800">Rp {{ number_format($stats['revenue_month'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="fas fa-chart-line text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Rata-rata Order</h3>
                <p class="text-xl font-bold text-gray-800">Rp {{ $stats['total_orders'] > 0 ? number_format($stats['total_revenue'] / $stats['total_orders'], 0, ',', '.') : 0 }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Orders -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Pesanan Terbaru</h3>
            <a href="{{ route('admin.orders') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="space-y-3">
            @forelse($recentOrders as $order)
            <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr($order->customer->user->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-800 text-sm">{{ $order->customer->user->name ?? 'Unknown' }}</p>
                        <p class="text-xs text-gray-500">{{ $order->service->name ?? '-' }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-gray-800">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                    @if($order->status == 'pending')
                        <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                    @elseif($order->status == 'done')
                        <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full">Selesai</span>
                    @else
                        <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">{{ ucfirst($order->status) }}</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-inbox text-4xl mb-2 opacity-50"></i>
                <p class="text-sm">Belum ada pesanan</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Recent Users & Quick Actions -->
    <div class="space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Aksi Cepat</h3>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('admin.users') }}" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition group">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Kelola User</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_users'] }} users</p>
                    </div>
                </a>

                <a href="{{ route('admin.services') }}" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition group">
                    <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                        <i class="fas fa-broom"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Layanan</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_services'] }} layanan</p>
                    </div>
                </a>

                <a href="{{ route('admin.orders') }}" class="flex items-center p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition group">
                    <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Pesanan</p>
                        <p class="text-xs text-gray-500">{{ $stats['total_orders'] }} orders</p>
                    </div>
                </a>

                <a href="{{ route('admin.settings') }}" class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition group">
                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">Pengaturan</p>
                        <p class="text-xs text-gray-500">Website</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">User Terbaru</h3>
                <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="space-y-3">
                @forelse($recentUsers as $user)
                <div class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium text-gray-800 text-sm">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div>
                        @if($user->role == 'admin')
                            <span class="text-xs px-2 py-1 bg-purple-100 text-purple-800 rounded-full">Admin</span>
                        @elseif($user->role == 'staff')
                            <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">Staff</span>
                        @else
                            <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full">Customer</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-users text-4xl mb-2 opacity-50"></i>
                    <p class="text-sm">Belum ada user</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
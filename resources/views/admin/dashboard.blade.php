@extends('admin.layout')
@section('title','Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total User</h3>
                <p class="text-2xl font-bold">{{ $stats['total_users'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-shopping-cart text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Order</h3>
                <p class="text-2xl font-bold">{{ $stats['total_orders'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-full">
                <i class="fas fa-box text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Produk</h3>
                <p class="text-2xl font-bold">{{ $stats['total_products'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Revenue</h3>
                <p class="text-2xl font-bold">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="#" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100">
                <i class="fas fa-user-plus text-blue-600 mr-3"></i>
                <span>Kelola User</span>
            </a>
            <a href="#" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100">
                <i class="fas fa-plus text-green-600 mr-3"></i>
                <span>Tambah Konten</span>
            </a>
            <a href="#" class="flex items-center p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100">
                <i class="fas fa-cog text-yellow-600 mr-3"></i>
                <span>Pengaturan Website</span>
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-3">
            <div class="flex items-center p-3 border-l-4 border-blue-500 bg-blue-50">
                <i class="fas fa-user text-blue-600 mr-3"></i>
                <div>
                    <p class="text-sm">User baru mendaftar</p>
                    <p class="text-xs text-gray-500">2 menit yang lalu</p>
                </div>
            </div>
            <div class="flex items-center p-3 border-l-4 border-green-500 bg-green-50">
                <i class="fas fa-shopping-cart text-green-600 mr-3"></i>
                <div>
                    <p class="text-sm">Order baru masuk</p>
                    <p class="text-xs text-gray-500">5 menit yang lalu</p>
                </div>
            </div>
            <div class="flex items-center p-3 border-l-4 border-yellow-500 bg-yellow-50">
                <i class="fas fa-edit text-yellow-600 mr-3"></i>
                <div>
                    <p class="text-sm">Konten diperbarui</p>
                    <p class="text-xs text-gray-500">10 menit yang lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('staff.layout')

@section('title', 'Dashboard Staff')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-full">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Pesanan Pending</h3>
                <p class="text-2xl font-bold">{{ $stats['pending_orders'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-spinner text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Sedang Dikerjakan</h3>
                <p class="text-2xl font-bold">{{ $stats['in_progress'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Selesai Hari Ini</h3>
                <p class="text-2xl font-bold">{{ $stats['completed_today'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="fas fa-money-bill text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Pendapatan</h3>
                <p class="text-2xl font-bold">Rp {{ number_format($stats['total_earnings'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Pesanan Terbaru</h3>
        <div class="space-y-3">
            @forelse($recent_orders as $order)
            <div class="flex justify-between items-center p-3 border rounded-lg">
                <div>
                    <p class="font-medium">{{ $order->customer_name }}</p>
                    <p class="text-sm text-gray-600">{{ $order->layanan }}</p>
                    <p class="text-xs text-gray-500">{{ date('d/m/Y', strtotime($order->tanggal)) }}</p>
                </div>
                <div class="flex space-x-2">
                    @if($order->status == 'pending')
                        <form action="{{ route('staff.order.accept', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600">
                                Terima
                            </button>
                        </form>
                        <form action="{{ route('staff.order.reject', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">
                                Tolak
                            </button>
                        </form>
                    @elseif($order->status == 'proses')
                        <form action="{{ route('staff.order.complete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                Selesai
                            </button>
                        </form>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded text-sm">{{ ucfirst($order->status) }}</span>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-4">Tidak ada pesanan terbaru</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="#" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100">
                <i class="fas fa-list text-blue-600 mr-3"></i>
                <span>Lihat Semua Pesanan</span>
            </a>
            <a href="#" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100">
                <i class="fas fa-tasks text-green-600 mr-3"></i>
                <span>Pekerjaan Aktif</span>
            </a>
            <a href="#" class="flex items-center p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100">
                <i class="fas fa-history text-yellow-600 mr-3"></i>
                <span>Riwayat Pekerjaan</span>
            </a>
        </div>

        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
            <h4 class="font-medium mb-2">Status Hari Ini</h4>
            <div class="text-sm text-gray-600">
                <p>Jam Kerja: 08:00 - 17:00</p>
                <p>Status: <span class="text-green-600 font-medium">Aktif</span></p>
            </div>
        </div>
    </div>
</div>
@endsection

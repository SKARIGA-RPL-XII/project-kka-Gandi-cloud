@extends('staff.layout')

@section('title', 'Dashboard Staff')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="p-3 bg-yellow-100 rounded-full">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Pesanan Pending</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $stats['pending_orders'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Dikonfirmasi</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $stats['confirmed'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-spinner text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Sedang Dikerjakan</h3>
                <p class="text-2xl font-bold text-gray-800">{{ $stats['in_progress'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="fas fa-money-bill text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Pendapatan</h3>
                <p class="text-xl font-bold text-gray-800">Rp {{ number_format($stats['total_earnings'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Additional Stats Row -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-lg shadow text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm">Selesai Hari Ini</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['completed_today'] }}</p>
            </div>
            <i class="fas fa-calendar-check text-4xl text-green-200"></i>
        </div>
    </div>

    <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-lg shadow text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm">Selesai Minggu Ini</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['completed_week'] }}</p>
            </div>
            <i class="fas fa-calendar-week text-4xl text-blue-200"></i>
        </div>
    </div>

    <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-lg shadow text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm">Selesai Bulan Ini</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['completed_month'] }}</p>
            </div>
            <i class="fas fa-calendar-alt text-4xl text-purple-200"></i>
        </div>
    </div>

    <div class="bg-gradient-to-br from-gray-500 to-gray-600 p-6 rounded-lg shadow text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-100 text-sm">Total Pesanan</p>
                <p class="text-3xl font-bold mt-1">{{ $stats['total_orders'] }}</p>
            </div>
            <i class="fas fa-clipboard-list text-4xl text-gray-200"></i>
        </div>
    </div>
</div>

<!-- Recent Orders & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Pesanan Terbaru</h3>
            <a href="{{ route('staff.orders') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <div class="space-y-3">
            @forelse($orders as $order)
            <div class="flex justify-between items-center p-4 border rounded-lg hover:bg-gray-50 transition">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-[#005c02] to-[#00f7ff] rounded-full flex items-center justify-center text-white font-bold">
                        {{ substr($order->customer->user->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">{{ $order->customer->user->name ?? 'Unknown' }}</p>
                        <p class="text-sm text-gray-600">{{ $order->service->name ?? '-' }}</p>
                        <p class="text-xs text-gray-500">
                            <i class="fas fa-calendar mr-1"></i>{{ date('d/m/Y', strtotime($order->schedule)) }}
                            <span class="mx-2">•</span>
                            <i class="fas fa-money-bill mr-1"></i>Rp {{ number_format($order->total, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    @if($order->status == 'pending')
                        <form action="{{ route('staff.order.accept', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-green-500 text-white px-3 py-2 rounded text-sm hover:bg-green-600 transition">
                                <i class="fas fa-check mr-1"></i>Terima
                            </button>
                        </form>
                        <form action="{{ route('staff.order.reject', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-2 rounded text-sm hover:bg-red-600 transition"
                                    onclick="return confirm('Yakin ingin menolak pesanan ini?')">
                                <i class="fas fa-times mr-1"></i>Tolak
                            </button>
                        </form>
                    @elseif($order->status == 'confirmed')
                        <form action="{{ route('staff.order.start', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-blue-500 text-white px-3 py-2 rounded text-sm hover:bg-blue-600 transition"
                                    onclick="return confirm('Mulai mengerjakan pesanan ini?')">
                                <i class="fas fa-play mr-1"></i>Mulai
                            </button>
                        </form>
                    @elseif($order->status == 'in_progress')
                        <form action="{{ route('staff.order.complete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="bg-purple-500 text-white px-3 py-2 rounded text-sm hover:bg-purple-600 transition"
                                    onclick="return confirm('Yakin pekerjaan sudah selesai?')">
                                <i class="fas fa-check-circle mr-1"></i>Selesai
                            </button>
                        </form>
                    @else
                        <span class="px-3 py-2 bg-gray-100 text-gray-600 rounded text-sm">{{ ucfirst($order->status) }}</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center py-12">
                <i class="fas fa-inbox text-gray-300 text-5xl mb-3"></i>
                <p class="text-gray-500 font-medium">Tidak ada pesanan terbaru</p>
                <p class="text-gray-400 text-sm">Pesanan baru akan muncul di sini</p>
            </div>
            @endforelse
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="{{ route('staff.orders') }}" class="flex items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition group">
                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                    <i class="fas fa-list"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium text-gray-800">Semua Pesanan</p>
                    <p class="text-xs text-gray-500">Lihat daftar lengkap</p>
                </div>
            </a>

            <a href="{{ route('staff.orders', ['status' => 'pending']) }}" class="flex items-center p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition group">
                <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium text-gray-800">Pesanan Pending</p>
                    <p class="text-xs text-gray-500">{{ $stats['pending_orders'] }} pesanan menunggu</p>
                </div>
            </a>

            <a href="{{ route('staff.orders', ['status' => 'in_progress']) }}" class="flex items-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition group">
                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium text-gray-800">Pekerjaan Aktif</p>
                    <p class="text-xs text-gray-500">{{ $stats['in_progress'] }} sedang dikerjakan</p>
                </div>
            </a>

            <a href="{{ route('staff.profile') }}" class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition group">
                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center text-white group-hover:scale-110 transition">
                    <i class="fas fa-user"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium text-gray-800">Profil Saya</p>
                    <p class="text-xs text-gray-500">Kelola akun</p>
                </div>
            </a>
        </div>

        <div class="mt-6 p-4 bg-gradient-to-br from-[#005c02] to-[#00f7ff] rounded-lg text-white">
            <h4 class="font-medium mb-2">Status Hari Ini</h4>
            <div class="text-sm">
                <p class="flex justify-between mb-1">
                    <span>Jam Kerja:</span>
                    <span class="font-medium">08:00 - 17:00</span>
                </p>
                <p class="flex justify-between">
                    <span>Status:</span>
                    <span class="font-medium">✓ Aktif</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

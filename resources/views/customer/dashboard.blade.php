@extends('customer.layout')
@section('title', 'Dashboard')

@section('content')

{{-- Greeting --}}
<div class="bg-gradient-to-r from-green-600 to-teal-500 rounded-2xl p-6 mb-6 text-white">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold">Halo, {{ auth()->user()->name }}! 👋</h2>
            <p class="text-white/80 text-sm mt-1">Selamat datang di GOCLEAN. Apa yang bisa kami bantu hari ini?</p>
        </div>
        <div class="hidden sm:block">
            <a href=\"/customer/order-create\" class=\"bg-white text-green-700 font-semibold px-4 py-2 rounded-xl text-sm hover:bg-green-50 transition\">
                <i class=\"fas fa-plus mr-1\"></i> Pesan Sekarang
            </a>
        </div>
    </div>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
@php
        $user = auth()->user();
        $orders = \App\Models\Order::where('user_id', $user->id)->get();
        $total    = $orders->count();
        $aktif    = $orders->whereIn('status', ['pending','terima','mulai'])->count();
        $selesai  = $orders->where('status','selesai')->count();
        $batal    = $orders->where('status','tolak')->count();
    @endphp
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-clipboard-list text-blue-600"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $total }}</p>
        <p class="text-xs text-gray-500 mt-1">Total Pesanan</p>
    </div>
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
        <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-clock text-yellow-600"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $aktif }}</p>
        <p class="text-xs text-gray-500 mt-1">Pesanan Aktif</p>
    </div>
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-check-circle text-green-600"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $selesai }}</p>
        <p class="text-xs text-gray-500 mt-1">Selesai</p>
    </div>
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
        <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center mb-3">
            <i class="fas fa-times-circle text-red-500"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $batal }}</p>
        <p class="text-xs text-gray-500 mt-1">Dibatalkan</p>
    </div>
</div>

{{-- Recent Orders --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-50">
        <h3 class="font-semibold text-gray-800">Pesanan Terbaru</h3>
        <a href=\"/customer/order-history\" class=\"text-xs text-green-600 hover:text-green-700 font-medium\">
            Lihat semua <i class=\"fas fa-arrow-right ml-1\"></i>
        </a>
    </div>

    @php
        $statusBadge = ['pending'=>'bg-yellow-100 text-yellow-700','confirmed'=>'bg-blue-100 text-blue-700','in_progress'=>'bg-indigo-100 text-indigo-700','done'=>'bg-green-100 text-green-700','cancelled'=>'bg-red-100 text-red-700'];
        $statusLabel = ['pending'=>'Menunggu','confirmed'=>'Dikonfirmasi','in_progress'=>'Dikerjakan','done'=>'Selesai','cancelled'=>'Dibatalkan'];
    @endphp

    <div class="divide-y divide-gray-50">
        @forelse($orders->take(5) as $order)
        <div class="flex items-center justify-between px-5 py-4 hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-teal-500 rounded-xl flex items-center justify-center text-white flex-shrink-0">
                    <i class="fas fa-broom text-sm"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">{{ $order->service->name ?? '-' }}</p>
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-calendar mr-1"></i>{{ date('d M Y', strtotime($order->schedule)) }}
                        · {{ ucfirst($order->payment_method ?? '-') }}
                    </p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-sm font-bold text-gray-800">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $statusBadge[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                    {{ $statusLabel[$order->status] ?? $order->status }}
                </span>
            </div>
        </div>
        @empty
        <div class="text-center py-12 text-gray-400">
            <i class="fas fa-clipboard text-4xl mb-3 block opacity-30"></i>
            <p class="text-sm font-medium">Belum ada pesanan</p>
            <a href=\"/customer/order-create\" class=\"inline-block mt-3 bg-green-600 text-white text-xs px-4 py-2 rounded-lg hover:bg-green-700 transition\">
                Buat Pesanan Pertama
            </a>
        </div>
        @endforelse
    </div>
</div>

@endsection

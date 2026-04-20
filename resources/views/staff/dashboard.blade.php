@extends('staff.layout')
@section('title', 'Dashboard')

@section('content')

<div class="mb-6">
    <h2 class="text-xl font-bold text-gray-800">Halo, {{ auth()->user()->name }}! 👋</h2>
    <p class="text-gray-500 text-sm mt-1">Berikut ringkasan pekerjaan Anda hari ini.</p>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([
        ['label'=>'Pending','value'=>$stats['pending_orders'],'icon'=>'fa-clock','color'=>'bg-yellow-100 text-yellow-600'],
        ['label'=>'Dikonfirmasi','value'=>$stats['confirmed'],'icon'=>'fa-check','color'=>'bg-blue-100 text-blue-600'],
        ['label'=>'Dikerjakan','value'=>$stats['in_progress'],'icon'=>'fa-spinner','color'=>'bg-indigo-100 text-indigo-600'],
        ['label'=>'Total Pesanan','value'=>$stats['total_orders'],'icon'=>'fa-clipboard-list','color'=>'bg-gray-100 text-gray-600'],
    ] as $s)
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100">
        <div class="w-10 h-10 {{ $s['color'] }} rounded-xl flex items-center justify-center mb-3">
            <i class="fas {{ $s['icon'] }}"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $s['value'] }}</p>
        <p class="text-xs text-gray-500 mt-1">{{ $s['label'] }}</p>
    </div>
    @endforeach
</div>

{{-- Revenue & Completed --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-5 text-white">
        <p class="text-white/70 text-sm mb-1">Selesai Hari Ini</p>
        <p class="text-3xl font-bold">{{ $stats['completed_today'] }}</p>
    </div>
    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-5 text-white">
        <p class="text-white/70 text-sm mb-1">Selesai Bulan Ini</p>
        <p class="text-3xl font-bold">{{ $stats['completed_month'] }}</p>
    </div>
    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl p-5 text-white">
        <p class="text-white/70 text-sm mb-1">Total Pendapatan</p>
        <p class="text-xl font-bold">Rp {{ number_format($stats['total_earnings'], 0, ',', '.') }}</p>
    </div>
</div>

{{-- Recent Orders --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-50">
        <h3 class="font-semibold text-gray-800">Pesanan Aktif</h3>
        <a href="{{ route('staff.orders') }}" class="text-xs text-blue-600 hover:text-blue-700 font-medium">
            Lihat semua <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    @php
        $badge = ['pending'=>'bg-yellow-100 text-yellow-700','confirmed'=>'bg-blue-100 text-blue-700','in_progress'=>'bg-indigo-100 text-indigo-700','done'=>'bg-green-100 text-green-700','cancelled'=>'bg-red-100 text-red-700'];
        $label = ['pending'=>'Pending','confirmed'=>'Dikonfirmasi','in_progress'=>'Dikerjakan','done'=>'Selesai','cancelled'=>'Batal'];
    @endphp
    <div class="divide-y divide-gray-50">
        @forelse($orders as $order)
        <div class="flex items-center justify-between px-5 py-4 hover:bg-gray-50 transition">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                    {{ strtoupper(substr($order->customer->user->name ?? 'U', 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">{{ $order->customer->user->name ?? 'Unknown' }}</p>
                    <p class="text-xs text-gray-400">{{ $order->service->name ?? '-' }} · {{ date('d M Y', strtotime($order->schedule)) }}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs px-2 py-1 rounded-full font-medium {{ $badge[$order->status] ?? '' }}">
                    {{ $label[$order->status] ?? $order->status }}
                </span>
                @if($order->status == 'pending')
                    <form action="{{ route('staff.order.accept', $order->id) }}" method="POST">
                        @csrf
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition">
                            Terima
                        </button>
                    </form>
                @elseif($order->status == 'confirmed')
                    <form action="{{ route('staff.order.start', $order->id) }}" method="POST">
                        @csrf
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition">
                            Mulai
                        </button>
                    </form>
                @elseif($order->status == 'in_progress')
                    <form action="{{ route('staff.order.complete', $order->id) }}" method="POST">
                        @csrf
                        <button class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition">
                            Selesai
                        </button>
                    </form>
                @endif
            </div>
        </div>
        @empty
        <div class="text-center py-12 text-gray-400">
            <i class="fas fa-inbox text-3xl mb-2 block opacity-30"></i>
            <p class="text-sm">Tidak ada pesanan aktif</p>
        </div>
        @endforelse
    </div>
</div>

@endsection

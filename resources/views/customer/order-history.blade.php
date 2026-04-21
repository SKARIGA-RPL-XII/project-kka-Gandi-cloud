@extends('customer.layout')
@section('title', 'Histori Pesanan')

@section('content')

@php
    $statusBadge = [
        'pending'=>'bg-yellow-100 text-yellow-700',
        'terima'=>'bg-blue-100 text-blue-700', 
'mulai'=>'bg-indigo-100 text-indigo-700',
        'selesai'=>'bg-green-100 text-green-700',
        'tolak'=>'bg-red-100 text-red-700'
    ];
    $statusLabel = [
        'pending'=>'Menunggu',
        'terima'=>'Diterima',
        'mulai'=>'Diproses', 
        'selesai'=>'Selesai',
        'tolak'=>'Ditolak'
    ];
@endphp

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Histori Pesanan</h2>
        <p class="text-gray-500 text-sm mt-1">Semua riwayat pesanan Anda</p>
    </div>
    <a href="{{ route('order.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition">
        <i class="fas fa-plus mr-1"></i> Pesan Lagi
    </a>
</div>

@if($orders->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-clipboard-list text-gray-400 text-2xl"></i>
        </div>
        <h3 class="font-semibold text-gray-700 mb-2">Belum Ada Pesanan</h3>
        <p class="text-gray-400 text-sm mb-5">Anda belum pernah membuat pesanan</p>
        <a href="{{ route('order.create') }}" class="inline-block bg-green-600 text-white text-sm font-semibold px-6 py-2 rounded-xl hover:bg-green-700 transition">
            Buat Pesanan Pertama
        </a>
    </div>
@else
    <div class="space-y-3">
        @foreach($orders as $order)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-teal-500 rounded-xl flex items-center justify-center text-white flex-shrink-0">
                        <i class="fas fa-broom"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">{{ $order->service->name ?? '-' }}</h4>
                        <div class="flex flex-wrap gap-3 mt-1">
                            <span class="text-xs text-gray-400">
                                <i class="fas fa-calendar mr-1"></i>{{ $order->order_date ? date('d M Y', strtotime($order->order_date)) : '-' }}
                            </span>
                            <span class="text-xs text-gray-400">
                                <i class="fas fa-credit-card mr-1"></i>{{ ucfirst($order->payment_method ?? '-') }}
                            </span>
                            <span class="text-xs text-gray-400">
                                <i class="fas fa-clock mr-1"></i>{{ $order->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-right flex-shrink-0">
                    <p class="font-bold text-gray-800">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    <span class="inline-block mt-1 text-xs px-3 py-1 rounded-full font-medium {{ $statusBadge[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                        {{ $statusLabel[$order->status] ?? $order->status }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

@endsection

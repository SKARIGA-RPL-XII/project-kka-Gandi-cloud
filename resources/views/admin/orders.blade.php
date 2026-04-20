@extends('admin.layout')
@section('title', 'Kelola Pesanan')

@section('content')

@php
    $badge = [
        'pending'=>'bg-yellow-100 text-yellow-700',
        'terima'=>'bg-blue-100 text-blue-700', 
        'proses'=>'bg-indigo-100 text-indigo-700',
        'selesai'=>'bg-green-100 text-green-700',
        'batal'=>'bg-red-100 text-red-700'
    ];
    $label = [
        'pending'=>'Pending',
        'terima'=>'Diterima',
        'proses'=>'Diproses', 
        'selesai'=>'Selesai',
        'batal'=>'Batal'
    ];
@endphp

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Semua Pesanan</h2>
        <p class="text-gray-500 text-sm mt-1">Total {{ $orders->count() }} pesanan</p>
    </div>
</div>

@if($orders->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
        <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-gray-500">Belum ada pesanan</p>
    </div>
@else
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Customer</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Layanan</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Jadwal</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Staff</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Total</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                        <th class="px-5 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                    {{ strtoupper(substr($order->customer->name ?? 'U', 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $order->customer->name ?? 'Unknown' }}</p>
                                    <p class="text-xs text-gray-400">{{ $order->customer->email ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4">
                            <p class="text-sm font-medium text-gray-800">{{ $order->service->name ?? '-' }}</p>
                            <p class="text-xs text-gray-400">{{ ucfirst($order->payment_method ?? '-') }}</p>
                        </td>
                        <td class="px-5 py-4">
                            <p class="text-sm text-gray-700">{{ $order->order_date ? date('d M Y', strtotime($order->order_date)) : '-' }}</p>
                        </td>
                        <td class="px-5 py-4">
                            <p class="text-sm text-gray-700">{{ $order->staff->name ?? '<span class="text-gray-400 italic">Belum assign</span>' }}</p>
                        </td>
                        <td class="px-5 py-4">
                            <p class="text-sm font-bold text-gray-800">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-5 py-4">
                            <span class="text-xs px-2 py-1 rounded-full font-medium {{ $badge[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ $label[$order->status] ?? $order->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-center">
                            <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus riwayat pesanan yang sudah selesai ini?')" 
                                    @if($order->status != 'selesai') disabled title="Hanya bisa hapus setelah selesai" @endif
                                    class="text-red-400 hover:text-red-600 transition {{ $order->status != 'selesai' ? 'opacity-50 cursor-not-allowed' : '' }}" title="Hapus">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

@endsection

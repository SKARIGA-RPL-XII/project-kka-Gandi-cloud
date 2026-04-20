@extends('staff.layout')
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

{{-- Filter Tabs --}}
<div class="flex flex-wrap gap-2 mb-5">
    @foreach([''=>'Semua','pending'=>'Pending','confirmed'=>'Dikonfirmasi','in_progress'=>'Dikerjakan','done'=>'Selesai','cancelled'=>'Batal'] as $val=>$lbl)
    <a href="{{ route('staff.orders', $val ? ['status'=>$val] : []) }}"
        class="px-4 py-2 rounded-xl text-sm font-medium transition
        {{ request('status') == $val ? 'bg-gray-800 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
        {{ $lbl }}
        @if($val == '' || request('status') == $val)
            <span class="ml-1 text-xs opacity-70">({{ $orders->count() }})</span>
        @endif
    </a>
    @endforeach
</div>

@if($orders->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
        <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-gray-500 font-medium">Tidak ada pesanan</p>
    </div>
@else
    <div class="space-y-3">
        @foreach($orders as $order)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        {{ strtoupper(substr($order->customer->name ?? 'U', 0, 1)) }}
                    </div>
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h4 class="font-semibold text-gray-800">{{ $order->customer->name ?? 'Unknown' }}</h4>
                            <span class="text-xs px-2 py-0.5 rounded-full font-medium {{ $badge[$order->status] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ $label[$order->status] ?? $order->status }}
                            </span>
                        </div>
                        <div class="flex flex-wrap gap-3 mt-1">
                            <span class="text-xs text-gray-400"><i class="fas fa-broom mr-1"></i>{{ $order->service->name ?? '-' }}</span>
                            <span class="text-xs text-gray-400"><i class="fas fa-calendar mr-1"></i>{{ date('d M Y', strtotime($order->order_date)) }}</span>
                            <span class="text-xs text-gray-400"><i class="fas fa-credit-card mr-1"></i>{{ ucfirst($order->payment_method ?? '-') }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 flex-shrink-0">
                    <div class="text-right">
                        <p class="font-bold text-gray-800">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-400">{{ $order->service->duration ?? 0 }} menit</p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-2">
                        @if($order->status == 'pending')
                            <form action="{{ route('staff.order.terima', $order->id) }}" method="POST">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    <i class="fas fa-check mr-1"></i>Terima
                                </button>
                            </form>
                            <form action="{{ route('staff.order.pending', $order->id) }}" method="POST">
                                @csrf
                                <button onclick="return confirm('Kembalikan ke pending?')" class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    <i class="fas fa-pause mr-1"></i>Pending
                                </button>
                            </form>
                        @elseif($order->status == 'terima')
                            <form action="{{ route('staff.order.proses', $order->id) }}" method="POST">
                                @csrf
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    <i class="fas fa-play mr-1"></i>Proses
                                </button>
                            </form>
                        @elseif($order->status == 'proses')
                            <form action="{{ route('staff.order.selesai', $order->id) }}" method="POST">
                                @csrf
                                <button onclick="return confirm('Tandai selesai?')" class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    <i class="fas fa-check-circle mr-1"></i>Selesai
                                </button>
                            </form>
                        @elseif(in_array($order->status, ['selesai','pending']))
                            <form action="{{ route('staff.order.delete', $order->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus pesanan ini?')" class="bg-gray-400 hover:bg-gray-500 text-white px-3 py-2 rounded-xl text-xs font-semibold transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

@endsection

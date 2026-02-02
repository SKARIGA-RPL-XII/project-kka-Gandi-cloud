@extends('staff.layout')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Pesanan</h2>
    
    <div class="flex space-x-2">
        <a href="/staff/orders/test" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 {{ !request('status') ? 'bg-blue-500 text-white' : '' }}">
            Semua
        </a>
        <a href="/staff/orders/test?status=pending" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 {{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : '' }}">
            Pending
        </a>
        <a href="/staff/orders/test?status=proses" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 {{ request('status') == 'proses' ? 'bg-blue-500 text-white' : '' }}">
            Proses
        </a>
        <a href="/staff/orders/test?status=selesai" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 {{ request('status') == 'selesai' ? 'bg-green-500 text-white' : '' }}">
            Selesai
        </a>
    </div>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Customer
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Layanan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Alamat
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-medium">
                                    {{ substr($order->customer_name, 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $order->customer_name }}</div>
                                <div class="text-sm text-gray-500">ID: #{{ $order->id }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $order->layanan }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ date('d/m/Y', strtotime($order->tanggal)) }}</div>
                        <div class="text-sm text-gray-500">{{ date('H:i', strtotime($order->created_at)) }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 max-w-xs truncate" title="{{ $order->alamat }}">
                            {{ $order->alamat }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($order->status == 'pending')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        @elseif($order->status == 'proses')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                Proses
                            </span>
                        @elseif($order->status == 'selesai')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Selesai
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                Batal
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        @if($order->status == 'pending')
                            <div class="flex space-x-2">
                                <form action="/staff/order/{{ $order->id }}/accept" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                                        Terima
                                    </button>
                                </form>
                                <form action="/staff/order/{{ $order->id }}/reject" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs" 
                                            onclick="return confirm('Yakin ingin menolak pesanan ini?')">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        @elseif($order->status == 'proses')
                            <form action="/staff/order/{{ $order->id }}/complete" method="POST" style="display:inline;">
                                @csrf
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs"
                                        onclick="return confirm('Yakin pekerjaan sudah selesai?')">
                                    Selesai
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center">
                        <div class="text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-4"></i>
                            <p class="text-lg font-medium">Tidak ada pesanan</p>
                            <p class="text-sm">Belum ada pesanan yang masuk</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if(method_exists($orders, 'links'))
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $orders->links() }}
        </div>
    @endif
</div>
@endsection
@extends('staff.layout')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b">
        <h3 class="text-lg font-semibold">Daftar Pesanan</h3>
    </div>

    <div class="p-6">
        <!-- Filter Status -->
        <div class="mb-6 flex space-x-4">
            <select class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>Semua Status</option>
                <option>Pending</option>
                <option>Proses</option>
                <option>Selesai</option>
                <option>Batal</option>
            </select>
            <input type="date" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-2 text-left">Customer</th>
                        <th class="px-4 py-2 text-left">Layanan</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">Alamat</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Total</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2">{{ $order->layanan }}</td>
                        <td class="px-4 py-2">{{ date('d/m/Y', strtotime($order->tanggal)) }}</td>
                        <td class="px-4 py-2">
                            <div class="max-w-xs truncate" title="{{ $order->alamat }}">
                                {{ $order->alamat }}
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            @if($order->status == 'pending')
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Pending</span>
                            @elseif($order->status == 'proses')
                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">Proses</span>
                            @elseif($order->status == 'selesai')
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Selesai</span>
                            @else
                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Batal</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">
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
                                            Selesaikan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-500 text-sm">-</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                            Tidak ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($orders, 'links'))
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
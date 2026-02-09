@extends('staff.layout')

@section('title', 'Kelola Pesanan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Kelola Pesanan</h2>
    
    <div class="flex space-x-2">
        <a href="{{ route('staff.orders') }}" 
           class="px-4 py-2 rounded-lg font-medium transition {{ !request('status') ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-list mr-1"></i> Semua
        </a>
        <a href="{{ route('staff.orders', ['status' => 'pending']) }}" 
           class="px-4 py-2 rounded-lg font-medium transition {{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-clock mr-1"></i> Pending
        </a>
        <a href="{{ route('staff.orders', ['status' => 'confirmed']) }}" 
           class="px-4 py-2 rounded-lg font-medium transition {{ request('status') == 'confirmed' ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-check mr-1"></i> Dikonfirmasi
        </a>
        <a href="{{ route('staff.orders', ['status' => 'in_progress']) }}" 
           class="px-4 py-2 rounded-lg font-medium transition {{ request('status') == 'in_progress' ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-spinner mr-1"></i> Proses
        </a>
        <a href="{{ route('staff.orders', ['status' => 'done']) }}" 
           class="px-4 py-2 rounded-lg font-medium transition {{ request('status') == 'done' ? 'bg-purple-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-check-circle mr-1"></i> Selesai
        </a>
        <a href="{{ route('staff.orders', ['status' => 'cancelled']) }}" 
           class="px-4 py-2 rounded-lg font-medium transition {{ request('status') == 'cancelled' ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
            <i class="fas fa-times mr-1"></i> Batal
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-[#005c02] to-[#00f7ff] text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Customer
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Layanan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Jadwal
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Total
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($orders as $order)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#005c02] to-[#00f7ff] flex items-center justify-center text-white font-bold">
                                    {{ substr($order->customer->user->name ?? 'U', 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $order->customer->user->name ?? 'Unknown' }}</div>
                                <div class="text-sm text-gray-500">{{ $order->customer->user->email ?? '-' }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $order->service->name ?? '-' }}</div>
                        <div class="text-sm text-gray-500">{{ $order->service->duration ?? 0 }} menit</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            <i class="fas fa-calendar mr-1 text-gray-400"></i>
                            {{ date('d M Y', strtotime($order->schedule)) }}
                        </div>
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-1 text-gray-400"></i>
                            {{ date('H:i', strtotime($order->created_at)) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-gray-900">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($order->status == 'pending')
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i> Pending
                            </span>
                        @elseif($order->status == 'confirmed')
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fas fa-check mr-1"></i> Dikonfirmasi
                            </span>
                        @elseif($order->status == 'in_progress')
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                <i class="fas fa-spinner mr-1"></i> Proses
                            </span>
                        @elseif($order->status == 'done')
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                                <i class="fas fa-check-circle mr-1"></i> Selesai
                            </span>
                        @else
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fas fa-times mr-1"></i> Batal
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        @if($order->status == 'pending')
                            <div class="flex space-x-2">
                                <form action="{{ route('staff.order.accept', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded text-xs transition">
                                        <i class="fas fa-check mr-1"></i>Terima
                                    </button>
                                </form>
                                <form action="{{ route('staff.order.reject', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded text-xs transition" 
                                            onclick="return confirm('Yakin ingin menolak pesanan ini?')">
                                        <i class="fas fa-times mr-1"></i>Tolak
                                    </button>
                                </form>
                            </div>
                        @elseif($order->status == 'confirmed')
                            <form action="{{ route('staff.order.start', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded text-xs transition"
                                        onclick="return confirm('Mulai mengerjakan pesanan ini?')">
                                    <i class="fas fa-play mr-1"></i>Mulai Pekerjaan
                                </button>
                            </form>
                        @elseif($order->status == 'in_progress')
                            <form action="{{ route('staff.order.complete', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="bg-purple-500 hover:bg-purple-600 text-white px-3 py-2 rounded text-xs transition"
                                        onclick="return confirm('Yakin pekerjaan sudah selesai?')">
                                    <i class="fas fa-check-circle mr-1"></i>Selesaikan
                                </button>
                            </form>
                        @elseif($order->status == 'done' || $order->status == 'cancelled')
                            <form action="{{ route('staff.order.delete', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded text-xs transition"
                                        onclick="return confirm('Yakin ingin menghapus pesanan ini dari riwayat?')">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400 text-xs">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="text-gray-500">
                            <i class="fas fa-inbox text-5xl mb-4 text-gray-300"></i>
                            <p class="text-lg font-medium">Tidak ada pesanan</p>
                            <p class="text-sm">Belum ada pesanan yang masuk</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Summary Stats -->
@if($orders->count() > 0)
<div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500 text-sm">Total Pesanan</p>
        <p class="text-2xl font-bold text-gray-800">{{ $orders->count() }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500 text-sm">Total Nilai</p>
        <p class="text-2xl font-bold text-green-600">Rp {{ number_format($orders->sum('total'), 0, ',', '.') }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500 text-sm">Rata-rata</p>
        <p class="text-2xl font-bold text-blue-600">Rp {{ number_format($orders->avg('total'), 0, ',', '.') }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
        <p class="text-gray-500 text-sm">Status</p>
        <p class="text-2xl font-bold text-purple-600">{{ ucfirst(request('status') ?? 'Semua') }}</p>
    </div>
</div>
@endif
@endsection
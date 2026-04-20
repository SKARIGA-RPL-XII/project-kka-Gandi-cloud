@extends('admin.layout')
@section('title', 'Kelola Layanan')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Kelola Layanan</h2>
        <p class="text-gray-500 text-sm mt-1">{{ $services->count() }} layanan tersedia</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Layanan
    </a>
</div>

@if($services->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-16 text-center">
        <i class="fas fa-broom text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-gray-500 font-medium">Belum ada layanan</p>
        <a href="{{ route('admin.services.create') }}" class="inline-block mt-3 bg-green-600 text-white text-sm px-4 py-2 rounded-xl hover:bg-green-700 transition">Tambah Sekarang</a>
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($services as $service)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="bg-gradient-to-br from-green-500 to-teal-600 p-5 text-white">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-broom"></i>
                    </div>
                    <span class="text-xs bg-white/20 px-2 py-1 rounded-full">{{ $service->duration }} menit</span>
                </div>
                <h3 class="font-bold text-lg">{{ $service->name }}</h3>
                <p class="text-2xl font-extrabold mt-1">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
            </div>
            <div class="p-5">
                <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($service->description, 80) }}</p>
                <div class="flex gap-2">
                    <a href="{{ route('admin.services.edit', $service->id) }}"
                        class="flex-1 text-center bg-yellow-50 hover:bg-yellow-100 text-yellow-700 font-semibold py-2 rounded-xl text-sm transition">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.services.delete', $service->id) }}" method="POST" class="flex-1">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Hapus layanan ini?')"
                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2 rounded-xl text-sm transition">
                            <i class="fas fa-trash mr-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif

@endsection

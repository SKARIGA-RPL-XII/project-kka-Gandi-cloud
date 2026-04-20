@extends('admin.layout')
@section('title', 'Edit Layanan')

@section('content')

<div class="max-w-2xl mx-auto">
    <a href="{{ route('admin.services') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-sm mb-5 transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Layanan
    </a>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-5">Edit Layanan</h2>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-5 text-sm">
                @foreach($errors->all() as $e)<div><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</div>@endforeach
            </div>
        @endif

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" required rows="3"
                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 resize-none">{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" value="{{ old('price', $service->price) }}" required min="0" step="1000"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Durasi (menit) <span class="text-red-500">*</span></label>
                    <input type="number" name="duration" value="{{ old('duration', $service->duration) }}" required min="1"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                </div>
            </div>
            <div class="flex gap-3 pt-2">
                <a href="{{ route('admin.services') }}" class="flex-1 text-center py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="flex-1 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold transition">
                    <i class="fas fa-save mr-1"></i> Update Layanan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@extends('customer.layout')
@section('title', 'Profil Saya')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Profil Saya</h2>
        <p class="text-gray-500 text-sm mt-1">Kelola informasi akun Anda</p>
    </div>

    {{-- Profile Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-5">
        <div class="flex items-center gap-5 mb-6 pb-5 border-b border-gray-50">
            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white text-2xl font-bold flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h3 class="font-bold text-gray-800 text-lg">{{ auth()->user()->name }}</h3>
                <p class="text-gray-400 text-sm">{{ auth()->user()->email }}</p>
                <span class="inline-block mt-1 text-xs px-2 py-0.5 bg-green-100 text-green-700 rounded-full font-medium">Customer</span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm">
            <div class="bg-gray-50 rounded-xl p-3">
                <p class="text-gray-400 text-xs mb-1">Bergabung</p>
                <p class="font-semibold text-gray-700">{{ date('d M Y', strtotime(auth()->user()->created_at)) }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-3">
                <p class="text-gray-400 text-xs mb-1">Status Akun</p>
                <p class="font-semibold text-green-600">Aktif</p>
            </div>
        </div>
    </div>

    {{-- Info --}}
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-sm text-blue-700">
        <i class="fas fa-info-circle mr-2"></i>
        Untuk mengubah data akun, silakan hubungi admin melalui halaman <a href="{{ route('contact') }}" class="font-semibold underline">Kontak</a>.
    </div>
</div>

@endsection

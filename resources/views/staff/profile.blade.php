@extends('staff.layout')
@section('title', 'Profil Saya')

@section('content')

<div class="max-w-3xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- Profile Card --}}
    <div class="space-y-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-3">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <h3 class="font-bold text-gray-800">{{ auth()->user()->name }}</h3>
            <p class="text-gray-400 text-sm">{{ auth()->user()->email }}</p>
            <span class="inline-block mt-2 text-xs px-3 py-1 bg-blue-100 text-blue-700 rounded-full font-medium">Staff Aktif</span>
            <div class="mt-4 pt-4 border-t border-gray-50 text-sm space-y-2">
                <div class="flex justify-between"><span class="text-gray-400">Bergabung</span><span class="font-medium text-gray-700">{{ date('d M Y', strtotime(auth()->user()->created_at)) }}</span></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h4 class="font-semibold text-gray-800 mb-3 text-sm">Statistik</h4>
            <div class="space-y-2">
                @foreach([['label'=>'Selesai','value'=>$stats['total_completed'],'color'=>'text-green-600'],['label'=>'Pending','value'=>$stats['pending'],'color'=>'text-yellow-600'],['label'=>'Dikerjakan','value'=>$stats['in_progress'],'color'=>'text-blue-600']] as $s)
                <div class="flex justify-between items-center">
                    <span class="text-gray-500 text-sm">{{ $s['label'] }}</span>
                    <span class="font-bold {{ $s['color'] }}">{{ $s['value'] }}</span>
                </div>
                @endforeach
                <div class="pt-2 border-t border-gray-50 flex justify-between items-center">
                    <span class="text-gray-500 text-sm">Pendapatan</span>
                    <span class="font-bold text-purple-600 text-sm">Rp {{ number_format($stats['total_earnings'], 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Form --}}
    <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-semibold text-gray-800 mb-5">Edit Profil</h3>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-4 text-sm">
                    @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
                </div>
            @endif

            <form action="{{ route('staff.profile.update') }}" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" required
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                </div>

                <div class="pt-3 border-t border-gray-50">
                    <p class="text-sm font-semibold text-gray-700 mb-3">Ubah Password <span class="text-gray-400 font-normal">(opsional)</span></p>
                    <div class="space-y-3">
                        <input type="password" name="password" placeholder="Password baru (min. 8 karakter)"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <a href="{{ route('staff.dashboard') }}" class="flex-1 text-center py-2.5 border border-gray-200 text-gray-600 rounded-xl text-sm font-medium hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="flex-1 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-semibold transition">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@extends('staff.layout')

@section('title', 'Profil Staff')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-[#005c02] to-[#00f7ff] rounded-full flex items-center justify-center text-white text-3xl font-bold mb-4">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ auth()->user()->name }}</h3>
                    <p class="text-gray-500 text-sm">{{ auth()->user()->email }}</p>
                    <span class="inline-block mt-2 px-3 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded-full">
                        Staff Aktif
                    </span>
                </div>

                <div class="mt-6 pt-6 border-t">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600 text-sm">Role</span>
                            <span class="font-medium text-sm">{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 text-sm">Bergabung</span>
                            <span class="font-medium text-sm">{{ date('d M Y', strtotime(auth()->user()->created_at)) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 text-sm">Status</span>
                            <span class="font-medium text-sm text-green-600">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="bg-white rounded-lg shadow p-6 mt-6">
                <h4 class="font-semibold text-gray-800 mb-4">Statistik Pekerjaan</h4>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-sm">Selesai</span>
                        <span class="font-bold text-green-600">{{ $stats['total_completed'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-sm">Pending</span>
                        <span class="font-bold text-yellow-600">{{ $stats['pending'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 text-sm">Dikerjakan</span>
                        <span class="font-bold text-blue-600">{{ $stats['in_progress'] }}</span>
                    </div>
                    <div class="pt-3 border-t">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600 text-sm">Total Pendapatan</span>
                            <span class="font-bold text-purple-600">Rp {{ number_format($stats['total_earnings'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profile Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">Edit Profil</h3>

                <form action="{{ route('staff.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ auth()->user()->email }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                            <input type="text" name="phone" value="{{ auth()->user()->phone ?? '' }}" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="08xxxxxxxxxx">
                        </div>

                        <div class="pt-4 border-t">
                            <h4 class="text-sm font-medium text-gray-700 mb-4">Ubah Password (Opsional)</h4>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                                    <input type="password" name="password" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Minimal 8 karakter">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Ulangi password baru">
                                </div>
                            </div>
                        </div>

                        <div class="flex space-x-3 pt-4">
                            <button type="submit" 
                                    class="flex-1 bg-gradient-to-r from-[#005c02] to-[#00f7ff] text-white px-6 py-3 rounded-lg hover:opacity-90 transition font-medium">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('staff.dashboard') }}" 
                               class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Activity Log -->
            <div class="bg-white rounded-lg shadow p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Aktivitas Terakhir</h3>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-green-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Menyelesaikan pesanan</p>
                            <p class="text-xs text-gray-500">{{ now()->subHours(2)->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clipboard-check text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Menerima pesanan baru</p>
                            <p class="text-xs text-gray-500">{{ now()->subHours(5)->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-sign-in-alt text-purple-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Login ke sistem</p>
                            <p class="text-xs text-gray-500">{{ now()->subHours(8)->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

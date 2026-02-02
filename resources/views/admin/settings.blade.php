@extends('admin.layout')
@section('title', 'Pengaturan Website')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pengaturan Website</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Settings Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Umum</h3>
                
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="site_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Website <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="site_name" 
                               id="site_name" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ old('site_name', $settings->site_name ?? '') }}"
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Website
                        </label>
                        <textarea name="site_description" 
                                  id="site_description" 
                                  rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                  placeholder="Deskripsi singkat tentang website...">{{ old('site_description', $settings->site_description ?? '') }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Kontak <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               name="contact_email" 
                               id="contact_email" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ old('contact_email', $settings->contact_email ?? '') }}"
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon
                        </label>
                        <input type="text" 
                               name="contact_phone" 
                               id="contact_phone" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ old('contact_phone', $settings->contact_phone ?? '') }}"
                               placeholder="0812-3456-7890">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Additional Settings -->
            <div class="bg-white rounded-lg shadow p-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Pengaturan Lainnya</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-900">Mode Maintenance</h4>
                            <p class="text-sm text-gray-500">Aktifkan untuk menonaktifkan sementara website</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-900">Registrasi User Baru</h4>
                            <p class="text-sm text-gray-500">Izinkan user baru untuk mendaftar</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-900">Notifikasi Email</h4>
                            <p class="text-sm text-gray-500">Kirim notifikasi email untuk pesanan baru</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Info -->
        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Sistem</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Versi Laravel:</span>
                        <span class="font-medium">10.x</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Versi PHP:</span>
                        <span class="font-medium">8.1+</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Database:</span>
                        <span class="font-medium">MySQL</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="text-green-600 font-medium">
                            <i class="fas fa-circle text-xs mr-1"></i>
                            Online
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Backup & Maintenance</h3>
                <div class="space-y-3">
                    <button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg text-sm">
                        <i class="fas fa-download mr-2"></i>
                        Backup Database
                    </button>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg text-sm">
                        <i class="fas fa-broom mr-2"></i>
                        Clear Cache
                    </button>
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg text-sm">
                        <i class="fas fa-sync mr-2"></i>
                        Update System
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik Hari Ini</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Pengunjung:</span>
                        <span class="font-medium">127</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Pesanan Baru:</span>
                        <span class="font-medium">8</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">User Baru:</span>
                        <span class="font-medium">3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
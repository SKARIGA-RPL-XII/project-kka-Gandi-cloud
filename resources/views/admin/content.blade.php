@extends('admin.layout')

@section('title', 'Kelola Konten')

@section('content')
<div class="space-y-6">
    <!-- Header dengan tombol tambah -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kelola Konten</h2>
            <p class="text-gray-600">Kelola semua konten website Anda</p>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            <i class="fas fa-plus mr-2"></i>Tambah Konten
        </button>
    </div>

    <!-- Tabs -->
    <div class="bg-white rounded-lg shadow">
        <div class="border-b">
            <nav class="flex space-x-8 px-6">
                <a href="#" class="py-4 px-1 border-b-2 border-blue-500 text-blue-600 font-medium">Halaman</a>
                <a href="#" class="py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Artikel</a>
                <a href="#" class="py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Media</a>
            </nav>
        </div>

        <div class="p-6">
            <!-- Daftar Halaman -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Terakhir Diubah</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages ?? [] as $page)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">
                                <div>
                                    <h4 class="font-medium">{{ $page->title }}</h4>
                                    <p class="text-sm text-gray-500">{{ $page->slug }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                                    Dipublikasi
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ date('d/m/Y H:i', strtotime($page->updated_at)) }}</td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                Belum ada konten. <a href="#" class="text-blue-600 hover:underline">Tambah konten pertama</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Buat Halaman</h3>
                    <p class="text-gray-600 text-sm">Tambah halaman baru</p>
                </div>
            </div>
            <button class="w-full mt-4 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                Buat Sekarang
            </button>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-newspaper text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Tulis Artikel</h3>
                    <p class="text-gray-600 text-sm">Buat artikel blog</p>
                </div>
            </div>
            <button class="w-full mt-4 bg-green-500 text-white py-2 rounded hover:bg-green-600">
                Tulis Sekarang
            </button>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-images text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold">Upload Media</h3>
                    <p class="text-gray-600 text-sm">Kelola file media</p>
                </div>
            </div>
            <button class="w-full mt-4 bg-purple-500 text-white py-2 rounded hover:bg-purple-600">
                Upload Sekarang
            </button>
        </div>
    </div>
</div>
@endsection
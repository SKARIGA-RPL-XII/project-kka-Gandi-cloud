@extends('admin.layout')
@section('title', 'Tambah Layanan')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="/admin/services/test" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Layanan
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Layanan Baru</h2>

        @if ($errors->any())
            <div style="background:#fee2e2;color:#dc2626;padding:15px;border-radius:10px;margin-bottom:20px;border:1px solid #fecaca;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.services.store') }}" method="POST">
    @csrf

            
            
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Layanan <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Contoh: Pembersihan Rumah"
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi <span class="text-red-500">*</span>
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                          placeholder="Jelaskan detail layanan yang ditawarkan..."
                          required>{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           min="0"
                           step="1000"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="150000"
                           value="{{ old('price') }}"
                           required>
                </div>

                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                        Estimasi Durasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="duration" 
                           id="duration" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="2-4 jam"
                           value="{{ old('duration') }}"
                           required>
                </div>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Status
                </label>
                <select name="status" 
                        id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="/admin/services/test" 
                   class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>

    <!-- Preview Card -->
    <div class="mt-8 bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Preview Layanan</h3>
        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center" id="preview">
            <div class="text-gray-400">
                <i class="fas fa-broom text-4xl mb-4"></i>
                <p>Preview akan muncul saat Anda mengisi form</p>
            </div>
        </div>
    </div>
</div>

<script>
// Live preview
function updatePreview() {
    const name = document.getElementById('name').value || 'Nama Layanan';
    const description = document.getElementById('description').value || 'Deskripsi layanan';
    const price = document.getElementById('price').value || '0';
    const duration = document.getElementById('duration').value || 'Durasi';
    
    const preview = document.getElementById('preview');
    preview.innerHTML = `
        <div class="text-left">
            <div class="flex items-center mb-3">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mr-4">
                    <i class="fas fa-broom"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900">${name}</h4>
                    <p class="text-sm text-gray-500">${duration}</p>
                </div>
            </div>
            <p class="text-gray-600 mb-3">${description}</p>
            <div class="text-xl font-bold text-green-600">Rp ${parseInt(price).toLocaleString('id-ID')}</div>
        </div>
    `;
}

// Add event listeners
document.getElementById('name').addEventListener('input', updatePreview);
document.getElementById('description').addEventListener('input', updatePreview);
document.getElementById('price').addEventListener('input', updatePreview);
document.getElementById('duration').addEventListener('input', updatePreview);
</script>
@endsection
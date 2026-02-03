@extends('admin.layout')
@section('title', 'Edit Layanan')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="/admin/services/test" class="text-blue-600 hover:text-blue-800 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Layanan
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Layanan</h2>

        @if ($errors->any())
            <div style="background:#fee2e2;color:#dc2626;padding:15px;border-radius:10px;margin-bottom:20px;border:1px solid #fecaca;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
    @csrf
    @method('PUT')


    <input type="text" name="name" value="{{ $service->name }}">
    <input type="text" name="description" value="{{ $service->description }}">
    <input type="number" name="price" value="{{ $service->price }}">
    <input type="text" name="duration" value="{{ $service->duration }}">

    <button type="submit">Update</button>

</form>

    </div>

    <!-- Current Service Info -->
    <div class="mt-8 bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Layanan Saat Ini</h3>
        <div class="bg-gray-50 rounded-lg p-4">
            <div class="flex items-center mb-3">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white mr-4">
                    <i class="fas fa-broom"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900">{{ $service->name }}</h4>
                    <p class="text-sm text-gray-500">{{ $service->duration }}</p>
                </div>
            </div>
            <p class="text-gray-600 mb-3">{{ $service->description }}</p>
            <div class="flex justify-between items-center">
                <div class="text-xl font-bold text-green-600">Rp {{ number_format($service->price, 0, ',', '.') }}</div>
                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $service->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $service->status == 'active' ? 'Aktif' : 'Nonaktif' }}
                </span>
            </div>
        </div>
    </div>
</div>

<script>
// Live preview update
function updatePreview() {
    const name = document.getElementById('name').value || 'Nama Layanan';
    const description = document.getElementById('description').value || 'Deskripsi layanan';
    const price = document.getElementById('price').value || '0';
    const duration = document.getElementById('duration').value || 'Durasi';
    
    // You can add live preview functionality here if needed
}

// Add event listeners
document.getElementById('name').addEventListener('input', updatePreview);
document.getElementById('description').addEventListener('input', updatePreview);
document.getElementById('price').addEventListener('input', updatePreview);
document.getElementById('duration').addEventListener('input', updatePreview);
</script>
@endsection
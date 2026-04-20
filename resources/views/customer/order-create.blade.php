@extends('customer.layout')
@section('title', 'Buat Pesanan')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Buat Pesanan Baru</h2>
        <p class="text-gray-500 text-sm mt-1">Isi form di bawah untuk memesan layanan pembersihan</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-5 text-sm">
            @foreach($errors->all() as $error)
                <div><i class="fas fa-exclamation-circle mr-1"></i> {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('order.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
        @csrf

        {{-- Pilih Layanan --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-broom text-green-500 mr-1"></i> Pilih Layanan
            </label>
            <select name="service_id" required
                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition bg-white"
                onchange="updatePrice(this)">
                <option value="">-- Pilih layanan --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                        data-price="{{ $service->price }}"
                        data-duration="{{ $service->duration }}"
                        {{ old('service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->name }} — Rp {{ number_format($service->price, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Service Info --}}
        <div id="serviceInfo" class="hidden bg-green-50 border border-green-200 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Harga Layanan</p>
                    <p class="text-xl font-bold text-green-700" id="servicePrice">-</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">Durasi</p>
                    <p class="text-sm font-semibold text-gray-800" id="serviceDuration">-</p>
                </div>
            </div>
        </div>

        {{-- Tanggal --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-calendar text-green-500 mr-1"></i> Tanggal Layanan
            </label>
            <input type="date" name="tanggal" required
                min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                value="{{ old('tanggal') }}"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition">
        </div>

        {{-- Alamat --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-map-marker-alt text-green-500 mr-1"></i> Alamat Lengkap
            </label>
            <textarea name="alamat" required rows="3"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition resize-none"
                placeholder="Masukkan alamat lengkap (minimal 10 karakter)">{{ old('alamat') }}</textarea>
        </div>

        <button type="submit"
            class="w-full py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-xl transition shadow-lg shadow-green-200 text-sm">
            <i class="fas fa-arrow-right mr-2"></i> Lanjut ke Pembayaran
        </button>
    </form>
</div>

<script>
function updatePrice(sel) {
    const opt = sel.options[sel.selectedIndex];
    const info = document.getElementById('serviceInfo');
    if (opt.value) {
        const price = parseInt(opt.dataset.price);
        document.getElementById('servicePrice').textContent = 'Rp ' + price.toLocaleString('id-ID');
        document.getElementById('serviceDuration').textContent = opt.dataset.duration + ' menit';
        info.classList.remove('hidden');
    } else {
        info.classList.add('hidden');
    }
}
</script>
@endsection

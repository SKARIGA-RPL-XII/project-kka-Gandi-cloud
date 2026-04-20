@extends('admin.layout')
@section('title', 'Pengaturan')

@section('content')

<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Pengaturan Website</h2>
        <p class="text-gray-500 text-sm mt-1">Kelola konfigurasi website GOCLEAN</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- Form --}}
        <div class="lg:col-span-2 space-y-5">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-semibold text-gray-800 mb-4">Informasi Umum</h3>
                <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Website</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $settings->site_name ?? '') }}" required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="site_description" rows="2"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 resize-none">{{ old('site_description', $settings->site_description ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Email Kontak</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email ?? '') }}" required
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone ?? '') }}"
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-xl text-sm font-semibold transition">
                        <i class="fas fa-save mr-1"></i> Simpan Pengaturan
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-semibold text-gray-800 mb-4">Pengaturan Lainnya</h3>
                <div class="space-y-3">
                    @foreach([
                        ['key'=>'maintenance_mode','label'=>'Mode Maintenance','desc'=>'Nonaktifkan website sementara'],
                        ['key'=>'allow_registration','label'=>'Registrasi User','desc'=>'Izinkan user baru mendaftar'],
                        ['key'=>'email_notifications','label'=>'Notifikasi Email','desc'=>'Kirim email untuk pesanan baru'],
                    ] as $s)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">{{ $s['label'] }}</p>
                            <p class="text-xs text-gray-400">{{ $s['desc'] }}</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer"
                                onchange="toggleSetting('{{ $s['key'] }}', this.checked ? '1' : '0')"
                                {{ ($settings->{$s['key']} ?? '0') == '1' ? 'checked' : '' }}>
                            <div class="w-10 h-6 bg-gray-300 rounded-full peer peer-checked:bg-green-500 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-4"></div>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Sidebar Info --}}
        <div class="space-y-5">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-gray-800 mb-4">Info Sistem</h3>
                <div class="space-y-3 text-sm">
                    @foreach(['Laravel'=>'10.x','PHP'=>'8.1+','Database'=>'MySQL','Status'=>'Online'] as $k=>$v)
                    <div class="flex justify-between">
                        <span class="text-gray-500">{{ $k }}</span>
                        <span class="font-medium {{ $k=='Status' ? 'text-green-600' : 'text-gray-700' }}">{{ $v }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-gray-800 mb-4">Statistik Hari Ini</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between"><span class="text-gray-500">Pesanan Baru</span><span class="font-bold text-gray-800">{{ $stats['orders_today'] }}</span></div>
                    <div class="flex justify-between"><span class="text-gray-500">User Baru</span><span class="font-bold text-gray-800">{{ $stats['users_today'] }}</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleSetting(key, value) {
    fetch('{{ route("admin.settings.toggle") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ key, value })
    }).then(r => r.json()).then(d => {
        if (d.success) {
            const n = document.createElement('div');
            n.className = 'fixed top-4 right-4 bg-green-600 text-white px-5 py-3 rounded-xl shadow-lg z-50 text-sm font-medium';
            n.innerHTML = '<i class="fas fa-check mr-2"></i>Pengaturan disimpan';
            document.body.appendChild(n);
            setTimeout(() => n.remove(), 2500);
        }
    });
}
</script>

@endsection

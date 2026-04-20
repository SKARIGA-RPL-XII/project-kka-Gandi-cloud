<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar — GOCLEAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif;}</style>
</head>
<body class="min-h-screen flex" style="background:linear-gradient(135deg,#0a3d0a,#005c02 50%,#007a7a)">

{{-- Left Panel --}}
<div class="hidden lg:flex flex-col justify-center px-16 w-1/2 text-white">
    <div class="flex items-center gap-3 mb-10">
        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
            <i class="fas fa-sparkles text-white"></i>
        </div>
        <span class="text-2xl font-bold">GOCLEAN</span>
    </div>
    <h1 class="text-4xl font-bold leading-tight mb-4">Bergabung Bersama<br>Ribuan Pelanggan</h1>
    <p class="text-white/70 text-lg mb-8">Daftar sekarang dan nikmati layanan pembersihan profesional terpercaya.</p>
    <div class="bg-white/10 rounded-2xl p-5">
        <p class="text-sm text-white/60 mb-3">Keuntungan menjadi member:</p>
        <div class="space-y-2">
            @foreach(['Pesan layanan kapan saja', 'Pantau status pesanan real-time', 'Histori pesanan lengkap', 'Layanan profesional terjamin'] as $item)
            <div class="flex items-center gap-2 text-sm">
                <i class="fas fa-check-circle text-green-300"></i>
                <span>{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Right Panel --}}
<div class="flex-1 flex items-center justify-center p-6">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8">

        <div class="flex items-center gap-2 mb-7 lg:hidden">
            <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-xs"></i>
            </div>
            <span class="text-xl font-bold text-gray-800">GOCLEAN</span>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-1">Buat Akun Baru</h2>
        <p class="text-gray-500 text-sm mb-7">Daftar sebagai customer untuk memesan layanan</p>

        <div id="errorBox" class="hidden flex items-center gap-2 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-5 text-sm">
            <i class="fas fa-exclamation-circle"></i> <span id="errorMsg"></span>
        </div>

        <form id="registerForm">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-user text-sm"></i></span>
                    <input type="text" id="name" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition"
                        placeholder="Masukkan nama lengkap">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-envelope text-sm"></i></span>
                    <input type="email" id="email" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition"
                        placeholder="nama@email.com">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-lock text-sm"></i></span>
                    <input type="password" id="password" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition"
                        placeholder="Minimal 8 karakter">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-lock text-sm"></i></span>
                    <input type="password" id="password_confirmation" required
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition"
                        placeholder="Ulangi password">
                </div>
            </div>

            <button type="submit" id="submitBtn"
                class="w-full py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-xl transition shadow-lg shadow-green-200 text-sm">
                <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:text-green-700">Masuk di sini</a>
        </p>

        <div class="mt-5 p-3 bg-blue-50 rounded-xl">
            <p class="text-xs text-blue-600 text-center">
                <i class="fas fa-info-circle mr-1"></i>
                Pendaftaran hanya untuk <strong>customer</strong>. Staff ditambahkan oleh admin.
            </p>
        </div>
    </div>
</div>

{{-- Success Modal --}}
<div id="successModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl p-8 max-w-sm w-full text-center shadow-2xl">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-check-circle text-green-500 text-3xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Registrasi Berhasil!</h3>
        <p class="text-gray-500 text-sm mb-6">Akun Anda berhasil dibuat. Silakan login untuk melanjutkan.</p>
        <a href="{{ route('login') }}" class="block w-full py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition text-sm">
            <i class="fas fa-sign-in-alt mr-2"></i> Login Sekarang
        </a>
    </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = document.getElementById('submitBtn');
    const errorBox = document.getElementById('errorBox');
    const errorMsg = document.getElementById('errorMsg');

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('password_confirmation').value;

    errorBox.classList.add('hidden');

    if (!name || !email || !password || !confirm) {
        errorMsg.textContent = 'Semua field harus diisi!';
        errorBox.classList.remove('hidden'); return;
    }
    if (password.length < 8) {
        errorMsg.textContent = 'Password minimal 8 karakter!';
        errorBox.classList.remove('hidden'); return;
    }
    if (password !== confirm) {
        errorMsg.textContent = 'Konfirmasi password tidak sesuai!';
        errorBox.classList.remove('hidden'); return;
    }

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';

    try {
        const res = await fetch('/register/process', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ name, email, password, password_confirmation: confirm })
        });
        const data = await res.json();
        if (data.success) {
            document.getElementById('successModal').classList.remove('hidden');
        } else {
            errorMsg.textContent = data.message || 'Registrasi gagal!';
            errorBox.classList.remove('hidden');
        }
    } catch {
        errorMsg.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
        errorBox.classList.remove('hidden');
    }

    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-user-plus mr-2"></i> Daftar Sekarang';
});
</script>
</body>
</html>

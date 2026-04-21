<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — GOCLEAN</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif;}</style>
</head>
<body class="min-h-screen flex" style="background:linear-gradient(135deg,#0a3d0a,#005c02 50%,#007a7a)">

{{-- Left Panel --}}
<div class="hidden lg:flex flex-col justify-center px-16 w-1/2 text-white">
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-sparkles text-white"></i>
            </div>
            <span class="text-2xl font-bold">GOCLEAN</span>
        </div>
        <h1 class="text-4xl font-bold leading-tight mb-4">Layanan Pembersihan<br>Profesional Terpercaya</h1>
        <p class="text-white/70 text-lg">Solusi kebersihan rumah dan kantor Anda dengan standar kualitas tinggi.</p>
    </div>
    <div class="space-y-4">
        <div class="flex items-center gap-3 bg-white/10 rounded-xl px-4 py-3">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-shield-alt text-white text-sm"></i>
            </div>
            <div>
                <p class="font-semibold text-sm">Terpercaya & Profesional</p>
                <p class="text-white/60 text-xs">Tim berpengalaman dengan standar tinggi</p>
            </div>
        </div>
        <div class="flex items-center gap-3 bg-white/10 rounded-xl px-4 py-3">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-clock text-white text-sm"></i>
            </div>
            <div>
                <p class="font-semibold text-sm">Tepat Waktu</p>
                <p class="text-white/60 text-xs">Layanan sesuai jadwal yang disepakati</p>
            </div>
        </div>
        <div class="flex items-center gap-3 bg-white/10 rounded-xl px-4 py-3">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-star text-white text-sm"></i>
            </div>
            <div>
                <p class="font-semibold text-sm">Rating Tinggi</p>
                <p class="text-white/60 text-xs">Dipercaya ribuan pelanggan</p>
            </div>
        </div>
    </div>
</div>

{{-- Right Panel --}}
<div class="flex-1 flex items-center justify-center p-6">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8">

        {{-- Logo mobile --}}
        <div class="flex items-center gap-2 mb-8 lg:hidden">
            <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-xs"></i>
            </div>
            <span class="text-xl font-bold text-gray-800">GOCLEAN</span>
        </div>
<a href="{{ url('/') }}"
   class="inline-flex items-center gap-2 text-sm font-semibold text-gray-600 hover:text-green-600 transition mb-5">
    <i class="fas fa-arrow-left"></i>
    Kembali ke Halaman Utama
</a>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">Selamat Datang</h2>
        <p class="text-gray-500 text-sm mb-7">Masuk ke akun Anda untuk melanjutkan</p>

        @if(session('error'))
            <div class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-5 text-sm">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-xl mb-5 text-sm">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-envelope text-sm"></i></span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition"
                        placeholder="nama@email.com">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-lock text-sm"></i></span>
                    <input type="password" name="password" id="password" required
                        class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 transition"
                        placeholder="Masukkan password">
                    <button type="button" onclick="togglePass()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye text-sm" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-xl transition shadow-lg shadow-green-200 text-sm">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-green-600 font-semibold hover:text-green-700">Daftar sekarang</a>
        </p>

        <div class="mt-6 pt-5 border-t border-gray-100">
            <p class="text-xs text-gray-400 text-center mb-3">Demo Credentials</p>
            <div class="grid grid-cols-3 gap-2 text-xs">
                <div class="bg-purple-50 rounded-lg p-2 text-center">
                    <p class="font-semibold text-purple-700">Admin</p>
                    <p class="text-gray-500 mt-1">admin@goclean.com</p>
                    <p class="text-gray-500">goclean</p>
                </div>
                <div class="bg-blue-50 rounded-lg p-2 text-center">
                    <p class="font-semibold text-blue-700">Staff</p>
                    <p class="text-gray-500 mt-1">Tambah via</p>
                    <p class="text-gray-500">Admin</p>
                </div>
                <div class="bg-green-50 rounded-lg p-2 text-center">
                    <p class="font-semibold text-green-700">Customer</p>
                    <p class="text-gray-500 mt-1">customer@goclean.com</p>
                    <p class="text-gray-500">customer123</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePass(){
    const p = document.getElementById('password');
    const i = document.getElementById('eyeIcon');
    if(p.type==='password'){ p.type='text'; i.className='fas fa-eye-slash text-sm'; }
    else { p.type='password'; i.className='fas fa-eye text-sm'; }
}
</script>
</body>
</html>

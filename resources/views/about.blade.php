<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami — GOCLEAN</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        html { scroll-behavior: smooth; }
        .nav-link { color: rgba(255,255,255,0.85); text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.2s; }
        .nav-link:hover { color: white; }
    </style>
</head>
<body class="bg-white">

{{-- NAVBAR --}}
<nav class="fixed top-0 w-full z-50 px-6 py-4" style="background:linear-gradient(135deg,#0a3d0a,#005c02)">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <a href="/" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-xs"></i>
            </div>
            <span class="text-white font-bold text-lg">GOCLEAN</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="/" class="nav-link">Beranda</a>
            <a href="/#services" class="nav-link">Layanan</a>
            <a href="/about" class="nav-link" style="color:white;border-bottom:2px solid white;padding-bottom:2px;">Tentang</a>
            <a href="/contact" class="nav-link">Kontak</a>
        </div>

        <div class="hidden md:flex items-center gap-3">
            <a href="/login" class="text-white/80 hover:text-white text-sm font-medium transition">Masuk</a>
            <a href="/register" class="bg-white text-green-700 font-semibold px-4 py-2 rounded-xl text-sm hover:bg-green-50 transition">Daftar Gratis</a>
        </div>

        <button class="md:hidden text-white" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
    <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-white/20">
        <div class="flex flex-col gap-3 pt-4 px-2">
            <a href="/" class="nav-link">Beranda</a>
            <a href="/#services" class="nav-link">Layanan</a>
            <a href="/contact" class="nav-link">Kontak</a>
            <div class="flex gap-3 pt-2">
                <a href="/login" class="flex-1 text-center border border-white/40 text-white py-2 rounded-xl text-sm">Masuk</a>
                <a href="/register" class="flex-1 text-center bg-white text-green-700 py-2 rounded-xl text-sm font-semibold">Daftar</a>
            </div>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section class="pt-20 py-24 text-white text-center" style="background:linear-gradient(135deg,#0a3d0a,#005c02 60%,#007a7a)">
    <div class="max-w-3xl mx-auto px-6">
        <span class="inline-block bg-white/15 text-white/90 text-xs font-semibold px-4 py-2 rounded-full mb-6 border border-white/20">
            🏆 Tentang Kami
        </span>
        <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5">
            Kami Hadir untuk Kebersihan Terbaik Anda<br>
           
        </h1>
        <p class="text-white/70 text-lg max-w-xl mx-auto">
            GOCLEAN adalah layanan pembersihan profesional terpercaya yang telah melayani ribuan pelanggan sejak 2026.
        </p>
    </div>
</section>

{{-- STATS --}}
<section class="py-12 bg-white border-b border-gray-100">
    <div class="max-w-4xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-4xl font-extrabold text-green-600">500+</p>
                <p class="text-gray-500 text-sm mt-1">Pelanggan Puas</p>
            </div>
            <div>
                <p class="text-4xl font-extrabold text-green-600">50+</p>
                <p class="text-gray-500 text-sm mt-1">Staff Profesional</p>
            </div>
            <div>
                <p class="text-4xl font-extrabold text-green-600">4.9★</p>
                <p class="text-gray-500 text-sm mt-1">Rating Rata-rata</p>
            </div>
            <div>
                <p class="text-4xl font-extrabold text-green-600">99%</p>
                <p class="text-gray-500 text-sm mt-1">Tingkat Kepuasan</p>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Mengapa Kami Berbeda?</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Kami tidak hanya membersihkan, kami memberikan pengalaman terbaik</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-history text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Berpengalaman</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Lebih dari 4 tahun melayani ribuan pelanggan dengan tingkat kepuasan 99% di seluruh Indonesia.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-award text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Bersertifikat</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Standar internasional dengan sertifikasi ISO 9001:2016 untuk menjamin kualitas layanan terbaik.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition hover:-translate-y-1">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 text-lg mb-2">Tim Profesional</h3>
                <p class="text-gray-500 text-sm leading-relaxed">50+ staff terlatih dan berpengalaman yang siap memberikan layanan terbaik untuk Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="rounded-2xl p-8 text-white" style="background:linear-gradient(135deg,#0a3d0a,#005c02)">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                    <i class="fas fa-eye text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Visi</h3>
                <p class="text-white/80 leading-relaxed">Menjadi perusahaan layanan pembersihan terdepan di Indonesia yang memberikan solusi kebersihan terbaik untuk rumah dan bisnis dengan standar kelas dunia.</p>
            </div>
            <div class="rounded-2xl p-8 text-white" style="background:linear-gradient(135deg,#1d4ed8,#0ea5e9)">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                    <i class="fas fa-bullseye text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Misi</h3>
                <p class="text-white/80 leading-relaxed">Memberikan layanan pembersihan berkualitas tinggi dengan teknologi modern, harga terjangkau, dan kepuasan pelanggan sebagai prioritas utama kami.</p>
            </div>
        </div>
    </div>
</section>

{{-- TEAM --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tim Kami</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Orang-orang hebat di balik layanan GOCLEAN</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center hover:shadow-md transition hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">D</div>
                <h4 class="font-bold text-gray-800">Daffa Paundra</h4>
                <p class="text-green-600 text-xs font-medium mt-1">CEO & Founder</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center hover:shadow-md transition hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">S</div>
                <h4 class="font-bold text-gray-800">Sari Dewi</h4>
                <p class="text-blue-600 text-xs font-medium mt-1">Operations Manager</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center hover:shadow-md transition hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">B</div>
                <h4 class="font-bold text-gray-800">Budi Santoso</h4>
                <p class="text-purple-600 text-xs font-medium mt-1">Customer Service</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 text-center hover:shadow-md transition hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">M</div>
                <h4 class="font-bold text-gray-800">Maya Putri</h4>
                <p class="text-yellow-600 text-xs font-medium mt-1">Quality Control</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 text-white text-center" style="background:linear-gradient(135deg,#0a3d0a,#005c02 60%,#007a7a)">
    <div class="max-w-2xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-4">Bergabung Bersama Kami</h2>
        <p class="text-white/70 mb-8">Daftar sekarang dan rasakan layanan pembersihan profesional terbaik</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/register" class="bg-white text-green-700 font-bold px-8 py-3 rounded-2xl text-sm hover:bg-green-50 transition shadow-xl">
                <i class="fas fa-rocket mr-2"></i> Daftar Sekarang
            </a>
            <a href="/contact" class="border-2 border-white/40 text-white font-semibold px-8 py-3 rounded-2xl text-sm hover:bg-white/10 transition">
                <i class="fas fa-envelope mr-2"></i> Hubungi Kami
            </a>
        </div>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-gray-900 text-white py-10">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-7 h-7 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-sparkles text-white text-xs"></i>
                    </div>
                    <span class="font-bold">GOCLEAN</span>
                </div>
                <p class="text-gray-400 text-sm">Layanan pembersihan profesional terpercaya.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-3 text-sm text-gray-400 uppercase tracking-wider">Navigasi</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="/about" class="hover:text-white transition">Tentang</a></li>
                    <li><a href="/contact" class="hover:text-white transition">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-3 text-sm text-gray-400 uppercase tracking-wider">Kontak</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-phone mr-2"></i>0812-3456-7890</li>
                    <li><i class="fas fa-envelope mr-2"></i>info@goclean.id</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i>Malang, Indonesia</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-6 text-center text-gray-500 text-sm">
            © 2024 GOCLEAN. All rights reserved.
        </div>
    </div>
</footer>

</body>
</html>

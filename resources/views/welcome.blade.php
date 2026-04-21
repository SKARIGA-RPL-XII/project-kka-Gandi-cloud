<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOCLEAN — #1 Pembersihan Profesional Indonesia</title>
    <meta name="description" content="Layanan pembersihan rumah, apartemen, dan kantor profesional. Tim berpengalaman, tepat waktu, harga terjangkau. Pesan sekarang!">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <style>
        body { font-family: 'Inter', sans-serif; scroll-behavior: smooth; }
        .gradient-hero { background: linear-gradient(135deg, #0a3d0a 0%, #1a5a1a 50%, #007a7a 100%); }
        .gradient-primary { background: linear-gradient(135deg, #10b981, #059669); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%,100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        .nav-link { @apply text-gray-700 hover:text-green-600 font-medium transition-all duration-200; }
        .btn-primary { @apply bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold px-8 py-4 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 text-lg; }
        .btn-secondary { @apply border-2 border-green-600 text-green-600 font-semibold px-8 py-4 rounded-2xl hover:bg-green-600 hover:text-white transition-all duration-200 text-lg; }
    </style>
</head>
<body class="antialiased">

<!-- Navigation -->
<nav class="fixed w-full z-50 backdrop-blur-md bg-white/80 border-b border-gray-200/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4 md:py-3">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 gradient-primary rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-sparkles text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">GOCLEAN</h1>
                    <p class="text-xs text-gray-500 font-medium">Pembersihan Profesional</p>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#hero" class="nav-link">Beranda</a>
                <a href="#services" class="nav-link">Layanan</a>
                <a href="#about" class="nav-link">Tentang</a>
                <a href="#contact" class="nav-link">Kontak</a>
            </div>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('login') }}" class="px-6 py-2 text-sm font-semibold text-gray-700 hover:text-green-600 border-b-2 border-transparent hover:border-green-600 transition-all" style="text-decoration: none;">Masuk</a>
                <a href="{{ route('register') }}" class="btn-primary">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Gratis
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden hidden bg-white border-t shadow-lg">
        <div class="px-4 pt-4 pb-6 space-y-3">
            <a href="#hero" class="block px-3 py-2 nav-link">Beranda</a>
            <a href="#services" class="block px-3 py-2 nav-link">Layanan</a>
            <a href="#about" class="block px-3 py-2 nav-link">Tentang</a>
            <a href="#contact" class="block px-3 py-2 nav-link">Kontak</a>
            <div class="pt-2 space-y-2">
                <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition">Masuk</a>
                <a href="{{ route('register') }}" class="block w-full text-center px-4 py-3 font-semibold text-white bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl hover:shadow-lg transition">Daftar Gratis</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="gradient-hero min-h-screen flex items-center relative overflow-hidden pt-20">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/5 rounded-full blur-xl animate-float" style="animation-delay: 0s;"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-emerald-300/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center text-white relative z-10">
        <div class="max-w-4xl mx-auto">
            <!-- Badge -->
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm border border-white/20 px-6 py-3 rounded-full mb-8">
                <i class="fas fa-crown text-yellow-300 mr-2"></i>
                <span class="font-semibold uppercase tracking-wide text-sm">Layanan Pembersihan #1 di Indonesia</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-black leading-tight mb-8 drop-shadow-2xl">
                Rumah <span class="bg-gradient-to-r from-emerald-300 to-teal-300 bg-clip-text text-transparent">Bersih</span>
                <br>Lebih <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Nyaman</span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-white/90 mb-12 max-w-2xl mx-auto leading-relaxed drop-shadow-lg">
                Tim profesional dengan standar internasional. <strong class="text-2xl text-yellow-300">Tepat Waktu</strong>, 
                Bersih Menyeluruh, Harga Terjangkau. Pesan sekarang dapatkan <strong>diskon 20% pertama kali!</strong>
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="{{ route('register') }}" class="btn-primary inline-flex items-center justify-center shadow-2xl">
                    <i class="fas fa-rocket mr-3"></i>
                    <span>Pesan Sekarang</span>
                </a>
                <a href="#services" class="btn-secondary inline-flex items-center justify-center shadow-lg">
                    <i class="fas fa-play-circle mr-3"></i>
                    <span>Lihat Layanan</span>
                </a>
            </div>

            <!-- Trust Indicators -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 max-w-4xl mx-auto opacity-90">
                <div class="text-center py-4">
                    <div class="text-2xl font-bold text-yellow-300 mb-1">4.9</div>
                    <div class="text-xs text-white/80 uppercase tracking-wide font-medium">Rating</div>
                </div>
                <div class="text-center py-4">
                    <div class="text-2xl font-bold mb-1">5K+</div>
                    <div class="text-xs text-white/80 uppercase tracking-wide font-medium">Pelanggan</div>
                </div>
                <div class="text-center py-4">
                    <div class="text-2xl font-bold mb-1">100%</div>
                    <div class="text-xs text-white/80 uppercase tracking-wide font-medium">Puas</div>
                </div>
                <div class="text-center py-4">
                    <div class="text-2xl font-bold mb-1">24/7</div>
                    <div class="text-xs text-white/80 uppercase tracking-wide font-medium">Support</div>
                </div>
                <div class="text-center py-4">
                    <div class="text-2xl font-bold mb-1">15K+</div>
                    <div class="text-xs text-white/80 uppercase tracking-wide font-medium">Pesanan</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full mb-6">
                <i class="fas fa-sparkles mr-2"></i>
                <span class="font-semibold uppercase tracking-wide text-sm">Layanan Unggulan</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Layanan Pembersihan <span class="bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">Terbaik</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Pilih paket yang sesuai dengan kebutuhan Anda. Semua layanan menggunakan bahan ramah lingkungan dan tim tersertifikasi.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
            <div class="group">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-gray-100">
                    <div class="w-20 h-20 gradient-primary rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-home text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Pembersihan Rumah</h3>
                    <p class="text-gray-600 text-lg mb-6 text-center leading-relaxed">Pembersihan menyeluruh untuk rumah/apartemen mulai 2 kamar</p>
                    <div class="bg-green-50 rounded-2xl p-6 mb-6">
                        <div class="text-center">
                            <div class="text-4xl font-black text-green-600 mb-2">Rp 150K</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide font-medium">Mulai dari</div>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8 text-gray-700">
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3 w-5"></i> Vacuum & pel lantai semua ruangan</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3 w-5"></i> Bersih kamar mandi lengkap</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3 w-5"></i> Lap furniture & permukaan</li>
                        <li class="flex items-center"><i class="fas fa-check text-green-500 mr-3 w-5"></i> Durasi 3 jam • 2 orang</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full text-center gradient-primary text-white font-bold py-4 rounded-2xl hover:shadow-xl transition-all duration-200">
                        Pesan Sekarang
                    </a>
                </div>
            </div>

            <!-- Repeat similar for other services with different icons/colors -->
            <div class="group">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-building text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Kantor & Apartemen</h3>
                    <p class="text-gray-600 text-lg mb-6 text-center leading-relaxed">Layanan khusus untuk kantor dan apartemen komersial</p>
                    <div class="bg-blue-50 rounded-2xl p-6 mb-6">
                        <div class="text-center">
                            <div class="text-4xl font-black text-blue-600 mb-2">Rp 200K</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide font-medium">Mulai dari</div>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8 text-gray-700">
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-3 w-5"></i> Pembersihan area kerja lengkap</li>
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-3 w-5"></i> Sanitasi meja & kursi</li>
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-3 w-5"></i> Toilet kantor bersih kinclong</li>
                        <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-3 w-5"></i> Durasi 4 jam • 3 orang</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-gradient-to-br from-blue-500 to-indigo-600 text-white font-bold py-4 rounded-2xl hover:shadow-xl transition-all duration-200">
                        Pesan Sekarang
                    </a>
                </div>
            </div>

            <div class="group">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-broom text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Deep Cleaning</h3>
                    <p class="text-gray-600 text-lg mb-6 text-center leading-relaxed">Pembersihan mendalam untuk area tersembunyi dan sulit dijangkau</p>
                    <div class="bg-purple-50 rounded-2xl p-6 mb-6">
                        <div class="text-center">
                            <div class="text-4xl font-black text-purple-600 mb-2">Rp 350K</div>
                            <div class="text-sm text-gray-500 uppercase tracking-wide font-medium">Mulai dari</div>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8 text-gray-700">
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-3 w-5"></i> Lemari, rak, dan area tersembunyi</li>
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-3 w-5"></i> Jendela & kaca bersih mengkilap</li>
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-3 w-5"></i> Disinfeksi lengkap semua permukaan</li>
                        <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-3 w-5"></i> Durasi 6 jam • 4 orang</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full text-center bg-gradient-to-br from-purple-500 to-pink-600 text-white font-bold py-4 rounded-2xl hover:shadow-xl transition-all duration-200">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center mt-20 pt-20 border-t border-gray-200">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Siap Dapatkan Rumah Bersih?</h3>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Mulai perjalanan kebersihan rumah Anda dengan layanan profesional terbaik</p>
            <a href="{{ route('register') }}" class="btn-primary inline-flex items-center mx-auto">
                <i class="fas fa-arrow-right mr-3"></i>
                <span>Pesan Layanan Sekarang</span>
            </a>
        </div>
    </div>
</section>

<!-- How It Works -->
<section id="about" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center bg-emerald-100 text-emerald-800 px-6 py-3 rounded-full mb-6">
                <i class="fas fa-clock mr-2"></i>
                <span class="font-semibold uppercase tracking-wide text-sm">Mudah & Cepat</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Bagaimana Cara <span class="bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">Kerjanya</span>
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="space-y-8">
                    <div class="flex items-start gap-4 p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="flex-shrink-0 w-10 h-10 gradient-primary rounded-xl flex items-center justify-center mt-0.5">
                            <i class="fas fa-user-plus text-white font-bold text-sm">1</i>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Daftar Akun</h3>
                            <p class="text-gray-600 leading-relaxed">Buat akun gratis dalam 30 detik dan pilih layanan yang diinginkan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="flex-shrink-0 w-10 h-10 gradient-primary rounded-xl flex items-center justify-center mt-0.5">
                            <i class="fas fa-calendar-check text-white font-bold text-sm">2</i>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Pilih Jadwal</h3>
                            <p class="text-gray-600 leading-relaxed">Tentukan tanggal dan waktu yang sesuai dengan jadwal Anda</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="flex-shrink-0 w-10 h-10 gradient-primary rounded-xl flex items-center justify-center mt-0.5">
                            <i class="fas fa-credit-card text-white font-bold text-sm">3</i>
                        </div>
                        <div>
                            <h3 class="font-bold text-xl text-gray-900 mb-2">Bayar & Selesai</h3>
                            <p class="text-gray-600 leading-relaxed">Bayar aman via transfer/QRIS, tim kami datang sesuai janji</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-3xl p-12 shadow-2xl border border-green-100">
                    <div class="text-center mb-8">
                        <i class="fas fa-sparkles text-6xl text-green-500 mb-4"></i>
                        <h3 class="text-3xl font-bold text-gray-900 mb-2">Hasil Sempurna</h3>
                        <p class="text-xl text-gray-600">Rumah bersih mengkilap dalam hitungan jam</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <div class="text-2xl font-bold text-green-600 mb-1">24/7</div>
                            <div class="text-sm text-gray-500">Support</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <div class="text-2xl font-bold text-blue-600 mb-1">15min</div>
                            <div class="text-sm text-gray-500">Response</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <div class="text-2xl font-bold text-yellow-600 mb-1">100%</div>
                            <div class="text-sm text-gray-500">Garantie</div>
                        </div>
                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <div class="text-2xl font-bold text-purple-600 mb-1">4.9⭐</div>
                            <div class="text-sm text-gray-500">Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <div class="inline-flex items-center bg-yellow-100 text-yellow-800 px-6 py-3 rounded-full mb-6">
                <i class="fas fa-star mr-2"></i>
                <span class="font-semibold uppercase tracking-wide text-sm">Apa Kata Pelanggan</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">5K+ Pelanggan <span class="bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text text-transparent">Puasa</span></h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gradient-to-b from-gray-50 to-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="flex mb-6">
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed mb-6 italic">"Tim sangat profesional dan tepat waktu. Rumah bersih kinclong, harga worth it banget!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">AS</div>
                    <div>
                        <h4 class="font-bold text-gray-900">Ani S.</h4>
                        <p class="text-sm text-gray-500">Pelanggan Setia</p>
                    </div>
                </div>
            </div>
            <!-- More testimonials... -->
            <div class="bg-gradient-to-b from-gray-50 to-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="flex mb-6">
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed mb-6 italic">"Layanannya luar biasa! Staff ramah dan detail banget dalam membersihkan. Recommended!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">RB</div>
                    <div>
                        <h4 class="font-bold text-gray-900">Rina Budi</h4>
                        <p class="text-sm text-gray-500">Kantor Jakarta</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-b from-gray-50 to-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                <div class="flex mb-6">
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl mr-1"></i>
                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                </div>
                <p class="text-gray-700 text-lg leading-relaxed mb-6 italic">"Paling suka yang ini! Booking mudah, harga transparan, hasil bersih sempurna."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">DJ</div>
                    <div>
                        <h4 class="font-bold text-gray-900">Dedi Joko</h4>
                        <p class="text-sm text-gray-500">Rumah Malang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="gradient-hero py-24">
    <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center text-white">
        <h2 class="text-4xl md:text-5xl font-black mb-6">
            <span class="text-6xl">🎯</span> <br>Siap Rumah <span class="text-yellow-300">Bersih</span> Sempurna?
        </h2>
        <p class="text-2xl text-white/90 mb-10 max-w-2xl mx-auto leading-relaxed">
            Jangan tunggu lagi! Ribuan keluarga sudah mempercayakan kebersihan rumah mereka kepada kami.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('register') }}" class="btn-primary text-xl shadow-2xl inline-flex items-center">
                <i class="fas fa-fire mr-3"></i>
                <span>Mulai Pesan (20% OFF)</span>
            </a>
            <a href="{{ route('login') }}" class="px-10 py-4 font-semibold text-white border-2 border-white/50 rounded-2xl hover:bg-white/10 transition-all text-xl">
                <i class="fas fa-sign-in-alt mr-3"></i>Masuk
            </a>
        </div>
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 opacity-80">
            <div class="text-center py-4">
                <div class="text-3xl font-black mb-1">5K+</div>
                <div class="text-sm uppercase tracking-wide">Pelanggan Bahagia</div>
            </div>
            <div class="text-center py-4">
                <div class="text-3xl font-black mb-1">15K+</div>
                <div class="text-sm uppercase tracking-wide">Layanan Selesai</div>
            </div>
            <div class="text-center py-4">
                <div class="text-3xl font-black mb-1">4.9</div>
                <div class="text-sm uppercase tracking-wide">Rating Google</div>
            </div>
            <div class="text-center py-4">
                <div class="text-3xl font-black mb-1">24 Jam</div>
                <div class="text-sm uppercase tracking-wide">Layanan Aktif</div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-4 gap-8 mb-12">
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 gradient-primary rounded-2xl flex items-center justify-center">
                        <i class="fas fa-sparkles text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black bg-gradient-to-r from-green-400 to-emerald-400 bg-clip-text text-transparent">GOCLEAN</h3>
                        <p class="text-sm text-gray-400 mt-1">Pembersihan Profesional #1</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">Layanan pembersihan rumah dan kantor terpercaya dengan standar internasional.</p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-xl flex items-center justify-center transition">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-xl flex items-center justify-center transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-gray-700 rounded-xl flex items-center justify-center transition">
                        <i class="fas fa-phone text-xl"></i>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-gray-200 mb-6 uppercase tracking-wide text-sm">Layanan</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="#services" class="hover:text-white transition">Pembersihan Rumah</a></li>
                    <li><a href="#services" class="hover:text-white transition">Deep Cleaning</a></li>
                    <li><a href="#services" class="hover:text-white transition">Kantor & Apartemen</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Custom Order</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-200 mb-6 uppercase tracking-wide text-sm">Perusahaan</h4>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li><a href="about" class="hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Kontak</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition">Dashboard</a></li>
                    <li><a href="#" class="hover:text-white transition">Karir</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-gray-200 mb-6 uppercase tracking-wide text-sm">Hubungi</h4>
                <div class="space-y-3 text-sm text-gray-400">
                    <div class="flex items-center">
                        <i class="fas fa-phone w-5 mr-3 text-green-400"></i>
                        <span>0812-3456-7890</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-envelope w-5 mr-3 text-green-400"></i>
                        <span>info@goclean.id</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt w-5 mr-3 text-green-400"></i>
                        <span>Malang, Jawa Timur</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
            © 2024 GOCLEAN - Sistem Pemesanan Otomatis. Dibuat dengan ❤️ untuk kebersihan Indonesia.
        </div>
    </div>
</footer>

<script>
function toggleMobileMenu() {
    document.getElementById('mobileMenu').classList.toggle('hidden');
}

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Navbar scroll effect
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 100) {
        nav.style.background = 'rgba(255,255,255,0.95)';
        nav.style.backdropFilter = 'blur(20px)';
    } else {
        nav.style.background = 'rgba(255,255,255,0.8)';
    }
});
</script>

</body>
</html>


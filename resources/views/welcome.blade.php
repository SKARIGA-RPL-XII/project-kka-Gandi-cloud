<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOCLEAN — Layanan Pembersihan Profesional</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .nav-link { color: rgba(255,255,255,0.85); text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.2s; }
        .nav-link:hover { color: white; }
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-white">

{{-- NAVBAR --}}
<nav class="fixed top-0 w-full z-50 px-6 py-4" style="background:linear-gradient(135deg,#07102b,#07102b)">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-xs"></i>
            </div>
            <span class="text-white font-bold text-lg">GOCLEAN</span>
        </div>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="#home" class="nav-link">Beranda</a>
            <a href="#services" class="nav-link">Layanan</a>
            <a href="about" class="nav-link">Tentang</a>
            <a href="{{ route('contact') }}" class="nav-link">Kontak</a>
        </div>

        <div class="hidden md:flex items-center gap-3">
            <a href="{{ route('login') }}" class="text-white/80 hover:text-white text-sm font-medium transition">Masuk</a>
            <a href="{{ route('register') }}" class="bg-white text-green-700 font-semibold px-4 py-2 rounded-xl text-sm hover:bg-green-50 transition">
                Daftar Gratis
            </a>
        </div>

        {{-- Mobile --}}
        <button class="md:hidden text-white" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-white/20">
        <div class="flex flex-col gap-3 pt-4">
            <a href="#services" class="nav-link px-2">Layanan</a>
            <a href="{{ route('contact') }}" class="nav-link px-2">Kontak</a>
            <div class="flex gap-3 pt-2">
                <a href="{{ route('login') }}" class="flex-1 text-center border border-white/40 text-white py-2 rounded-xl text-sm font-medium">Masuk</a>
                <a href="{{ route('register') }}" class="flex-1 text-center bg-white text-green-700 py-2 rounded-xl text-sm font-semibold">Daftar</a>
            </div>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section id="home" class="pt-20 min-h-screen flex items-center" style="background:linear-gradient(135deg,#0a3d0a,#005c02 60%,#007a7a)">
    <div class="max-w-6xl mx-auto px-6 py-20 text-center text-white">
        <span class="inline-block bg-white/15 text-white/90 text-xs font-semibold px-4 py-2 rounded-full mb-6 border border-white/20">
            ✨ Layanan Pembersihan #1 Terpercaya
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
            Rumah Bersih,Hidup Lebih Nyaman
            <br>
        </h1>
        <p class="text-white/70 text-lg md:text-xl max-w-2xl mx-auto mb-10">
            Layanan pembersihan profesional untuk rumah dan kantor Anda. Pesan sekarang, kami siap melayani!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" class="bg-white text-green-700 font-bold px-8 py-4 rounded-2xl text-base hover:bg-green-50 transition shadow-xl">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk Sekarang
            </a>
            <a href="#services" class="border-2 border-white/40 text-white font-semibold px-8 py-4 rounded-2xl text-base hover:bg-white/10 transition">
                <i class="fas fa-eye mr-2"></i> Lihat Layanan
            </a>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-3 gap-6 max-w-lg mx-auto mt-16">
            <div class="text-center">
                <p class="text-3xl font-bold">500+</p>
                <p class="text-white/60 text-sm mt-1">Pelanggan</p>
            </div>
            <div class="text-center border-x border-white/20">
                <p class="text-3xl font-bold">4.9★</p>
                <p class="text-white/60 text-sm mt-1">Rating</p>
            </div>
            <div class="text-center">
                <p class="text-3xl font-bold">100%</p>
                <p class="text-white/60 text-sm mt-1">Puas</p>
            </div>
        </div>
    </div>
</section>

{{-- WHY US --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih GOCLEAN?</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Kami berkomitmen memberikan layanan terbaik dengan standar profesional tinggi</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $features = [
                ['icon'=>'fa-shield-alt','color'=>'bg-blue-100 text-blue-600','title'=>'Terpercaya','desc'=>'Tim profesional berpengalaman dengan standar keamanan tinggi'],
                ['icon'=>'fa-clock','color'=>'bg-green-100 text-green-600','title'=>'Tepat Waktu','desc'=>'Layanan sesuai jadwal yang telah disepakati bersama'],
                ['icon'=>'fa-tools','color'=>'bg-yellow-100 text-yellow-600','title'=>'Peralatan Modern','desc'=>'Menggunakan peralatan dan bahan pembersih berkualitas'],
                ['icon'=>'fa-tag','color'=>'bg-purple-100 text-purple-600','title'=>'Harga Terjangkau','desc'=>'Tarif kompetitif dengan kualitas layanan terbaik'],
            ];
            @endphp
            @foreach($features as $feat)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition hover:-translate-y-1">
                <div class="w-12 h-12 {{ $feat['color'] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $feat['icon'] }} text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">{{ $feat['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $feat['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SERVICES --}}
<section id="services" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Pilih layanan yang sesuai dengan kebutuhan Anda</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
            $services = [
                ['icon'=>'fa-home','title'=>'Pembersihan Rumah','price'=>'Rp 150.000','desc'=>'Pembersihan menyeluruh seluruh ruangan rumah Anda','features'=>['Vacuum & pel lantai','Bersih kamar mandi','Lap furniture','Durasi 1+- jam'],'color'=>'from-green-500 to-emerald-600'],
                ['icon'=>'fa-building','title'=>'Pembersihan Kantor','price'=>'Rp 200.000','desc'=>'Jaga kebersihan lingkungan kerja Anda','features'=>['Bersih area kerja','Sanitasi meja & kursi','Bersih toilet kantor','Durasi 1-2 jam'],'color'=>'from-blue-500 to-indigo-600'],
                ['icon'=>'fa-broom','title'=>'Deep Cleaning','price'=>'Rp 300.000','desc'=>'Pembersihan mendalam untuk area sulit dijangkau','features'=>['Pembersihan mendalam','Area sulit dijangkau','Disinfeksi menyeluruh','Durasi 2 jam'],'color'=>'from-purple-500 to-pink-600'],
            ];
            @endphp
            @foreach($services as $svc)
            <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg transition hover:-translate-y-1">
                <div class="bg-gradient-to-br {{ $svc['color'] }} p-6 text-white text-center">
                    <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas {{ $svc['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-lg">{{ $svc['title'] }}</h3>
                    <p class="text-3xl font-extrabold mt-2">{{ $svc['price'] }}</p>
                </div>
                <div class="p-6 bg-white">
                    <p class="text-gray-500 text-sm mb-4">{{ $svc['desc'] }}</p>
                    <ul class="space-y-2 mb-6">
                        @foreach($svc['features'] as $item)
                        <li class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check text-green-500 text-xs"></i> {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('register') }}" class="block text-center bg-gray-800 hover:bg-gray-900 text-white font-semibold py-3 rounded-xl text-sm transition">
                        Pesan Layanan
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20" style="background:linear-gradient(135deg,#0a3d0a,#005c02 60%,#007a7a)">
    <div class="max-w-3xl mx-auto px-6 text-center text-white">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Untuk Rumah Bersih?</h2>
        <p class="text-white/70 text-lg mb-8">Daftar sekarang dan dapatkan layanan pembersihan profesional pertama Anda</p>
        <a href="{{ route('register') }}" class="inline-block bg-white text-green-700 font-bold px-10 py-4 rounded-2xl text-base hover:bg-green-50 transition shadow-xl">
            <i class="fas fa-rocket mr-2"></i> Mulai Sekarang
        </a>
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-sparkles text-white text-xs"></i>
                    </div>
                    <span class="font-bold text-lg">GOCLEAN</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">Layanan pembersihan profesional terpercaya untuk rumah dan kantor Anda.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-gray-400">Layanan</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#services" class="hover:text-white transition">Pembersihan Rumah</a></li>
                    <li><a href="#services" class="hover:text-white transition">Pembersihan Kantor</a></li>
                    <li><a href="#services" class="hover:text-white transition">Deep Cleaning</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-gray-400">Kontak</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-phone mr-2"></i> 0812-3456-7890</li>
                    <li><i class="fas fa-envelope mr-2"></i> info@goclean.id</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Malang, Indonesia</li>
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

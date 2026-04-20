<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak — GOCLEAN</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif;}</style>
</head>
<body class="bg-gray-50 min-h-screen">

{{-- Navbar --}}
<nav class="px-6 py-4 shadow-sm" style="background:linear-gradient(135deg,#0a3d0a,#005c02)">
    <div class="max-w-5xl mx-auto flex items-center justify-between">
        <a href="/" class="flex items-center gap-2 text-white font-bold text-lg">
            <div class="w-7 h-7 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-xs"></i>
            </div>
            GOCLEAN
        </a>
        <a href="/" class="text-white/80 hover:text-white text-sm transition">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>
</nav>

<div class="max-w-5xl mx-auto px-6 py-10">

    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Hubungi Kami</h1>
        <p class="text-gray-500">Kami siap membantu Anda. Kirim pesan dan kami akan segera merespons.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Info --}}
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="font-bold text-gray-800 mb-4">Informasi Kontak</h2>
                <div class="space-y-4">
                    @foreach([
                        ['icon'=>'fa-map-marker-alt','color'=>'bg-green-100 text-green-600','title'=>'Alamat','val'=>'Jl. India No.2, Singosari, 605654'],
                        ['icon'=>'fa-phone','color'=>'bg-blue-100 text-blue-600','title'=>'Telepon','val'=>'0812-3456-7890'],
                        ['icon'=>'fa-envelope','color'=>'bg-purple-100 text-purple-600','title'=>'Email','val'=>'info@goclean.id'],
                        ['icon'=>'fa-clock','color'=>'bg-yellow-100 text-yellow-600','title'=>'Jam Operasional','val'=>'Sen-Jum 08:00-17:00 · Sab 08:00-14:00'],
                    ] as $i)
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 {{ $i['color'] }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $i['icon'] }} text-sm"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">{{ $i['title'] }}</p>
                            <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $i['val'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <h2 class="font-bold text-gray-800 mb-4">Kirim Pesan</h2>

            @if(session('success'))
                <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Nama Anda"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required placeholder="nama@email.com"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Subjek</label>
                    <input type="text" name="subject" required placeholder="Topik pesan"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Pesan</label>
                    <textarea name="message" required rows="4" placeholder="Tulis pesan Anda..."
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100 resize-none"></textarea>
                </div>
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-xl transition text-sm">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

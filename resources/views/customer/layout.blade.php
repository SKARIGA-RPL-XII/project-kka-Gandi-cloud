<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — GOCLEAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-link { display:flex; align-items:center; gap:12px; padding:11px 16px; border-radius:10px; margin:2px 8px; color:rgba(255,255,255,0.8); text-decoration:none; font-size:14px; font-weight:500; transition:all 0.2s; }
        .sidebar-link:hover { background:rgba(255,255,255,0.15); color:white; transform:translateX(3px); }
        .sidebar-link.active { background:rgba(255,255,255,0.2); color:white; }
        .sidebar-link i { width:16px; text-align:center; }
        .main { margin-left:240px; min-height:100vh; background:#f8fafc; }
        @media(max-width:768px){
            .sidebar{ position:fixed; left:-240px; z-index:50; transition:left 0.3s; }
            .sidebar.open{ left:0; }
            .main{ margin-left:0; }
            .overlay{ display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:40; }
            .overlay.show{ display:block; }
        }
    </style>
</head>
<body class="bg-gray-50">

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

{{-- SIDEBAR --}}
<aside class="sidebar fixed top-0 left-0 w-60 h-screen flex flex-col shadow-xl" style="background:linear-gradient(160deg,#0a3d0a,#005c02 50%,#007a7a)">
    <div class="px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-xs"></i>
            </div>
            <div>
                <h2 class="text-white font-bold text-base leading-none">GOCLEAN</h2>
                <p class="text-white/50 text-xs mt-0.5">Customer</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 py-4 overflow-y-auto">
        <a href="{{ route('customer.dashboard') }}" class="sidebar-link {{ request()->routeIs('customer.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="{{ route('order.create') }}" class="sidebar-link {{ request()->routeIs('order.create') ? 'active' : '' }}">
            <i class="fas fa-plus-circle"></i> Buat Pesanan
        </a>
        <a href="{{ route('order.history') }}" class="sidebar-link {{ request()->routeIs('order.history') ? 'active' : '' }}">
            <i class="fas fa-history"></i> Histori Pesanan
        </a>
        <a href="{{ route('customer.profile') }}" class="sidebar-link {{ request()->routeIs('customer.profile') ? 'active' : '' }}">
            <i class="fas fa-user"></i> Profil Saya
        </a>
    </nav>

    <div class="px-3 py-4 border-t border-white/10">
        <div class="flex items-center gap-3 px-3 py-3 bg-white/10 rounded-xl">
            <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-white text-xs font-semibold truncate">{{ auth()->user()->name }}</p>
                <p class="text-white/50 text-xs">Customer</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white/60 hover:text-red-300 transition" title="Logout">
                    <i class="fas fa-sign-out-alt text-sm"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- MAIN --}}
<div class="main flex flex-col">
    <header class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between sticky top-0 z-20 shadow-sm">
        <div class="flex items-center gap-3">
            <button class="md:hidden text-gray-500" onclick="openSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-gray-800 font-semibold">@yield('title')</h1>
        </div>
        <a href="{{ route('order.create') }}" class="hidden sm:flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            <i class="fas fa-plus"></i> Buat Pesanan
        </a>
    </header>

    <main class="flex-1 p-6">
        @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-5 text-sm">
                <i class="fas fa-check-circle text-green-500"></i> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-5 text-sm">
                <i class="fas fa-exclamation-circle text-red-500"></i> {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>
</div>

<script>
function openSidebar(){ document.querySelector('.sidebar').classList.add('open'); document.getElementById('overlay').classList.add('show'); }
function closeSidebar(){ document.querySelector('.sidebar').classList.remove('open'); document.getElementById('overlay').classList.remove('show'); }
</script>
</body>
</html>

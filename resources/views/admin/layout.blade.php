<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — GOCLEAN Admin</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; overflow-x: hidden; }

        /* Sidebar */
        .sidebar { width: 260px; transition: all 0.3s; }
        .sidebar-link { display: flex; align-items: center; gap: 12px; padding: 11px 20px; border-radius: 10px; margin: 2px 10px; color: rgba(255,255,255,0.8); text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.2s; }
        .sidebar-link:hover { background: rgba(255,255,255,0.15); color: white; transform: translateX(3px); }
        .sidebar-link.active { background: rgba(255,255,255,0.2); color: white; box-shadow: 0 2px 8px rgba(0,0,0,0.15); }
        .sidebar-link i { width: 18px; text-align: center; font-size: 15px; }

        /* Topbar */
        .topbar { height: 64px; background: white; border-bottom: 1px solid #f1f5f9; position: sticky; top: 0; z-index: 20; }

        /* Content */
        .main-content { margin-left: 260px; min-height: 100vh; background: #f8fafc; }

        /* Alert */
        .alert { padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; display: flex; align-items: center; gap: 10px; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.3); border-radius: 10px; }

        /* Mobile */
        @media (max-width: 768px) {
            .sidebar { position: fixed; left: -260px; z-index: 50; }
            .sidebar.open { left: 0; }
            .main-content { margin-left: 0; }
            .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 40; }
            .overlay.show { display: block; }
        }
    </style>
</head>
<body class="bg-gray-50">

{{-- Overlay mobile --}}
<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

{{-- SIDEBAR --}}
<aside class="sidebar fixed top-0 left-0 h-screen flex flex-col shadow-xl z-50" style="background: linear-gradient(160deg, #0a3d0a 0%, #005c02 50%, #007a7a 100%);">

    {{-- Logo --}}
    <div class="px-6 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-sparkles text-white text-sm"></i>
            </div>
            <div>
                <h2 class="text-white font-bold text-lg leading-none">GOCLEAN</h2>
                <p class="text-white/50 text-xs mt-0.5">Admin Panel</p>
            </div>
        </div>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 py-4 overflow-y-auto">
        <p class="text-white/30 text-xs font-semibold uppercase px-6 mb-2 tracking-wider">Menu Utama</p>

        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>
        <a href="{{ route('admin.orders') }}" class="sidebar-link {{ request()->is('admin/orders') ? 'active' : '' }}">
            <i class="fas fa-clipboard-list"></i> Kelola Pesanan
        </a>
        <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->is('admin/users') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Kelola Users
        </a>
        <a href="{{ route('admin.services') }}" class="sidebar-link {{ request()->is('admin/services*') ? 'active' : '' }}">
            <i class="fas fa-broom"></i> Kelola Layanan
        </a>

        <p class="text-white/30 text-xs font-semibold uppercase px-6 mt-5 mb-2 tracking-wider">Lainnya</p>

        <a href="{{ route('admin.contacts') }}" class="sidebar-link {{ request()->is('admin/contacts') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i> Pesan Kontak
        </a>
        <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->is('admin/settings') ? 'active' : '' }}">
            <i class="fas fa-cog"></i> Pengaturan
        </a>
    </nav>

    {{-- User Info --}}
    <div class="px-4 py-4 border-t border-white/10">
        <div class="flex items-center gap-3 px-3 py-3 bg-white/10 rounded-xl">
            <div class="w-9 h-9 bg-white/20 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                A
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                <p class="text-white/50 text-xs truncate">Administrator</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white/60 hover:text-red-300 transition" title="Logout">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- MAIN --}}
<div class="main-content flex flex-col">

    {{-- TOPBAR --}}
    <header class="topbar flex items-center justify-between px-6 shadow-sm">
        <div class="flex items-center gap-4">
            {{-- Mobile toggle --}}
            <button class="md:hidden text-gray-500 hover:text-gray-700" onclick="openSidebar()">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div>
                <h1 class="text-gray-800 font-semibold text-lg">@yield('title')</h1>
                <p class="text-gray-400 text-xs hidden sm:block">{{ now()->isoFormat('dddd, D MMMM Y') }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden sm:flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-lg">
                <div class="w-7 h-7 bg-gradient-to-br from-green-500 to-teal-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                    A
                </div>
                <span class="text-gray-700 text-sm font-medium">{{ auth()->user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="hidden sm:block">
                @csrf
                <button type="submit" class="flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm font-medium transition">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </header>

    {{-- CONTENT --}}
    <main class="flex-1 p-6">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle text-green-500"></i>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle text-red-500"></i>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script>
    function openSidebar() {
        document.querySelector('.sidebar').classList.add('open');
        document.getElementById('overlay').classList.add('show');
    }
    function closeSidebar() {
        document.querySelector('.sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">

    {{-- SIDEBAR --}}
   <aside class="w-72 bg-gradient-to-b from-[#005c02] to-[#00f7ff] text-white min-h-screen fixed flex flex-col shadow-lg">

    {{-- Header --}}
    <div class="px-6 py-5 border-b border-white/20">
        <h2 class="text-2xl font-bold tracking-wide">Admin Dashboard</h2>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 mt-3">
        <ul class="flex flex-col space-y-1">

            <li>
                <a href="/admin/dashboard"
                   class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition @if(request()->is('admin/dashboard')) bg-white/10 border-l-4 border-white text-white font-medium @endif">
                    <i class="fa fa-tachometer-alt w-6 text-center mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/admin/content"
                   class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition @if(request()->is('admin/content')) bg-white/10 border-l-4 border-white text-white font-medium @endif">
                    <i class="fa fa-file-alt w-6 text-center mr-3"></i>
                    <span>Kelola Konten</span>
                </a>
            </li>

            <li>
                <a href="/admin/analytics"
                   class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition @if(request()->is('admin/analytics')) bg-white/10 border-l-4 border-white text-white font-medium @endif">
                    <i class="fa fa-chart-bar w-6 text-center mr-3"></i>
                    <span>Analytics</span>
                </a>
            </li>

            <li>
                <a href="/admin/settings"
                   class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition">
                    <i class="fa fa-cog w-6 text-center mr-3"></i>
                    <span>Pengaturan</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>


    {{-- MAIN --}}
    <main class="flex-1 ml-72 min-h-screen flex flex-col">
        {{-- HEADER --}}
        <header class="bg-white shadow flex justify-between items-center px-6 py-4">
            <h1 class="text-xl font-semibold">@yield('title')</h1>
            <div class="flex items-center space-x-3">
                <span class="text-gray-700">Selamat datang, Admin</span>
                <button class="bg-red-500 text-white px-3 py-1.5 rounded">Logout</button>
            </div>
        </header>

        {{-- CONTENT --}}
        <section class="p-6">
            @yield('content')
        </section>
    </main>
</body>
</html>

<style>
.nav-item {
    @apply flex items-center px-6 py-3 text-white/80 hover:text-white transition;
}
.nav-item.active {
    @apply bg-white/10 border-l-4 border-white text-white font-semibold;
}
</style>

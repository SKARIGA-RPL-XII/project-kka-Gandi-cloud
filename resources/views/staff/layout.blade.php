<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Staff Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- SIDEBAR -->
        <aside
            class="w-72 min-h-screen fixed bg-gradient-to-b from-[#005c02] to-[#00f7ff] text-white shadow-lg flex flex-col">

            <div class="px-6 py-5 border-b border-white/20">
                <h2 class="text-xl font-bold tracking-wide">Staff Dashboard</h2>
            </div>

            <nav class="flex-1 mt-3">
                <ul class="flex flex-col space-y-1">
                    <li>
                        <a href="/staff/test"
                            class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition">
                            <i class="fas fa-tachometer-alt w-6 text-center mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/staff/orders/test"
                            class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition">
                            <i class="fas fa-clipboard-list w-6 text-center mr-3"></i>
                            <span>Kelola Pesanan</span>
                        </a>
                    </li>

                    <li>
                        <a href="/staff/orders/test?status=proses"
                            class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition">
                            <i class="fas fa-tasks w-6 text-center mr-3"></i>
                            <span>Pekerjaan Saya</span>
                        </a>
                    </li>

                    <li>
                        <a href="/staff/orders/test?status=selesai"
                            class="flex items-center px-6 py-3 text-white/90 hover:bg-white/10 hover:text-white transition">
                            <i class="fas fa-history w-6 text-center mr-3"></i>
                            <span>Riwayat</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 min-h-screen ml-72 flex flex-col">

            <header class="bg-white shadow-sm border-b flex items-center justify-between px-6 py-4">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('title')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Selamat datang, Staff</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Logout
                        </button>
                    </form>

                </div>
            </header>

            <section class="p-6 flex-1 overflow-y-auto">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </section>
        </main>

    </div>

</body>

</html>
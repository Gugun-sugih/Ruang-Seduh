<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - RuangSeduh')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#F4F8F6] text-gray-800 font-body">
<section class="min-h-screen bg-[#F4F8F6]">
    <div class="flex">

        {{-- SIDEBAR (HANYA DI SINI) --}}
        <aside class="w-64 bg-white border-r min-h-screen px-6 py-8 hidden lg:block">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" class="w-10" alt="logo">
                <h1 class="text-xl font-heading font-bold text-brand">AdminPanel</h1>
            </div>

            <nav class="mt-10 space-y-2 font-body text-sm">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-4 py-3 rounded-xl
                   {{ request()->routeIs('admin.dashboard') ? 'bg-brand text-white font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.orders.index') }}"
                   class="block px-4 py-3 rounded-xl
                   {{ request()->routeIs('admin.orders.*') ? 'bg-brand text-white font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                    Kelola Pesanan
                </a>

                <a href="{{ route('admin.menu.index') }}"
                   class="block px-4 py-3 rounded-xl
                   {{ request()->routeIs('admin.menu.*') ? 'bg-brand text-white font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                    Kelola Menu
                </a>

                <a href="{{ route('admin.messages.index') }}"
                   class="block px-4 py-3 rounded-xl
                   {{ request()->routeIs('admin.messages.*') ? 'bg-brand text-white font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                    Pesan Pelanggan
                </a>
            </nav>

            <form action="{{ route('admin.logout') }}" method="POST" class="mt-10">
                @csrf
                <button class="w-full px-4 py-3 rounded-xl border text-red-500 font-semibold hover:bg-red-50 transition">
                    Logout
                </button>
            </form>
        </aside>

        {{-- MAIN --}}
        <main class="flex-1 p-10">
            @yield('content')
        </main>

    </div>
</section>
</body>
</html>

@php
    $active = fn($path) => request()->is($path);
@endphp

<header class="w-full border-b bg-white">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="flex items-center gap-3">
    <img src="{{ asset('images/logo.png') }}" alt="RuangSeduh" class="w-10 h-10 object-contain">
    <span class="font-heading font-bold text-xl text-brand">RuangSeduh</span>
</a>

        <!-- Menu -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-semibold tracking-wide text-gray-800">
            <a href="/"
               class="{{ $active('/') ? 'px-5 py-2 rounded-full bg-coffee text-white' : 'hover:text-coffee' }}">
                TENTANG
            </a>

            <a href="/menu" class="{{ $active('menu') ? 'text-coffee' : 'hover:text-coffee' }}">
                MENU
            </a>

            <a href="/toko" class="{{ $active('toko') ? 'text-coffee' : 'hover:text-coffee' }}">
                TOKO
            </a>

            <a href="/pesan" class="{{ $active('pesan') ? 'text-coffee' : 'hover:text-coffee' }}">
                PESAN
            </a>

            <a href="/kontak" class="{{ $active('kontak') ? 'text-coffee' : 'hover:text-coffee' }}">
                KONTAK KAMI
            </a>
        </nav>

        <!-- Language -->
        <div class="flex items-center gap-2 text-sm font-semibold">
            <a href="#" class="hover:text-coffee">EN</a>
            <span class="text-gray-300">|</span>
            <a href="#" class="text-brand">ID</a>
        </div>

    </div>
</header>

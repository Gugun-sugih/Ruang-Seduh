@extends('layouts.admin')

@section('title', 'Dashboard Admin - RuangSeduh')

@section('content')
<section class="min-h-screen bg-[#F4F8F6]">

    <div class="flex">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-white border-r min-h-screen px-6 py-8 hidden lg:block">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" class="w-10" alt="logo">
                <h1 class="text-xl font-heading font-bold text-brand">AdminPanel</h1>
            </div>

            <nav class="mt-10 space-y-2 font-body text-sm">
                <a href="{{ route('admin.dashboard') }}"
                    class="block px-4 py-3 rounded-xl bg-brand text-white font-semibold">
                    Dashboard
                </a>

                <a href="{{ route('admin.orders.index') }}"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100 text-gray-700 font-body">
                Kelola Pesanan
                </a>

            </nav>

            <form action="{{ route('admin.logout') }}" method="POST" class="mt-10">
                @csrf
                <button
                    class="w-full px-4 py-3 rounded-xl border text-red-500 font-semibold hover:bg-red-50 transition">
                    Logout
                </button>
            </form>
        </aside>


        {{-- MAIN --}}
        <main class="flex-1 p-10">

            <h1 class="text-4xl font-heading font-bold text-brand">
                Dashboard Admin
            </h1>
            <p class="text-gray-500 font-body mt-2">
                Selamat datang di panel admin RuangSeduh
            </p>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border">
                    <h2 class="text-sm text-gray-500 font-body">Total Pesanan</h2>
                    <p class="text-3xl font-heading font-bold text-brand mt-2">24</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border">
                    <h2 class="text-sm text-gray-500 font-body">Total Pendapatan</h2>
                    <p class="text-3xl font-heading font-bold text-brand mt-2">Rp1.250.000</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border">
                    <h2 class="text-sm text-gray-500 font-body">Menu Aktif</h2>
                    <p class="text-3xl font-heading font-bold text-brand mt-2">32</p>
                </div>
            </div>

            <div class="mt-10 bg-white rounded-2xl p-8 shadow-sm border">
                <h2 class="text-xl font-heading font-bold text-brand">Aktivitas Terbaru</h2>

                <ul class="mt-6 space-y-4 font-body text-sm text-gray-700">
                    <li>✅ Pesanan baru masuk: Espresso (Meja 3)</li>
                    <li>✅ Pesanan baru masuk: Affogato (Meja 1)</li>
                    <li>✅ Menu baru ditambahkan: Red Velvet</li>
                </ul>
            </div>

        </main>
    </div>
</section>
@endsection

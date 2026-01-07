@extends('layouts.app')
@section('title', 'Toko - RuangSeduh')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-16 text-center">
    <h1 class="text-4xl md:text-5xl font-heading font-bold text-brand">
        Toko Kami
    </h1>
    <p class="mt-3 font-body text-gray-500 max-w-xl mx-auto">
        Temukan toko kami dan nikmat pengalaman ngopi yang lebih menyenangkan!
    </p>

    <!-- Search -->
    <form method="GET" action="/toko" class="mt-8 max-w-xl mx-auto flex items-center border border-brand rounded-full px-4 py-2 bg-white shadow-sm">
        <span class="text-brand text-lg">🔍</span>

        <input type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari toko..."
            class="w-full outline-none text-sm font-body placeholder-gray-400 px-3"
        />

        <button class="bg-brand text-white px-6 py-2 rounded-full text-sm font-semibold">
            Cari
        </button>
    </form>
</section>

<section class="max-w-7xl mx-auto px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        @forelse($stores as $store)
            <x-store-card :store="$store" />
        @empty
            <p class="text-center text-gray-500 font-body col-span-2">
                Toko tidak ditemukan 😢
            </p>
        @endforelse

    </div>
</section>

<x-footer />

@endsection

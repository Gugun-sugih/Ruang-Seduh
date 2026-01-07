@extends('layouts.app')
@section('title', 'Pesan - RuangSeduh')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-16">

    <!-- Title -->
    <div class="text-center">
        <h1 class="text-4xl font-heading font-bold text-brand">
            Selamat Datang di RuangSeduh
        </h1>
        <p class="mt-2 text-sm font-body text-gray-500">
            Pilih menu favoritmu dan nikmati setiap momen dengan nyaman.
        </p>
    </div>

    <!-- Form -->
    <div class="mt-10 max-w-md mx-auto space-y-4">
        <div>
            <label class="text-sm font-body text-gray-700">Nama</label>
            <input type="text"
                class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:ring-brand focus:border-brand outline-none">
        </div>

        <div>
            <label class="text-sm font-body text-gray-700">No. Meja</label>
            <input type="text"
                class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:ring-brand focus:border-brand outline-none">
        </div>

        <div>
            <label class="text-sm font-body text-gray-700">Lokasi</label>
            <select class="w-full border border-gray-300 rounded-md px-4 py-2 mt-1 focus:ring-brand focus:border-brand outline-none">
                <option value="">Pilih Lokasi</option>
                <option>Dago</option>
                <option>Buah Batu</option>
                <option>Setiabudi</option>
                <option>Antapani</option>
                <option>Pasteur</option>
                <option>ujungberung</option>
            </select>
        </div>
    </div>

    @php
$cart = session('cart', []);
$total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
@endphp

<div class="mt-14 max-w-3xl mx-auto bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
    <div class="flex items-center justify-between">
        <h3 class="font-heading font-bold text-lg text-brand">Keranjang</h3>

        <form method="POST" action="{{ route('cart.clear') }}">
            @csrf
            <button class="text-sm text-gray-500 underline">Hapus semua</button>
        </form>
    </div>

    @if(count($cart) == 0)
        <p class="text-sm text-gray-500 mt-4 font-body">Keranjang masih kosong. Klik tombol + untuk memilih menu.</p>
    @else
        <div class="mt-6 space-y-4">
            @foreach($cart as $c)
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <img src="{{ $c['image'] }}" class="w-12 h-12 rounded-lg object-cover">
                        <div>
                            <p class="font-semibold text-brand">{{ $c['name'] }}</p>
                            <p class="text-xs text-gray-500 font-body">
                                Rp{{ number_format($c['price'],0,',','.') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <form method="POST" action="{{ route('cart.decrease') }}">
                            @csrf
                            <input type="hidden" name="name" value="{{ $c['name'] }}">
                            <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center">-</button>
                        </form>

                        <span class="font-semibold">{{ $c['qty'] }}</span>

                        <form method="POST" action="{{ route('cart.increase') }}">
                            @csrf
                            <input type="hidden" name="name" value="{{ $c['name'] }}">
                            <button class="w-8 h-8 rounded-full bg-brand text-white flex items-center justify-center">+</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex items-center justify-between border-t pt-4">
            <p class="font-semibold text-brand">Total</p>
            <p class="font-bold text-brand">Rp{{ number_format($total,0,',','.') }}</p>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('checkout') }}"
               class="inline-block bg-brand text-white px-8 py-3 rounded-full font-semibold shadow-sm">
               Pesan Sekarang
            </a>
        </div>
    @endif
</div>

    <!-- Menu List grouped -->
    <div class="mt-16 space-y-14">

        @foreach($grouped as $category => $items)
            <div>
                <h2 class="text-xl font-heading font-bold text-brand mb-8">
    {{ ucwords(str_replace('-', ' ', $category)) }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @foreach($items as $item)
                        <x-order-card :item="$item" />
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</section>

<x-footer />
@endsection

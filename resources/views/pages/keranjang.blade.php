@extends('layouts.app')

@section('title', 'Keranjang - RuangSeduh')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-16">

    <div class="text-center">
        <h1 class="text-5xl font-heading font-bold text-brand">Keranjang</h1>
        <p class="mt-3 text-sm font-body text-gray-500">
            Periksa kembali pesananmu sebelum melanjutkan.
        </p>
    </div>

    @php
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
        $tax = $subtotal * 0.10;
        $service = $subtotal * 0.05;
        $total = $subtotal + $tax + $service;
    @endphp

    <div class="mt-14 grid grid-cols-1 lg:grid-cols-3 gap-10">

        {{-- LEFT: LIST ITEM --}}
        <div class="lg:col-span-2 space-y-10">

            @if(count($cart) == 0)
                <div class="bg-white border rounded-2xl p-10 text-center text-gray-500">
                    Keranjang masih kosong.
                </div>
            @else
                @foreach($cart as $c)
                    <div class="bg-white border rounded-2xl p-6 flex flex-col md:flex-row gap-6 items-start">

                        {{-- image --}}
                        <img src="{{ $c['image'] }}" class="w-full md:w-56 h-40 object-cover rounded-2xl border" alt="{{ $c['name'] }}">

                        {{-- content --}}
                        <div class="flex-1">
                            <h2 class="text-2xl font-heading font-bold text-coffee">
                                {{ $c['name'] }}
                            </h2>

                            <div class="mt-4 grid grid-cols-3 gap-6 text-sm">
                                <div>
                                    <p class="text-gray-500 font-body">HARGA</p>
                                    <p class="font-semibold">Rp{{ number_format($c['price'],0,',','.') }}</p>
                                </div>

                                <div>
                                    <p class="text-gray-500 font-body">KUANTITAS</p>

                                    <div class="mt-2 flex items-center gap-3">
                                        {{-- minus --}}
                                        <form method="POST" action="{{ route('cart.decrease') }}">
                                            @csrf
                                            <input type="hidden" name="menu_id" value="{{ $c['id'] }}">
                                            <button type="submit" class="w-9 h-9 rounded-full border flex items-center justify-center">
                                                -
                                            </button>
                                        </form>

                                        <span class="font-semibold">{{ $c['qty'] }}</span>

                                        {{-- plus --}}
                                        <form method="POST" action="{{ route('cart.increase') }}">
                                            @csrf
                                            <input type="hidden" name="menu_id" value="{{ $c['id'] }}">
                                            <button type="submit" class="w-9 h-9 rounded-full border flex items-center justify-center">
                                                +
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div>
                                    <p class="text-gray-500 font-body">TOTAL</p>
                                    <p class="font-semibold">
                                        Rp{{ number_format($c['price'] * $c['qty'],0,',','.') }}
                                    </p>
                                </div>
                            </div>

                            {{-- note --}}
                            <div class="mt-6">
                                <p class="text-sm font-body text-gray-600 font-semibold">Note</p>

                                <form method="POST" action="{{ route('cart.note') }}" class="mt-2">
                                    @csrf
                                    <input type="hidden" name="menu_id" value="{{ $c['id'] }}">

                                    <textarea name="note" rows="3"
                                        class="w-full border rounded-xl px-4 py-3"
                                        placeholder="Tambahkan Catatan">{{ $c['note'] ?? '' }}</textarea>

                                    <div class="mt-2 flex items-center justify-between">
                                        <button type="submit" class="text-sm text-gray-500 underline">
                                            Simpan catatan
                                        </button>

                                        {{-- remove --}}
                                        <form method="POST" action="{{ route('cart.remove') }}">
                                            @csrf
                                            <input type="hidden" name="menu_id" value="{{ $c['id'] }}">
                                            <button type="submit" class="w-10 h-10 rounded-xl border flex items-center justify-center">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif

            <div class="text-right font-heading font-bold text-xl">
                Total Item: <span class="text-brand">Rp{{ number_format($subtotal,0,',','.') }}</span>
            </div>
        </div>

        {{-- RIGHT: SUMMARY --}}
<div class="bg-white border rounded-2xl p-8 h-fit">
    <h2 class="text-2xl font-heading font-bold text-brand">Ringkasan Pembayaran</h2>

    <form method="POST" action="{{ route('checkout.pay') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm font-body text-gray-600 font-semibold">Nama Pelanggan:</label>
            <input
                name="customer_name"
                value="{{ old('customer_name') }}"
                class="w-full border rounded-xl px-4 py-3 mt-2"
                required
            >
        </div>

        <div>
            <label class="text-sm font-body text-gray-600 font-semibold">Meja:</label>
            <input
                name="table_number"
                value="{{ old('table_number') }}"
                class="w-full border rounded-xl px-4 py-3 mt-2"
                placeholder="contoh: 5"
            >
        </div>

        {{-- ✅ Tanggal otomatis realtime --}}
        <div>
            <label class="text-sm font-body text-gray-600 font-semibold">Tanggal:</label>
            <input
                type="date"
                name="order_date"
                value="{{ now()->format('Y-m-d') }}"
                class="w-full border rounded-xl px-4 py-3 mt-2"
                readonly
            >
            <p class="text-xs text-gray-400 mt-1">Tanggal otomatis mengikuti hari ini.</p>
        </div>

        {{-- ✅ Pilihan Dine In / Take Out (BISA DI KLIK) --}}
        <div>
            <label class="text-sm font-body text-gray-600 font-semibold">Tipe Pesanan:</label>
            <select
                name="order_type"
                class="w-full border rounded-xl px-4 py-3 mt-2"
                required
            >
                <option value="DINE_IN" {{ old('order_type') == 'DINE_IN' ? 'selected' : '' }}>Dine In</option>
                <option value="TAKE_OUT" {{ old('order_type') == 'TAKE_OUT' ? 'selected' : '' }}>Take Out</option>
            </select>
        </div>

        <div class="pt-4 border-t space-y-2 text-sm">
            <div class="flex justify-between">
                <span>Subtotal</span>
                <span>Rp{{ number_format($subtotal,0,',','.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Pajak (10%)</span>
                <span>Rp{{ number_format($tax,0,',','.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Biaya Layanan (5%)</span>
                <span>Rp{{ number_format($service,0,',','.') }}</span>
            </div>

            <div class="flex justify-between font-semibold pt-3 border-t">
                <span>Total Pembayaran</span>
                <span>Rp{{ number_format($total,0,',','.') }}</span>
            </div>
        </div>

        <div class="pt-4">
            <label class="text-sm font-body text-gray-600 font-semibold">Metode Pembayaran:</label>
            <select
                name="payment_method"
                class="w-full bg-brand text-white rounded-xl px-4 py-3 font-semibold mt-2"
                required
            >
                <option value="QRIS">QRIS</option>
                <option value="CASH">CASH</option>
                <option value="TRANSFER">TRANSFER</option>
            </select>
        </div>

        <button
            type="submit"
            class="w-full mt-2 bg-brand text-white py-3 rounded-xl font-semibold hover:opacity-90"
        >
            Bayar Sekarang
        </button>
    </form>
</div>


    </div>

</section>
<x-footer />
@endsection

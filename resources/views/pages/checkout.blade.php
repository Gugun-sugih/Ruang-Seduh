@extends('layouts.app')

@section('title', 'Checkout - RuangSeduh')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-14">

    <h1 class="text-5xl font-heading font-bold text-brand text-center">Keranjang</h1>
    <p class="text-gray-500 text-center mt-2 font-body">
        Periksa kembali pesananmu sebelum melanjutkan.
    </p>

    @php
        $subtotal = 0;
    @endphp

    <div class="mt-10 flex flex-col lg:flex-row gap-10 items-start">

        {{-- ✅ LEFT --}}
        <div class="w-full lg:w-2/3 space-y-6">

            @forelse($cart as $item)
                @php
                    $total = $item['price'] * $item['qty'];
                    $subtotal += $total;
                @endphp

                <div class="flex gap-6 items-start border-b pb-6">

                    {{-- gambar --}}
                    <img src="{{ $item['image'] }}"
                         class="w-44 h-28 rounded-xl object-cover border"
                         alt="{{ $item['name'] }}">

                    {{-- content --}}
                    <div class="flex-1">
                        <h3 class="text-2xl font-heading font-bold text-[#5A3B2E]">
                            {{ $item['name'] }}
                        </h3>

                        <div class="grid grid-cols-3 mt-2 text-sm font-body text-gray-500">
                            <div>
                                <p>Harga</p>
                                <p class="text-base text-gray-800 font-semibold">
                                    Rp{{ number_format($item['price'],0,',','.') }}
                                </p>
                            </div>

                            {{-- qty --}}
                            <div>
                                <p>Kuantitas</p>
                                <div class="flex items-center gap-3 mt-1">

                                    <form action="{{ route('cart.decrease') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $item['name'] }}">
                                        <button class="px-2 text-lg font-bold">-</button>
                                    </form>

                                    <span class="font-bold text-gray-800">{{ $item['qty'] }}</span>

                                    <form action="{{ route('cart.increase') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $item['name'] }}">
                                        <button class="px-2 text-lg font-bold">+</button>
                                    </form>

                                </div>
                            </div>

                            {{-- total --}}
                            <div class="text-right">
                                <p>Total</p>
                                <p class="text-base text-gray-800 font-semibold">
                                    Rp{{ number_format($total,0,',','.') }}
                                </p>
                            </div>
                        </div>

                        {{-- note --}}
                        <div class="mt-4">
                            <p class="text-brand font-semibold text-sm">Note</p>
                            <input type="text" placeholder="Tambahkan Catatan"
                                class="w-full mt-2 border rounded-lg px-4 py-3 text-sm focus:ring-brand focus:border-brand">
                        </div>
                    </div>

                    {{-- trash --}}
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $item['name'] }}">
                        <button class="mt-20 text-red-600 hover:scale-110 transition">
                            🗑️
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-center text-gray-500 font-body mt-10">
                    Keranjang masih kosong.
                </p>
            @endforelse

            <div class="text-right font-body font-semibold text-lg mt-4">
                Total Item: <span class="text-brand">Rp{{ number_format($subtotal,0,',','.') }}</span>
            </div>
        </div>

        {{-- ✅ RIGHT --}}
        @php
            $tax = $subtotal * 0.10;
            $service = $subtotal * 0.05;
            $grandTotal = $subtotal + $tax + $service;
        @endphp

        <div class="w-full lg:w-1/3 space-y-4 sticky top-24">

            <form action="{{ route('checkout.pay') }}" method="POST">
                @csrf

                <div class="border rounded-2xl p-7 shadow-sm bg-white">
                    <h2 class="text-2xl font-heading font-bold text-brand text-center">
                        Ringkasan Pembayaran
                    </h2>

                    <div class="mt-6 space-y-3 text-sm font-body">

                        <input name="customer_name" required placeholder="Nama Pelanggan"
                            class="w-full border rounded-lg px-4 py-2 text-sm">

                        <input name="table_number" placeholder="Meja (opsional)"
                            class="w-full border rounded-lg px-4 py-2 text-sm">

                        <select name="payment_method" required
                            class="w-full rounded-xl py-3 px-4 text-sm font-body text-center bg-brand text-white">
                            <option value="">Metode Pembayaran</option>
                            <option value="Cash">Cash</option>
                            <option value="QRIS">QRIS</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                    </div>

                    <hr class="my-6">

                    <div class="space-y-3 text-sm font-body">
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

                        <div class="flex justify-between font-bold text-base mt-3">
                            <span>Total Pembayaran</span>
                            <span>Rp{{ number_format($grandTotal,0,',','.') }}</span>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full border rounded-2xl py-3 font-body font-semibold text-brand hover:bg-brand hover:text-white transition mt-4">
                    Bayar
                </button>
            </form>

        </div>
    </div>
</section>
@endsection
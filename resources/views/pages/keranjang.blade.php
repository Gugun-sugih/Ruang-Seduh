@extends('layouts.app')
@section('title', 'Keranjang - RuangSeduh')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-5xl font-heading font-bold text-brand text-center">Keranjang</h1>
    <p class="mt-3 text-center text-gray-500 font-body">Periksa kembali pesananmu sebelum melanjutkan.</p>

    <div class="mt-12 grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">

        {{-- LEFT: ITEMS --}}
        <div class="lg:col-span-2">
            <div class="border-t border-gray-300 pt-8 space-y-10">

                {{-- ✅ FIX: HITUNG TOTAL DI SINI BIAR TIDAK UNDEFINED --}}
                @php
                    $subtotal = 0;

                    foreach($cart as $item){
                        $subtotal += $item['price'] * $item['qty'];
                    }

                    $tax = $subtotal * 0.10;
                    $service = $subtotal * 0.05;
                    $total = $subtotal + $tax + $service;
                @endphp

                @if(count($cart) === 0)
                    <p class="text-gray-500 font-body">Keranjang masih kosong. Kembali ke halaman pesan dan klik tombol +.</p>
                @else
                    @foreach($cart as $c)
                        <div class="border-b border-gray-200 pb-10">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">

                                {{-- image --}}
                                <div class="md:col-span-1">
                                    <img src="{{ $c['image'] }}" alt="{{ $c['name'] }}"
                                        class="w-full h-44 object-cover rounded-2xl border border-gray-200">
                                </div>

                                {{-- middle --}}
                                <div class="md:col-span-2">
                                    <div class="flex items-start justify-between gap-6">
                                        <h3 class="text-2xl font-heading font-bold text-[#5B3A2E]">{{ $c['name'] }}</h3>

                                        <div class="grid grid-cols-3 gap-10 text-sm text-gray-500 font-body">
                                            <div>
                                                <p class="uppercase text-xs tracking-wide">Harga</p>
                                                <p class="mt-1 text-gray-700">
                                                    Rp{{ number_format($c['price'],0,',','.') }}
                                                </p>
                                            </div>

                                            <div>
                                                <p class="uppercase text-xs tracking-wide">Kuantitas</p>
                                                <div class="mt-2 flex items-center gap-3">
                                                    <form method="POST" action="{{ route('cart.decrease') }}">
                                                        @csrf
                                                        <input type="hidden" name="name" value="{{ $c['name'] }}">
                                                        <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center">–</button>
                                                    </form>

                                                    <span class="text-gray-700 font-semibold">{{ $c['qty'] }}</span>

                                                    <form method="POST" action="{{ route('cart.increase') }}">
                                                        @csrf
                                                        <input type="hidden" name="name" value="{{ $c['name'] }}">
                                                        <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center">+</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <div>
                                                <p class="uppercase text-xs tracking-wide">Total</p>
                                                <p class="mt-1 text-gray-700 font-semibold">
                                                    Rp{{ number_format($c['price'] * $c['qty'],0,',','.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- note + trash --}}
                                    <div class="mt-6 flex items-end gap-4">
                                        <div class="flex-1">
                                            <p class="text-brand font-semibold text-sm mb-2">Note</p>

                                            <form method="POST" action="{{ route('cart.note') }}">
                                                @csrf
                                                <input type="hidden" name="name" value="{{ $c['name'] }}">
                                                <textarea name="note"
                                                    class="w-full min-h-[80px] border border-gray-300 rounded-xl p-3 font-body text-sm"
                                                    placeholder="Tambahkan Catatan"
                                                >{{ $c['note'] ?? '' }}</textarea>

                                                <div class="mt-2 text-right">
                                                    <button class="text-xs text-gray-500 underline">Simpan catatan</button>
                                                </div>
                                            </form>
                                        </div>

                                        <form method="POST" action="{{ route('cart.clear') }}">
                                            @csrf
                                            <input type="hidden" name="name" value="{{ $c['name'] }}">
                                            <button title="Hapus" class="w-12 h-12 flex items-center justify-center rounded-xl border border-gray-200">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="text-right font-heading font-bold text-lg">
                        Total Item: <span class="text-[#5B3A2E]">Rp{{ number_format($subtotal,0,',','.') }}</span>
                    </div>
                @endif

            </div>
        </div>

        {{-- RIGHT: SUMMARY --}}
        <div class="lg:col-span-1">
            <div class="border border-gray-300 rounded-2xl p-6">
                <h3 class="text-xl font-heading font-bold text-brand text-center">Ringkasan Pembayaran</h3>

                <form class="mt-6 space-y-3 font-body text-sm" method="POST" action="{{ route('checkout.pay') }}">
                    @csrf

                    <div class="grid grid-cols-3 gap-2 items-center">
                        <p class="col-span-1">Nama Pelanggan:</p>
                        <input name="customer_name" class="col-span-2 border border-gray-300 rounded-lg px-3 py-2" />
                    </div>

                    <div class="grid grid-cols-3 gap-2 items-center">
                        <p class="col-span-1">Meja:</p>
                        <input name="table_no" class="col-span-2 border border-gray-300 rounded-lg px-3 py-2" />
                    </div>

                    <div class="grid grid-cols-3 gap-2 items-center">
                        <p class="col-span-1">Tanggal:</p>
                        <input type="date" name="date" class="col-span-2 border border-gray-300 rounded-lg px-3 py-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-2 items-center pt-2">
                        <div></div>
                        <select name="order_type" class="border border-gray-300 rounded-lg px-3 py-2">
                            <option value="dine-in">Dine In</option>
                            <option value="take-away">Take Away</option>
                        </select>
                    </div>

                    <hr class="my-4">

                    <div class="flex justify-between">
                        <p>Subtotal</p>
                        <p>Rp{{ number_format($subtotal,0,',','.') }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Pajak (10%)</p>
                        <p>Rp{{ number_format($tax,0,',','.') }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Biaya Layanan (5%)</p>
                        <p>Rp{{ number_format($service,0,',','.') }}</p>
                    </div>

                    <div class="flex justify-between font-semibold pt-2">
                        <p>Total Pembayaran</p>
                        <p>Rp{{ number_format($total,0,',','.') }}</p>
                    </div>

                    <hr class="my-4">

                    <select name="payment_method"
                        class="w-full bg-brand text-white font-semibold rounded-xl px-4 py-3">
                        <option class="text-black" value="qris">Metode Pembayaran - QRIS</option>
                        <option class="text-black" value="cash">Metode Pembayaran - Cash</option>
                        <option class="text-black" value="card">Metode Pembayaran - Card</option>
                    </select>

                    <button type="submit"
                        class="mt-6 w-full border border-gray-300 rounded-full py-3 font-semibold text-brand">
                        Bayar
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

<x-footer />
@endsection

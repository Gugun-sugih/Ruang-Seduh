@extends('layouts.app')
@section('title', 'Pembayaran - RuangSeduh')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-4xl font-heading font-bold text-brand text-center">
        Pembayaran
    </h1>

    @php
        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);
    @endphp

    @if(count($cart) == 0)
        <p class="text-center mt-10 text-gray-500">Keranjang kosong, silakan pilih menu dulu.</p>
        <div class="text-center mt-6">
            <a href="/pesan" class="underline text-brand">Kembali ke Pesan</a>
        </div>
    @else
        <div class="mt-12 bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
            <h2 class="font-heading font-bold text-lg text-brand mb-6">Ringkasan Pesanan</h2>

            <div class="space-y-4">
                @foreach($cart as $c)
                    <div class="flex justify-between">
                        <p class="text-sm">{{ $c['name'] }} x{{ $c['qty'] }}</p>
                        <p class="text-sm font-semibold">
                            Rp{{ number_format($c['price'] * $c['qty'],0,',','.') }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 border-t pt-4 flex justify-between">
                <p class="font-semibold text-brand">Total</p>
                <p class="font-bold text-brand">Rp{{ number_format($total,0,',','.') }}</p>
            </div>

            <button class="mt-8 w-full bg-brand text-white py-3 rounded-full font-semibold">
                Bayar Sekarang
            </button>
        </div>
    @endif
</section>

<x-footer />
@endsection

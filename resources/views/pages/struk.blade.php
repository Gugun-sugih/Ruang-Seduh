@extends('layouts.app')

@section('title', 'Struk - RuangSeduh')

@section('content')
<section class="max-w-3xl mx-auto px-6 py-14">

    <h1 class="text-4xl font-heading font-bold text-brand text-center">Struk Pembayaran</h1>
    <p class="text-gray-500 text-center mt-2 font-body">Terima kasih telah memesan di RuangSeduh</p>

    <div class="mt-10 border rounded-2xl p-8 shadow-sm bg-white">

        <div class="text-sm font-body space-y-2">
            <p><b>Nama:</b> {{ $order['customer_name'] }}</p>
            <p><b>Meja:</b> {{ $order['table_number'] ?? '-' }}</p>
            <p><b>Metode:</b> {{ $order['payment_method'] }}</p>
        </div>

        <hr class="my-6">

        <h3 class="font-heading font-bold text-lg mb-3">Detail Pesanan</h3>

        @foreach($order['cart'] as $item)
            <div class="flex justify-between text-sm font-body mb-2">
                <span>{{ $item['name'] }} (x{{ $item['qty'] }})</span>
                <span>Rp{{ number_format($item['price'] * $item['qty'],0,',','.') }}</span>
            </div>
        @endforeach

        <hr class="my-6">

        <div class="space-y-2 text-sm font-body">
            <div class="flex justify-between">
                <span>Subtotal</span>
                <span>Rp{{ number_format($order['subtotal'],0,',','.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Pajak</span>
                <span>Rp{{ number_format($order['tax'],0,',','.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Service</span>
                <span>Rp{{ number_format($order['service'],0,',','.') }}</span>
            </div>

            <div class="flex justify-between font-bold text-lg mt-4">
                <span>Total</span>
                <span class="text-brand">Rp{{ number_format($order['total'],0,',','.') }}</span>
            </div>
        </div>

        <a href="/pesan"
            class="block mt-8 w-full text-center bg-brand text-white py-3 rounded-xl font-body font-semibold">
            Pesan Lagi
        </a>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('title', 'Detail Pesanan - Admin')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-14">

    <a href="{{ route('admin.orders.index') }}" class="text-brand font-body hover:underline">
        ← Kembali
    </a>

    <h1 class="text-4xl font-heading font-bold text-brand mt-4">
        Detail Pesanan #{{ $order->id }}
    </h1>

    <p class="text-gray-500 font-body mt-2">
        Nama: <b>{{ $order->customer_name }}</b> | Meja: <b>{{ $order->table_number ?? '-' }}</b>
    </p>

    {{-- update status --}}
    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="mt-6 flex gap-4 items-center">
        @csrf
        @method('PUT')

        <select name="status" class="border rounded-xl px-4 py-2 font-body">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
            <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Done</option>
        </select>

        <button class="bg-brand text-white px-6 py-2 rounded-xl font-body font-semibold hover:opacity-90">
            Update
        </button>
    </form>

    <div class="mt-10 border rounded-2xl bg-white shadow-sm overflow-hidden">
        <table class="w-full text-sm font-body">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-4 text-left">Menu</th>
                    <th class="p-4 text-left">Harga</th>
                    <th class="p-4 text-left">Qty</th>
                    <th class="p-4 text-left">Total</th>
                    <th class="p-4 text-left">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr class="border-t">
                        <td class="p-4 font-semibold text-[#5A3B2E]">{{ $item->name }}</td>
                        <td class="p-4">Rp{{ number_format($item->price,0,',','.') }}</td>
                        <td class="p-4">{{ $item->qty }}</td>
                        <td class="p-4 font-semibold text-brand">
                            Rp{{ number_format($item->total,0,',','.') }}
                        </td>
                        <td class="p-4 text-gray-500">{{ $item->note ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>
@endsection

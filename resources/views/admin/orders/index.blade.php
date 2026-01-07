@extends('layouts.admin')

@section('title', 'Kelola Pesanan - Admin')

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
                    class="block px-4 py-3 rounded-xl hover:bg-gray-100 text-gray-700 font-body">
                    Dashboard
                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="block px-4 py-3 rounded-xl bg-brand text-white font-semibold">
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
                Kelola Pesanan
            </h1>
            <p class="text-gray-500 font-body mt-2">
                Semua pesanan customer akan tampil di sini.
            </p>

            <div class="mt-10 bg-white rounded-2xl p-6 shadow-sm border overflow-x-auto">
                <table class="w-full text-sm font-body">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="p-4 text-left">ID</th>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-left">Meja</th>
                            <th class="p-4 text-left">Tanggal</th>
                            <th class="p-4 text-left">Total</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr class="border-t">
                            <td class="p-4 font-semibold">#{{ $order->id }}</td>
                            <td class="p-4">{{ $order->customer_name }}</td>
                            <td class="p-4">{{ $order->table_number ?? '-' }}</td>
                            <td class="p-4">{{ $order->order_date }}</td>
                            <td class="p-4 font-semibold text-brand">
                                Rp{{ number_format($order->total,0,',','.') }}
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                    {{ strtoupper($order->status) }}
                                </span>
                            </td>

                            <td class="p-4 flex justify-center gap-4 items-center">
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                   class="text-brand font-semibold hover:underline">
                                    Detail
                                </a>

                                @if($order->status == 'pending')
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button
                                        class="bg-brand text-white px-5 py-2 rounded-xl font-semibold hover:opacity-90">
                                        Konfirmasi
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                @if(count($orders) == 0)
                    <p class="text-center py-10 text-gray-500">Belum ada pesanan.</p>
                @endif
            </div>

        </main>
    </div>
</section>
@endsection

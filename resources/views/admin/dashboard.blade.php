@extends('layouts.admin')

@section('title', 'Dashboard Admin - RuangSeduh')

@section('content')
    <h1 class="text-4xl font-heading font-bold text-brand">Dashboard Admin</h1>
    <p class="text-gray-500 font-body mt-2">Selamat datang di panel admin RuangSeduh</p>

    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-sm border">
            <h2 class="text-sm text-gray-500 font-body">Total Pesanan</h2>
            <p class="text-3xl font-heading font-bold text-brand mt-2">{{ $totalOrders ?? 0 }}</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border">
            <h2 class="text-sm text-gray-500 font-body">Total Pendapatan (PAID)</h2>
            <p class="text-3xl font-heading font-bold text-brand mt-2">
                Rp{{ number_format($totalRevenue ?? 0, 0, ',', '.') }}
            </p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border">
            <h2 class="text-sm text-gray-500 font-body">Menu Aktif</h2>
            <p class="text-3xl font-heading font-bold text-brand mt-2">{{ $totalMenus ?? 0 }}</p>
        </div>
    </div>

    <div class="mt-10 bg-white rounded-2xl p-8 shadow-sm border">
        <h2 class="text-xl font-heading font-bold text-brand">Aktivitas Terbaru</h2>

        <ul class="mt-6 space-y-2 font-body text-sm text-gray-700 list-disc ml-5">
            @forelse(($activities ?? []) as $act)
                <li>{{ $act }}</li>
            @empty
                <li class="text-gray-500">Belum ada aktivitas.</li>
            @endforelse
        </ul>
    </div>
@endsection

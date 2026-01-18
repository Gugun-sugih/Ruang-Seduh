@extends('layouts.admin')

@section('title', 'Detail Pesan - Admin')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-heading font-bold text-brand">Detail Pesan</h1>
            <p class="text-gray-500 font-body mt-2">Lihat isi pesan dari pelanggan.</p>
        </div>

        <a href="{{ route('admin.messages.index') }}"
           class="px-6 py-3 rounded-xl border font-semibold text-gray-700 hover:bg-gray-50">
            Kembali
        </a>
    </div>

    <div class="mt-10 bg-white rounded-2xl p-8 shadow-sm border max-w-3xl">
        <div class="space-y-5 font-body">
            <div>
                <p class="text-sm text-gray-500">Nama</p>
                <p class="font-semibold text-gray-900">{{ $message->name }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-semibold text-gray-900">{{ $message->email }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Nomor Telepon</p>
                <p class="font-semibold text-gray-900">{{ $message->phone }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Tanggal</p>
                <p class="font-semibold text-gray-900">{{ $message->created_at->format('Y-m-d H:i') }}</p>
            </div>

            <div class="pt-4 border-t">
                <p class="text-sm text-gray-500">Pesan</p>
                <div class="mt-2 p-4 rounded-xl bg-gray-50 border text-gray-800 whitespace-pre-line">
                    {{ $message->message }}
                </div>
            </div>
        </div>
    </div>
@endsection

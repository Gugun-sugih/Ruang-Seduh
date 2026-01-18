@extends('layouts.admin')

@section('title', 'Pesan Pelanggan - Admin')

@section('content')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-heading font-bold text-brand">Pesan Pelanggan</h1>
            <p class="text-gray-500 font-body mt-2">Semua pesan dari pelanggan akan tampil di sini.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mt-6 bg-green-100 text-green-700 px-5 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-10 bg-white rounded-2xl p-6 shadow-sm border overflow-x-auto">
        <table class="w-full text-sm font-body">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">No Telp</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($messages as $msg)
                    <tr class="border-t">
                        <td class="p-4 font-semibold">#{{ $msg->id }}</td>
                        <td class="p-4">{{ $msg->name }}</td>
                        <td class="p-4">{{ $msg->email }}</td>
                        <td class="p-4">{{ $msg->phone }}</td>
                        <td class="p-4">{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('admin.messages.show', $msg->id) }}"
                               class="text-brand font-semibold hover:underline">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="border-t">
                        <td colspan="6" class="p-8 text-center text-gray-500">
                            Belum ada pesan dari pelanggan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

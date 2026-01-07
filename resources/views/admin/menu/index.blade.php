@extends('layouts.app')
@section('title', 'Kelola Menu - Admin')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-14">

    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-heading font-bold text-brand">Kelola Menu</h1>

        <a href="{{ route('admin.menu.create') }}"
           class="bg-brand text-white px-6 py-3 rounded-xl font-body font-semibold hover:opacity-90">
           + Tambah Menu
        </a>
    </div>

    @if(session('success'))
        <div class="mt-6 bg-green-100 text-green-700 px-5 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-10 overflow-x-auto">
        <table class="w-full text-sm border border-gray-200 rounded-xl overflow-hidden">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Kategori</th>
                    <th class="p-4 text-left">Harga</th>
                    <th class="p-4 text-left">Gambar</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($menus as $menu)
                <tr class="border-t">
                    <td class="p-4 font-semibold">{{ $menu->name }}</td>
                    <td class="p-4">{{ $menu->category }}</td>
                    <td class="p-4">Rp{{ number_format($menu->price,0,',','.') }}</td>
                    <td class="p-4">
                        <img src="{{ asset('images/'.$menu->image) }}" class="w-16 h-16 rounded-lg object-cover">
                    </td>
                    <td class="p-4 flex justify-center gap-3">
                        <a href="{{ route('admin.menu.edit', $menu->id) }}"
                           class="px-4 py-2 rounded-lg bg-yellow-400 text-white font-semibold">
                           Edit
                        </a>

                        <form action="{{ route('admin.menu.destroy', $menu->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus menu?')"
                                class="px-4 py-2 rounded-lg bg-red-500 text-white font-semibold">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</section>
@endsection

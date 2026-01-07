@extends('layouts.app')
@section('title', 'Tambah Menu - Admin')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-14">

    <h1 class="text-4xl font-heading font-bold text-brand">Tambah Menu</h1>

    <form action="{{ route('admin.menu.store') }}" method="POST" class="mt-10 space-y-6">
        @csrf

        <div>
            <label class="font-semibold">Nama</label>
            <input name="name" class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Harga</label>
            <input name="price" type="number" class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Deskripsi</label>
            <textarea name="desc" class="w-full border rounded-xl px-4 py-3 mt-2" rows="4" required></textarea>
        </div>

        <div>
            <label class="font-semibold">Kategori</label>
            <select name="category" class="w-full border rounded-xl px-4 py-3 mt-2" required>
                <option value="kopi-panas">Kopi Panas</option>
                <option value="kopi-dingin">Kopi Dingin</option>
                <option value="non-kopi">Non Kopi</option>
                <option value="dessert">Dessert</option>
            </select>
        </div>

        <div>
            <label class="font-semibold">Nama File Gambar</label>
            <input name="image" class="w-full border rounded-xl px-4 py-3 mt-2"
                   placeholder="contoh: espresso.png" required>
            <p class="text-xs text-gray-500 mt-1">Letakkan gambar di folder <b>public/images</b></p>
        </div>

        <button class="bg-brand text-white px-8 py-3 rounded-xl font-semibold">
            Simpan Menu
        </button>
    </form>

</section>
@endsection

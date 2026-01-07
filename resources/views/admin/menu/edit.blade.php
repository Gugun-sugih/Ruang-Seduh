@extends('layouts.app')
@section('title', 'Edit Menu - Admin')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-14">

    <h1 class="text-4xl font-heading font-bold text-brand">Edit Menu</h1>

    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" class="mt-10 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="font-semibold">Nama</label>
            <input name="name" value="{{ $menu->name }}" class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Harga</label>
            <input name="price" type="number" value="{{ $menu->price }}" class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Deskripsi</label>
            <textarea name="desc" class="w-full border rounded-xl px-4 py-3 mt-2" rows="4" required>{{ $menu->desc }}</textarea>
        </div>

        <div>
            <label class="font-semibold">Kategori</label>
            <select name="category" class="w-full border rounded-xl px-4 py-3 mt-2" required>
                <option value="kopi-panas" {{ $menu->category == 'kopi-panas' ? 'selected' : '' }}>Kopi Panas</option>
                <option value="kopi-dingin" {{ $menu->category == 'kopi-dingin' ? 'selected' : '' }}>Kopi Dingin</option>
                <option value="non-kopi" {{ $menu->category == 'non-kopi' ? 'selected' : '' }}>Non Kopi</option>
                <option value="dessert" {{ $menu->category == 'dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <div>
            <label class="font-semibold">Nama File Gambar</label>
            <input name="image" value="{{ $menu->image }}" class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <button class="bg-brand text-white px-8 py-3 rounded-xl font-semibold">
            Update Menu
        </button>
    </form>

</section>
@endsection

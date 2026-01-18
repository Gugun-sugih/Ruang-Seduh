@extends('layouts.admin')
@section('title', 'Edit Menu - Admin')

@section('content')

<h1 class="text-4xl font-heading font-bold text-brand">Edit Menu</h1>
<p class="text-gray-500 font-body mt-2">Perbarui data menu di bawah ini.</p>

@if($errors->any())
    <div class="mt-6 bg-red-100 text-red-700 px-5 py-3 rounded-xl">
        <ul class="list-disc ml-5">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-10 bg-white rounded-2xl p-8 shadow-sm border max-w-3xl">
    <form action="{{ route('admin.menu.update', $menu->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="font-semibold">Nama</label>
            <input name="name" value="{{ old('name', $menu->name) }}"
                   class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Harga</label>
            <input name="price" type="number" value="{{ old('price', $menu->price) }}"
                   class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Deskripsi</label>
            <textarea name="desc" class="w-full border rounded-xl px-4 py-3 mt-2" rows="4" required>{{ old('desc', $menu->desc) }}</textarea>
        </div>

        <div>
            <label class="font-semibold">Kategori</label>
            <select name="category" class="w-full border rounded-xl px-4 py-3 mt-2" required>
                @php $cat = old('category', $menu->category); @endphp
                <option value="kopi-panas"  {{ $cat=='kopi-panas' ? 'selected' : '' }}>Kopi Panas</option>
                <option value="kopi-dingin" {{ $cat=='kopi-dingin' ? 'selected' : '' }}>Kopi Dingin</option>
                <option value="non-kopi"    {{ $cat=='non-kopi' ? 'selected' : '' }}>Non Kopi</option>
                <option value="dessert"     {{ $cat=='dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <div>
            <label class="font-semibold">Gambar (opsional)</label>

            @if($menu->image)
                <div class="mt-3">
                    <p class="text-sm text-gray-500 mb-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/'.$menu->image) }}"
                         class="w-28 h-28 rounded-xl object-cover border">
                </div>
            @endif

            <input type="file" name="image"
                   class="w-full border rounded-xl px-4 py-3 mt-2"
                   accept=".jpg,.jpeg,.png,.webp">
            <p class="text-xs text-gray-500 mt-1">Kalau tidak upload gambar baru, gambar lama tetap dipakai.</p>
        </div>

        <div class="flex gap-3">
            <button class="bg-brand text-white px-8 py-3 rounded-xl font-semibold">
                Simpan Perubahan
            </button>

            <a href="{{ route('admin.menu.index') }}"
               class="px-8 py-3 rounded-xl border font-semibold text-gray-700 hover:bg-gray-50">
                Batal
            </a>
        </div>

    </form>
</div>

@endsection

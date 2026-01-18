@extends('layouts.admin')
@section('title', 'Tambah Menu - Admin')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-14">

    <h1 class="text-4xl font-heading font-bold text-brand">Tambah Menu</h1>

    @if ($errors->any())
        <div class="mt-6 p-4 rounded-xl border border-red-200 bg-red-50 text-red-700">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 space-y-6">
        @csrf

        <div>
            <label class="font-semibold">Nama</label>
            <input name="name" value="{{ old('name') }}"
                   class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Harga</label>
            <input name="price" type="number" value="{{ old('price') }}"
                   class="w-full border rounded-xl px-4 py-3 mt-2" required>
        </div>

        <div>
            <label class="font-semibold">Deskripsi</label>
            <textarea name="desc" rows="4"
                      class="w-full border rounded-xl px-4 py-3 mt-2" required>{{ old('desc') }}</textarea>
        </div>

        <div>
            <label class="font-semibold">Kategori</label>
            <select name="category" class="w-full border rounded-xl px-4 py-3 mt-2" required>
                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih kategori</option>
                <option value="kopi-panas"  {{ old('category') == 'kopi-panas' ? 'selected' : '' }}>Kopi Panas</option>
                <option value="kopi-dingin" {{ old('category') == 'kopi-dingin' ? 'selected' : '' }}>Kopi Dingin</option>
                <option value="non-kopi"    {{ old('category') == 'non-kopi' ? 'selected' : '' }}>Non Kopi</option>
                <option value="dessert"     {{ old('category') == 'dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
        </div>

        <div>
            <label class="font-semibold">Gambar</label>
            <input type="file" name="image"
                   class="w-full border rounded-xl px-4 py-3 mt-2"
                   accept=".jpg,.jpeg,.png,.webp" required>
            <p class="text-xs text-gray-500 mt-1">Format: jpg/jpeg/png/webp (max 2MB)</p>
        </div>

        <button class="bg-brand text-white px-8 py-3 rounded-xl font-semibold">
            Simpan Menu
        </button>
    </form>

</section>
@endsection

@props(['item'])

<div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">

    <div class="relative">
        <img
            src="{{ $item->image ? asset('storage/'.$item->image) : asset('images/no-image.png') }}"
            alt="{{ $item->name }}"
            class="w-full h-44 object-cover"
        >

        {{-- tombol + masuk keranjang --}}
        <form method="POST" action="{{ route('cart.add') }}" class="absolute top-3 right-3">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $item->id }}">
            <button
                type="submit"
                class="w-9 h-9 rounded-full bg-brand text-white flex items-center justify-center shadow hover:opacity-90">
                +
            </button>
        </form>
    </div>

    <div class="p-4">
        <div class="flex items-center justify-between">
            <h3 class="font-heading font-bold text-base text-coffee">
                {{ $item->name }}
            </h3>

            <p class="text-brand font-semibold text-sm">
                Rp{{ number_format($item->price, 0, ',', '.') }}
            </p>
        </div>

        <p class="text-xs text-gray-500 mt-2 leading-relaxed font-body">
            {{ $item->desc }}
        </p>
    </div>

</div>

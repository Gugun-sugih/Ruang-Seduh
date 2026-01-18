@props(['item'])

<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

    <div class="relative">
        <img
            src="{{ $item->image ? asset('storage/'.$item->image) : asset('images/no-image.png') }}"
            alt="{{ $item->name }}"
            class="w-full h-48 object-cover rounded-xl"
        >
    </div>

    <div class="px-4 pb-4 pt-3">
        <div class="flex items-center justify-between">
            <h3 class="font-heading font-bold text-lg text-gray-900">
                {{ $item->name }}
            </h3>

            <span class="text-brand font-bold text-sm">
                Rp{{ number_format($item->price, 0, ',', '.') }}
            </span>
        </div>

        <p class="text-sm text-gray-500 mt-2 leading-relaxed">
            {{ $item->desc }}
        </p>
    </div>

</div>

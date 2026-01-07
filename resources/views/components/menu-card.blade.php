@props(['item'])

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-3">
        <img
            src="{{ $item['image'] }}"
            alt="{{ $item['name'] }}"
            class="w-full h-48 object-cover rounded-xl"
        >
    </div>

    <div class="px-4 pb-4">
        <div class="flex items-center justify-between">
            <h3 class="font-heading font-bold text-lg text-gray-900">
                {{ $item['name'] }}
            </h3>
            <span class="text-brand font-bold text-sm">
                Rp{{ number_format($item['price'], 0, ',', '.') }}
            </span>
        </div>

        <p class="text-sm text-gray-500 mt-2 leading-relaxed">
            {{ $item['desc'] }}
        </p>

        <div class="flex flex-wrap gap-2 mt-4">
            @foreach($item['tags'] as $tag)
                <span class="px-3 py-1 text-xs rounded-full bg-coffee text-white font-medium">
                    {{ $tag }}
                </span>
            @endforeach
        </div>
    </div>
</div>

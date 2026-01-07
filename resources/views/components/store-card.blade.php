@props(['store'])

<div class="w-full border border-brand/30 rounded-2xl px-6 py-5 bg-white shadow-sm flex gap-6 items-start">
    
    <!-- image -->
    <img src="{{ $store['image'] }}" alt="{{ $store['name'] }}"
        class="w-32 h-28 rounded-xl object-cover flex-shrink-0">

    <!-- content -->
    <div class="flex-1">
        <h3 class="font-heading font-bold text-lg text-coffee">
            {{ $store['name'] }}
        </h3>

        <div class="mt-3 flex items-start gap-3 text-gray-600">
            <span class="text-brand text-lg">📍</span>
            <p class="text-sm font-body leading-relaxed">
                {{ $store['address'] }}
            </p>
        </div>

        <a href="{{ $store['maps'] }}" target="_blank"
            class="mt-3 inline-block text-sm font-body text-brand underline">
            Dilihat di Google Maps
        </a>

        <div class="mt-3 flex items-center gap-3 text-gray-600">
            <span class="text-brand text-lg">🕒</span>
            <p class="text-sm font-body">
                {{ $store['time'] }}
            </p>
        </div>
    </div>

    <!-- arrow -->
    <div class="text-brand text-2xl mt-auto">
        →
    </div>
</div>

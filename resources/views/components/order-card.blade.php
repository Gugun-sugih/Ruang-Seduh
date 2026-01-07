@props(['item'])

<div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden relative">

    <!-- image -->
    <div class="relative">
        <img src="{{ $item['image'] }}"
            class="w-full h-40 object-cover"
            alt="{{ $item['name'] }}">

        <!-- plus button -->
       <form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input type="hidden" name="name" value="{{ $item['name'] }}">
    <input type="hidden" name="price" value="{{ $item['price'] }}">
    <input type="hidden" name="image" value="{{ $item['image'] }}">

    <button type="submit"
        class="absolute bottom-3 right-3 w-7 h-7 rounded-full bg-brand text-white flex items-center justify-center text-lg shadow-md">
        +
    </button>
</form>

    </div>

    <!-- content -->
    <div class="p-4">
        <div class="flex items-center justify-between">
            <h3 class="font-heading font-bold text-base text-coffee">
                {{ $item['name'] }}
            </h3>

            <p class="text-brand font-semibold text-sm">
                Rp{{ number_format($item['price'], 0, ',', '.') }}
            </p>
        </div>

        <p class="text-xs text-gray-500 mt-2 leading-relaxed font-body">
            {{ $item['desc'] }}
        </p>

        <div class="flex flex-wrap gap-2 mt-3">
            @foreach($item['tags'] as $tag)
                <span class="px-3 py-1 rounded-full bg-coffee text-white text-[11px] font-body">
                    {{ $tag }}
                </span>
            @endforeach
        </div>
    </div>
</div>

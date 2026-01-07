<section class="max-w-7xl mx-auto px-6 pb-10">
    <div class="flex flex-col items-center gap-6">

        <!-- Search FORM -->
        <form method="GET" action="/menu" class="w-full max-w-xl flex items-center border border-brand rounded-full px-4 py-2 bg-white shadow-sm">
            <span class="text-brand text-lg">🔍</span>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari di sini"
                class="w-full outline-none text-sm font-body placeholder-gray-400 px-3"
            />

            {{-- biar category tidak hilang ketika search --}}
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <button class="bg-brand text-white px-6 py-2 rounded-full text-sm font-semibold">
                Cari
            </button>
        </form>

        <!-- Categories -->
        @php
        $cats = [
            ["label" => "Kopi Panas", "slug" => "kopi-panas", "icon" => asset("images/kopi-panas.png")],
            ["label" => "Kopi Dingin", "slug" => "kopi-dingin", "icon" => asset("images/kopi-dingin.png")],
            ["label" => "Non Kopi", "slug" => "non-kopi", "icon" => asset("images/non-kopi.png")],
            ["label" => "Dessert", "slug" => "dessert", "icon" => asset("images/dessert.png")],
        ];
        @endphp

        <div class="flex flex-wrap justify-center gap-8">
            @foreach($cats as $cat)
            <a
                href="{{ url('/menu') }}?category={{ $cat['slug'] }}@if(request('search'))&search={{ request('search') }}@endif"
                class="flex flex-col items-center gap-2 group"
            >
                <div class="
                    w-16 h-16 rounded-xl shadow-sm border flex items-center justify-center
                    {{ request('category') == $cat['slug'] ? 'bg-brand border-brand' : 'bg-white border-gray-200' }}
                ">
                    <img src="{{ $cat['icon'] }}" class="w-10 h-10 object-contain {{ request('category') == $cat['slug'] ? 'brightness-0 invert' : '' }}" alt="{{ $cat['label'] }}">
                </div>

                <p class="text-sm font-body
                    {{ request('category') == $cat['slug'] ? 'text-brand font-semibold' : 'text-gray-600' }}
                ">
                    {{ $cat['label'] }}
                </p>
            </a>
            @endforeach
        </div>

        {{-- tombol reset filter --}}
        @if(request('category') || request('search'))
            <a href="/menu" class="text-sm font-body text-gray-500 underline mt-2">
                Reset Filter
            </a>
        @endif

    </div>
</section>

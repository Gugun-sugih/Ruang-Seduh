<section class="max-w-7xl mx-auto px-6 py-12">

    @if(count($menus) == 0)
        <div class="text-center text-gray-500 font-body py-20">
            <p class="text-lg font-semibold">Menu tidak ditemukan 😢</p>
            <p class="mt-2 text-sm">Coba kata kunci lain atau ubah kategori.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($menus as $item)
                <x-menu-card :item="$item" />
            @endforeach
        </div>
    @endif

</section>

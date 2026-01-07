@props(['small', 'title'])

<div class="text-brand">
    <p class="text-sm md:text-base font-body font-medium flex items-center gap-3">
        <span class="w-10 h-[2px] bg-brand opacity-60"></span>

        {{-- bikin kata terakhir bold seperti figma --}}
        @php
            $parts = explode(' ', $small);
            $last = array_pop($parts);
            $first = implode(' ', $parts);
        @endphp

        <span>{{ $first }}</span>
        <span class="font-semibold">{{ $last }}</span>
    </p>

    <h2 class="mt-3 text-4xl md:text-5xl font-heading font-bold leading-tight tracking-tight">
    {!! $title !!}
</h2>

</div>


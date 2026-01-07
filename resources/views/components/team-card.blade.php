@props(['name', 'role', 'image'])

<div class="flex flex-col items-center">
    <img src="{{ $image }}" class="w-28 h-28 rounded-full object-cover" alt="{{ $name }}">
    <div class="mt-4 bg-white border border-brand/30 rounded-xl px-6 py-3 text-center shadow-sm">
        <p class="font-semibold text-brand">{{ $name }}</p>
        <p class="text-sm text-gray-600">{{ $role }}</p>
    </div>
</div>

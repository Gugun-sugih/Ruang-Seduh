<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#f7faf9]">

    {{-- Navbar Admin --}}
    <nav class="w-full bg-white border-b">
        <div class="w-full px-10 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="/assets/logo.png" class="w-8 h-8" />
                <span class="font-bold text-brand text-xl">RuangSeduh</span>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="text-red-500 font-semibold">Logout</button>
            </form>
        </div>
    </nav>

    {{-- Admin Content --}}
    <div class="flex w-full min-h-screen">
        @yield('content')
    </div>

</body>
</html>

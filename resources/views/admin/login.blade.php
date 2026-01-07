@extends('layouts.app')

@section('title', 'Admin Login - RuangSeduh')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="max-w-md mx-auto border rounded-2xl p-10 shadow-sm bg-white">
        <h1 class="text-4xl font-heading font-bold text-brand text-center">
            Admin Login
        </h1>
        <p class="text-gray-500 font-body text-center mt-2">
            Masuk untuk mengelola website RuangSeduh
        </p>

        {{-- error --}}
        @if($errors->any())
            <div class="mt-6 bg-red-100 text-red-600 px-4 py-3 rounded-lg text-sm font-body">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-body text-gray-600 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-brand focus:border-brand"
                    placeholder="admin@ruangseduh.com">
            </div>

            <div>
                <label class="block text-sm font-body text-gray-600 mb-2">Password</label>
                <input type="password" name="password"
                    class="w-full border rounded-xl px-4 py-3 focus:ring-brand focus:border-brand"
                    placeholder="password">
            </div>

            <button type="submit"
                class="w-full bg-brand text-white py-3 rounded-xl font-body font-semibold hover:opacity-90 transition">
                Login
            </button>
        </form>
    </div>
</section>
@endsection

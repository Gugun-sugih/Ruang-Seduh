@extends('layouts.app')

@section('title', 'Kontak Kami - RuangSeduh')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-16">

    {{-- title --}}
    <div class="text-center">
        <h1 class="text-5xl font-heading font-bold text-brand">Hubungi Kami</h1>
        <p class="mt-3 text-gray-500 font-body">
            Ada pertanyaan atau komentar? Cukup tulis pesan pada kami!
        </p>
    </div>

    {{-- content --}}
    <div class="mt-14 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

        {{-- LEFT INFO --}}
        <div class="bg-brand text-white rounded-3xl px-10 py-12 shadow-sm">
            <h2 class="text-4xl font-heading font-bold">Informasi Kontak</h2>

            <p class="mt-6 text-sm leading-relaxed font-body">
                Jika Anda mempunyai pertanyaan atau kekhawatiran, Anda dapat
                menghubungi kami dengan mengisi formulir kontak, menelpon kami,
                datang ke kantor kami, menemukan kami di jejaring sosial lain,
                atau Anda dapat mengirim email pribadi kepada kami di:
            </p>

            <div class="mt-10 space-y-6 text-sm font-body">

                <div class="flex items-center gap-4">
                    <span class="text-xl">📞</span>
                    <span>0895-3279-16554</span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-xl">✉️</span>
                    <span>ruangseduh@gmail.com</span>
                </div>

                <div class="flex items-start gap-4">
                    <span class="text-xl">📍</span>
                    <span>
                        Jl. Khp Hasan Mustopa No.23, Neglasari,
                        Kec. Cibeunying Kaler, Kota Bandung,
                        Jawa Barat 40124
                    </span>
                </div>

            </div>
        </div>


        {{-- RIGHT FORM --}}
        <div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-800 font-body text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('kontak.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="font-body text-gray-700 text-sm">Nama</label>
                    <input type="text" name="name" required
                        class="w-full border rounded-xl px-4 py-3 mt-2 focus:border-brand focus:ring-brand">
                </div>

                <div>
                    <label class="font-body text-gray-700 text-sm">Email</label>
                    <input type="email" name="email" required
                        class="w-full border rounded-xl px-4 py-3 mt-2 focus:border-brand focus:ring-brand">
                </div>

                <div>
                    <label class="font-body text-gray-700 text-sm">Nomor Telepon</label>
                    <input type="text" name="phone"
                        class="w-full border rounded-xl px-4 py-3 mt-2 focus:border-brand focus:ring-brand">
                </div>

                <div>
                    <label class="font-body text-gray-700 text-sm">Pesan</label>
                    <textarea name="message" rows="5" required
                        class="w-full border rounded-xl px-4 py-3 mt-2 focus:border-brand focus:ring-brand"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-brand text-white py-3 rounded-2xl font-body font-semibold hover:opacity-90 transition">
                    Kirim
                </button>

            </form>
        </div>
    </div>
</section>

<x-footer />
@endsection

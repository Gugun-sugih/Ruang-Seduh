@extends('layouts.app')

@section('title', 'Tentang - RuangSeduh')

@section('content')

{{-- =========================
    SECTION 1: HERO CERITA KAMI
========================= --}}
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <!-- Image kiri -->
        <div>
            <img
                src="{{ asset('images/coffee.jpg') }}"
                alt="Coffee"
                class="w-full h-[420px] object-cover rounded-md shadow-sm"
            >
        </div>

        <!-- Content kanan -->
        <div class="text-brand">
            <p class="text-sm font-semibold flex items-center gap-3 font-body">
                <span class="w-10 h-[2px] bg-brand opacity-60"></span>
                Tentang <span class="font-bold">RuangSeduh</span>
            </p>

            <h1 class="mt-4 text-5xl font-heading font-bold leading-tight">
                Cerita Kami
            </h1>

            <p class="mt-6 text-lg leading-relaxed font-body max-w-lg">
                Berawal dari diskusi sederhana bertiga,
                RuangSeduh tumbuh menjadi sebuah
                konsep kafe yang mengutamakan
                kenyamanan, kebersamaan, dan
                kemudahan dalam memesan.
            </p>
        </div>

    </div>
</section>


{{-- =========================
    SECTION 2: OUR STORY
========================= --}}
<section class="max-w-7xl mx-auto px-6 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

        <!-- Judul kiri -->
        <div>
        <x-section-title small="Our Story" title="Kopi, Ruang,<br>dan Cerita" />
        </div>

        <!-- Isi kanan -->
        <div class="text-brand font-body text-base md:text-lg leading-7 md:leading-8 space-y-8">
            <p>
                Di tengah rutinitas yang semakin cepat, kami percaya bahwa
                setiap orang membutuhkan ruang untuk berhenti sejenak.
                RuangSeduh hadir sebagai tempat di mana kopi bukan sekadar minuman,
                tetapi bagian dari momen untuk beristirahat, berbincang, dan menciptakan cerita.
            </p>

            <p>
                Kata “Kopi” mewakili kualitas dan rasa yang kami sajikan.
                “Ruang” menggambarkan suasana yang nyaman dan terbuka untuk siapa saja,
                baik untuk bekerja, berbincang, maupun menikmati waktu sendiri.
                Sementara “Cerita” lahir dari setiap pengunjung yang datang dan berinteraksi di RuangSeduh.
            </p>

            <p>
                Melalui perpaduan suasana, cita rasa, dan sistem yang sederhana,
                kami ingin menghadirkan pengalaman yang menyenangkan.
                Dengan pemesanan yang mudah, pengunjung dapat fokus menikmati kopi,
                ruang, dan cerita yang tercipta di dalamnya.
            </p>
        </div>

    </div>
</section>


{{-- =========================
    SECTION 3: ABOUT OUR PRODUCTS
========================= --}}
<section class="max-w-7xl mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

        <!-- Judul kiri -->
        <div>
        <x-section-title small="About our Products" title="Tersertifikasi <br> Halal" />
        </div>

        <!-- Isi kanan -->
        <div class="text-brand font-body text-base md:text-lg leading-7 md:leading-8">
    <p>
        RuangSeduh tersertifikasi Halal Grade A oleh MUI dengan nomor
        LPPOM-00160233461223. Kami menjunjung standar tinggi dalam
        pembuatan dan penyajian produk dengan menggunakan 100% bahan halal.
    </p>
</div>

    </div>
</section>


{{-- =========================
    SECTION 4: PENGEMBANG
========================= --}}
<section class="bg-[#F4F8F6] py-16 mt-12">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-heading font-bold text-brand text-center">
            Pengembang
        </h2>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-10 justify-items-center">
            <x-team-card
    name="Nur Hikma Niswaryanti"
    role="UI/UX Designer"
    image="{{ asset('images/hikma.png') }}"
/>

<x-team-card
    name="Syahrina Alma Fitrina"
    role="Front End"
    image="{{ asset('images/ama.png') }}"
/>

<x-team-card
    name="Deden Raga Nuhudiyah"
    role="Back End"
    image="{{ asset('images/oga.png') }}"
/>

        </div>
    </div>
</section>

<x-footer />

@endsection

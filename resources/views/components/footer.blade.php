<footer class="bg-white border-t mt-16">
    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- Logo + Copyright -->
            <div>
                <div class="flex items-center gap-3">
    <img src="{{ asset('images/logo.png') }}" alt="RuangSeduh" class="w-10 h-10 object-contain">
    <span class="font-heading font-bold text-xl text-brand">RuangSeduh</span>
</div>


                <p class="mt-6 text-sm text-gray-600 font-body">
                    © {{ date('Y') }} RuangSeduh. All rights reserved.
                </p>

                <p class="mt-2 text-xs text-gray-400 font-body">
                    *Terms and Conditions *Privacy Policy
                </p>
            </div>

            <!-- Customer Center -->
            <div class="font-body">
                <h3 class="text-sm font-semibold text-brand mb-4">
                    Customer Center
                </h3>

                <ul class="space-y-3 text-sm text-gray-600">
                    <li class="flex items-start gap-3">
                        <span>📍</span>
                        <span>
                            Jl. KH Hasyim Ashari No.28, Ngringasari, 
                            Kedungwaru, Tulungagung 66229
                        </span>
                    </li>

                    <li class="flex items-center gap-3">
                        <span>📞</span>
                        <span>+62 813-1234-5678</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <span>✉️</span>
                        <span>ruangseduh@mail.com</span>
                    </li>
                </ul>
            </div>

            <!-- Customer Complaints -->
            <div class="font-body">
                <h3 class="text-sm font-semibold text-brand mb-4">
                    Customer Complaints Service Contact Information
                </h3>

                <p class="text-sm text-gray-600 leading-relaxed">
                    Directorate General of Consumer Protection and Trade Compliance,
                    Ministry of Trade of the Republic of Indonesia
                </p>

                <ul class="mt-4 space-y-3 text-sm text-gray-600">
                    <li class="flex items-center gap-3">
                        <span>📞</span>
                        <span>0853-1111-1010</span>
                    </li>

                    <li class="flex items-center gap-3">
                        <span>✉️</span>
                        <span>pengaduan@kemendag.go.id</span>
                    </li>
                </ul>

                <!-- Social Icons -->
                <<div class="flex justify-end">
    {{-- Instagram --}}
    <a href="https://instagram.com" target="_blank"
       class="w-9 h-9 flex items-center justify-center rounded-md border border-gray-300 hover:bg-brand hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.5 6.5h.01"/>
        </svg>
    </a>

    {{-- Facebook --}}
    <a href="https://facebook.com" target="_blank"
       class="w-9 h-9 flex items-center justify-center rounded-md border border-gray-300 hover:bg-brand hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M22 12a10 10 0 10-11.5 9.9v-7H8v-3h2.5V9.5A3.5 3.5 0 0114.3 6h2.7v3h-2c-.7 0-1 .3-1 1V12h3l-.5 3h-2.5v7A10 10 0 0022 12z"/>
        </svg>
    </a>

    {{-- X / Twitter --}}
    <a href="https://x.com" target="_blank"
       class="w-9 h-9 flex items-center justify-center rounded-md border border-gray-300 hover:bg-brand hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M18.9 2H22l-6.8 7.8L23.2 22h-6.7l-5.2-6.6L5.3 22H2l7.4-8.6L1 2h6.8l4.7 6.1L18.9 2zm-1.2 18h1.8L6.9 4H5L17.7 20z"/>
        </svg>
    </a>
</div>

            </div>

        </div>

    </div>
</footer>

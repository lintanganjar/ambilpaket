@extends('layouts.landing')
@section('content')
    @php
        $providerList = [
            (object) [
                'id' => 1,
                'name' => 'JNE Express',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
            (object) [
                'id' => 2,
                'name' => 'J&T',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
            (object) [
                'id' => 3,
                'name' => 'JNE',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
            (object) [
                'id' => 4,
                'name' => 'JNE',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
            (object) [
                'id' => 5,
                'name' => 'JNE',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
        ];
    @endphp
    {{-- HERO SECTION --}}
    <section class="bg-center bg-no-repeat bg-cover bg-blend-multiply"
        style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url('{{ asset('static/images/hero2.jpeg') }}');">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left py-36 lg:py-48">
            <h1
                class="mb-4 pt-44 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">
                Daftarkan
                UMKM Anda <br> ke AmbilPaket!</h1>
            <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Dapatkan
                dukungan teknologi dan pemasaran, serta
                akses ke jaringan <br> pengiriman terpercaya di seluruh Indonesia.</p>
            <div class="flex flex-col space-y-4 mb-44 lg:justify-start sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#"
                    class="inline-flex justify-center items-center py-2 lg:py-3 px-5 text-base font-notmal text-center text-white rounded-lg bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-blue-300 ">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}
    {{-- PROMO SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 w-full text-left">
            <h1
                class="mb-4 md:mb-10 text-2xl font-extrabold tracking-tight leading-none text-black md:text-4xl lg:text-5xl">
                Promo Menarik</h1>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <div
                    class="relative overflow-hidden rounded-lg h-32 md:h-64 lg:h-72 xl:h-96 flex items-center justify-center">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('static/images/Promo.png') }}" class="mx-auto block h-full w-auto object-cover"
                            alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('static/images/Promo.png') }}" class="mx-auto block h-full w-auto object-cover"
                            alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('static/images/Promo.png') }}" class="mx-auto block h-full w-auto object-cover"
                            alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('static/images/Promo.png') }}" class="mx-auto block h-full w-auto object-cover"
                            alt="...">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('static/images/Promo.png') }}" class="mx-auto block h-full w-auto object-cover"
                            alt="...">
                    </div>
                </div>
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent group-focus:ring-4 group-focus:ring-transparent  group-focus:outline-none">
                        <svg class="w-4 h-4 text-transparent  rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-4 group-focus:ring-transparent  group-focus:outline-none">
                        <svg class="w-4 h-4 text-transparent  rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>
    {{-- END PROMO SECTION --}}
    {{-- HOW TO USE SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto">
            <div class="text-gray-900 sm:text-lg ">
                <h2
                    class="mb-4 text-2xl md:text-4xl text-center font-extrabold tracking-tight text-gray-900 ">
                    Bagaimana
                    cara mengirim paket dengan AmbilPaket?</h2>
                <p class="px-6 lg:px-0 text-center text-sm lg:text-lg">
                    UMKM bisa mengirim paket dengan mudah melalui platform AmbilPaket. Cukup daftarkan diri Anda sebagai
                    pengirim, pilih agen pengiriman terdekat, isi alamat penerima, dan lakukan pembayaran. Paket Anda akan
                    segera diambil oleh agen pengiriman dan dikirim ke tujuan dengan aman dan cepat.</p>
            </div>
        </div>
    </section>
    {{-- END HOW TO USE SECTION --}}
    {{-- SERVICE SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-3">
            <div class="text-gray-500 sm:text-lg  col-span-2">
                <h2
                    class="mb-8 text-2xl md:text-4xl text-center lg:text-left font-extrabold tracking-tight text-gray-900 ">
                    Layanan Khusus untuk
                    Anda!</h2>
                <img class="block lg:hidden px-20 mb-8 w-full rounded-lg" src="{{ asset('static/images/services.png') }}"
                    alt="office content 1">

                <ul class="max-w-md px-6 lg:px-0 space-y-4 text-gray-900 list-inside ">
                    <li class="flex items-center text-sm lg:text-lg">
                        <img src="{{ asset('static/images/li1.png') }}" alt="Icon"
                            class="w-7 h-7 me-4 text-green-500  flex-shrink-0" />
                        Kemudahan dalam Pengiriman
                    </li>
                    <li class="flex items-center text-sm lg:text-lg">
                        <img src="{{ asset('static/images/li2.png') }}" alt="Icon"
                            class="w-7 h-7 me-4 text-green-500  flex-shrink-0" />
                        Pelacakan Pengiriman
                    </li>
                    <li class="flex items-center text-sm lg:text-lg">
                        <img src="{{ asset('static/images/li3.png') }}" alt="Icon"
                            class="w-7 h-7 me-4 text-green-500  flex-shrink-0" />
                        Bebas Pilih Ekspedisi
                    </li>
                    <li class="flex items-center text-sm lg:text-lg">
                        <img src="{{ asset('static/images/li4.png') }}" alt="Icon"
                            class="w-7 h-7 me-4 text-green-500  flex-shrink-0" />
                        Pengiriman Seluruh Indonesia
                    </li>
                </ul>
            </div>
            <img class="hidden lg:block w-full rounded-lg" src="{{ asset('static/images/services.png') }}"
                alt="office content 1">
        </div>
    </section>
    {{-- END SERVICE SECTION --}}
    {{-- TERMS REGISTRATION SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-3">
            <img class="hidden lg:block w-full rounded-lg" src="{{ asset('static/images/terms.png') }}"
                alt="office content 1">
            <div class="text-gray-500 sm:text-lg  col-span-2">
                <h2
                    class="hidden lg:block mb-8 text-2xl md:text-4xl text-center lg:text-left font-extrabold tracking-tight text-gray-900 ">
                    Daftarkan Usaha Anda
                    dengan <br> Ketentuan Berikut</h2>
                <h2
                    class="block lg:hidden mb-8 text-2xl md:text-4xl text-center lg:text-left font-extrabold tracking-tight text-gray-900 ">
                    Daftarkan Usaha Anda
                    dengan Ketentuan Berikut</h2>
                <img class="block lg:hidden px-20 mb-8 w-full rounded-lg" src="{{ asset('static/images/terms.png') }}"
                    alt="office content 1">
                <ul class="max-w-md px-6 lg:px-0 space-y-4 text-gray-900 list-inside ">
                    <li class="flex items-start lg:items-center">
                        <svg class="w-5 h-5 me-4 text-customprimary-500 flex-shrink-0"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Usaha Resmi
                    </li>
                    <li class="flex items-start lg:items-center">
                        <svg class="w-5 h-5 me-4 text-customprimary-500  flex-shrink-0"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Pengiriman Paket Rutin dan Terjadwal
                    </li>
                    <li class="flex items-start lg:items-center">
                        <svg class="w-5 h-5 me-4 text-customprimary-500  flex-shrink-0"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Produk Sesuai dengan Kriteria yang Ditetapkan AmbilPaket.com
                    </li>
                    <li class="flex items-start lg:items-center">
                        <svg class="w-5 h-5 me-4 text-customprimary-500 flex-shrink-0"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        Mampu Memenuhi Permintaan Pengantaran dan Memenuhi Standar yang Ada
                    </li>
                </ul>
            </div>
        </div>
    </section>
    {{-- END TERMS REGISTRATION SECTION --}}
    {{-- PARTNER SECTION --}}
    <section class="bg-gray-100 py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-36 w-full">
            <h2 class="mb-3 text-2xl lg:text-6xl text-center font-extrabold tracking-tight text-gray-900 ">
                Partner Ekspedisi Kami
            </h2>
            <p class="text-gray-900 text-base lg:text-xl  text-center">
                Optimalkan Pengiriman Anda dengan Partner Ekspedisi Terpercaya!
            </p>
            <div class="hidden lg:flex flex-wrap justify-center gap-12 items-center mt-12 text-gray-500">
                @foreach ($providerList as $provider)
                    <div class="flex-1 flex items-center justify-center">
                        <img src="{{ $provider->logo }}" class="h-full w-auto" alt="{{ $provider->name }}">
                    </div>
                @endforeach
            </div>
            <div id="default-carousel" class="block lg:hidden relative w-full mt-12" data-carousel="slide">
                <div class="relative overflow-hidden rounded-lg h-20 md:h-64 lg:h-72 xl:h-96 flex items-center justify-center">
                    @foreach ($providerList as $provider)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ $provider->logo }}" class="mx-auto block w-auto max-h-full object-contain" alt="{{ $provider->name }}">
                        </div>
                    @endforeach
                </div>
    
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
                        <svg class="w-4 h-4 text-transparent  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
                        <svg class="w-4 h-4 text-transparent rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>
    {{-- END PARTNER SECTION --}}
    {{-- CONTACT SECTION --}}
    <section class="bg-gradient-to-r from-[#FA523D] to-[#35383A]  mt-16 py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-3">
            <div class="text-white sm:text-lg col-span-2">
                <h2 class="mb-8 text-2xl md:text-4xl text-left font-extrabold tracking-normal text-white">Perluas Bisnismu
                    dan
                    Tingkatkan Pengalaman Pengiriman dengan AmbilPaket!</h2>
                <div class="block lg:hidden px-20 mb-8 bg-white rounded-xl">
                    <img class="w-full" src="{{ asset('static/images/contact.png') }}" alt="office content 1">
                </div>
                <p class="mb-4 text-left text-sm md:text-base">Dapatkan kesempatan untuk memperluas jaringan bisnismu dan
                    menawarkan layanan
                    pengiriman yang lebih baik kepada pelangganmu. Bersama AmbilPaket, kita dapat menciptakan pengalaman
                    pengiriman yang lebih mudah, cepat, dan terpercaya
                </p>
                <div class="flex flex-col space-y-4 mt-6 lg:justify-start sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="#"
                        class="inline-flex justify-center items-center py-2 lg:py-3 px-7 text-base font-semibold text-center text-customprimary-500 rounded-lg bg-white hover:bg-customprimary-700 focus:ring-4 focus:ring-blue-300 ">
                        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                        </svg>
                        Kontak Sales
                    </a>
                </div>
            </div>
            <div class="hidden lg:block bg-white rounded-xl">
                <img class="w-full" src="{{ asset('static/images/contact.png') }}" alt="office content 1">
            </div>
        </div>
    </section>
    {{-- END CONTACT SECTION --}}
@endsection

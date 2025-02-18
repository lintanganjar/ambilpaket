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
        $pricingList = [
            (object) [
                'id' => 1,
                'name' => 'Bronze',
                'price' => 2000000,
                'commission' => '5 - 10%',
                'other_benefits' => [
                    'Bisa buka dirumah',
                    'Free komisi 5-10% dari nilai kirim',
                    'Mempunyai rekan online shop / rekan bisnis online shop',
                    'Gratis pick up barang',
                    'Training konten penjualan',
                    'Stempel & Brosur',
                ],
            ],
            (object) [
                'id' => 2,
                'name' => 'Silver',
                'price' => 5500000,
                'commission' => '5 - 10%',
                'other_benefits' => [
                    'Bisa buka dirumah',
                    'Free komisi 5-10% dari nilai kirim',
                    'Gratis pick up barang',
                    'Training konten penjualan',
                    'Stempel & Brosur',
                    'Poster & Sticker',
                    'Seragam (2)',
                ],
            ],
            (object) [
                'id' => 3,
                'name' => 'Gold',
                'price' => 9000000,
                'commission' => '10 - 15%',
                'other_benefits' => [
                    'Bisa buka dirumah',
                    'Free komisi 10-15% dari nilai kirim',
                    'Gratis pick up barang',
                    'Training konten penjualan',
                    'Stempel & Brosur',
                    'Poster & Sticker',
                    'Seragam (2)',
                ],
            ],
            (object) [
                'id' => 4,
                'name' => 'Platinum',
                'price' => 11500000,
                'commission' => '20%',
                'other_benefits' => [
                    'Bisa buka dirumah',
                    'Free komisi 20% dari nilai kirim',
                    'Gratis pick up barang',
                    'Training konten penjualan',
                    'Stempel & Brosur',
                    'Poster & Sticker',
                    'Seragam (2)',
                    'Meja pop up counter',
                ],
            ],
        ];
    @endphp
    {{-- HERO SECTION --}}
    <section class="bg-center bg-no-repeat bg-cover bg-blend-multiply"
        style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url('{{ asset('static/images/hero3.jpeg') }}');">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left py-36 lg:py-48">
            <h1
                class="mb-4 pt-44 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">
                Ayo Bergabung <br> Menjadi Agen
                Kami!</h1>
            <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Dapatkan
                kesempatan untuk memperluas jaringan bisnismu!</p>
            <div class="flex flex-col space-y-4 mb-44 lg:justify-start sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#"
                    class="inline-flex justify-center items-center py-2 lg:py-3 px-5 text-base font-notmal text-center text-white rounded-lg bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-blue-300 ">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}
    {{-- ABOUT SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto">
            <div class="text-gray-900 sm:text-lg ">
                <h2
                    class="mb-4 text-2xl md:text-4xl text-center font-extrabold tracking-tight text-gray-900 ">
                    Apa itu
                    AmbilPaket?</h2>
                <p class="px-6 lg:px-0 text-center text-sm md:text-base">
                    AmbilPaket adalah platform pengiriman paket di Indonesia yang menghubungkan pengirim dan penerima dengan
                    agen-agen terpercaya di seluruh Indonesia. Agen AmbilPaket akan membantu pengirim untuk mengirimkan
                    paket ke penerima dengan cepat, aman, dan terpercaya.</p>
            </div>
        </div>
    </section>
    {{-- END ABOUT SECTION --}}
    {{-- PRICING SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto">
            <div class="text-gray-900 sm:text-lg ">
                <h2
                    class="mb-4 text-2xl md:text-4xl text-center font-extrabold tracking-tight text-gray-900 ">
                    Paket yang Kami Tawarkan untuk Anda!
                </h2>
                <div class="w-full py-8 mx-auto grid lg:grid-cols-4 gap-4 lg:gap-0">
                    @if (is_array($pricingList) || is_object($pricingList))
                        @foreach ($pricingList as $plan)
                            <a href="#{{ strtolower($plan->name) }}"
                                class="relative w-full p-4 bg-white border-4 border-gray-400 rounded-xl shadow hover:scale-105 transform transition-all sm:p-8  group">
                                <h5 class="text-xl font-medium text-gray-900 ">{{ $plan->name }}</h5>
                                <div class="flex items-baseline text-gray-900  mb-4">
                                    <span
                                        class="text-4xl font-bold tracking-tight">{{ number_format($plan->price / 1000, 0, ',', '.') }}K</span>
                                </div>
                                <ul>
                                    @if (!empty($plan->other_benefits) && is_array($plan->other_benefits))
                                        @foreach ($plan->other_benefits as $benefit)
                                            <li class="flex items-center mb-4">
                                                <svg class="w-6 h-6 text-customprimary-500  flex-shrink-0"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5" />
                                                </svg>
                                                <span
                                                    class="text-base font-normal leading-tight text-gray-900  ms-3">{{ $benefit }}</span>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="flex items-center mb-4 text-red-500">No benefits available.</li>
                                    @endif
                                </ul>
                            </a>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </section>
    {{-- END PRICING SECTION --}}
    {{-- HOW TO REGISTRATION SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-3">
            <img class="hidden lg:block w-full rounded-lg" src="{{ asset('static/images/registration.png') }}"
                alt="office content 1">
            <div class="text-gray-500 sm:text-lg  col-span-2">
                <h2
                    class="mb-4 text-2xl lg:text-4xl text-center lg:text-left font-extrabold tracking-tight text-gray-900 ">
                    Pendaftaran Agen</h2>
                <img class="block lg:hidden px-20 py-6 w-full rounded-lg"
                    src="{{ asset('static/images/registration.png') }}" alt="office content 1">
                <ul class="px-6 lg:px-0 list-decimal list-inside text-gray-900  space-y-1">
                    <li class="flex items-start">
                        <span class="mr-2">1.</span>
                        Pertama-tama Anda perlu mengklik tombol "Daftar”
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">2.</span>
                        Lalu, pilih opsi "Agen" dan isi formulir pendaftaran dengan lengkap
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">3.</span>
                        Setelah itu, pilih paket yang sesuai dengan kebutuhan Anda dan ajukan permohonan menjadi Agen
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2">4.</span>
                        Anda akan menerima konfirmasi dari kami apakah Anda telah memenuhi syarat menjadi agen atau tidak
                        setelah verifikasi data Anda
                    </li>
                </ul>
            </div>
        </div>
    </section>
    {{-- END HOW TO REGISTRATION SECTION --}}
    {{-- PARTNER SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
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
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-4 group-focus:ring-transparent  group-focus:outline-none">
                        <svg class="w-4 h-4 text-transparent  rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent   group-focus:ring-4 group-focus:ring-transparent  group-focus:outline-none">
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
    {{-- BENEFIT SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-36 w-full gap-8 mx-auto lg:gap-12 lg:grid lg:grid-cols-3 items-start">
            <h1
                class="col-span-3 text-center text-2xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl mb-8">
                Keuntungan Customer
            </h1>
            <div class="bg-white rounded-lg  p-4 flex flex-col mb-6 lg:mb-0 lg:min-h-80">
                <div class="flex lg:block justify-center items-center">
                    <img src="{{ asset('static/images/benefit1.png') }}" alt="Icon"
                        class="w-16 h-16 mb-3 text-green-500  flex-shrink-0" />
                </div>
                <h2
                    class="lg:mb-11 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 text-center lg:text-left">
                    Mendapatkan Dukungan dan
                    Bantuan</h2>
                <p class="text-gray-500  text-sm lg:text-base text-center lg:text-left">
                    Agen AmbilPaket juga akan mendapatkan dukungan dan bantuan dari tim AmbilPaket, berupa dukungan
                    pemasaran dan dukungan teknis.
                </p>
            </div>
            <div class="bg-white rounded-lg  p-4 flex flex-col mb-6 lg:mb-0 lg:min-h-80">
                <div class="flex lg:block justify-center items-center">
                    <img src="{{ asset('static/images/benefit2.png') }}" alt="Icon"
                        class="w-16 h-16 mb-3 text-green-500 flex-shrink-0" />
                </div>
                <h2
                    class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900  text-center lg:text-left">
                    Memperoleh Kemudahan dalam
                    Pengiriman</h2>
                <p class="text-gray-500 text-sm lg:text-base text-center lg:text-left">
                    Sebagai agen AmbilPaket, agen akan mendapatkan kemudahan dalam pengiriman, seperti akses ke teknologi
                    dan sistem manajemen pengiriman yang efektif.
                </p>
            </div>
            <div class="bg-white rounded-lg  p-4 flex flex-col mb-6 lg:mb-0 lg:min-h-80">
                <div class="flex lg:block justify-center items-center">
                    <img src="{{ asset('static/images/benefit3.png') }}" alt="Icon"
                        class="w-16 h-16 mb-3 text-green-500  flex-shrink-0" />
                </div>
                <h2
                    class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 text-center lg:text-left">
                    Memperluas Jaringan Bisnis
                </h2>
                <p class="text-gray-500  text-sm lg:text-base text-center lg:text-left">
                    Bergabung dengan AmbilPaket juga memberikan kesempatan bagi agen untuk memperluas jaringan bisnis dan
                    meningkatkan pelanggan bisnis Anda.
                </p>
            </div>
            <div class="bg-white rounded-lg p-4 flex flex-col mb-6 lg:mb-0 lg:min-h-80">
                <div class="flex lg:block justify-center items-center">
                    <img src="{{ asset('static/images/benefit1.png') }}" alt="Icon"
                        class="w-16 h-16 mb-3 text-green-500  flex-shrink-0" />
                </div>
                <h2
                    class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 text-center lg:text-left">
                    Memperoleh Penghasilan
                    Tambahan</h2>
                <p class="text-gray-500  text-sm lg:text-base text-center lg:text-left">
                    Dengan menjadi agen AmbilPaket, anda bisa memperoleh penghasilan tambahan hingga puluhan juta rupiah
                    melalui komisi agen.
                </p>
            </div>
            <div class="bg-white rounded-lg  p-4 flex flex-col mb-6 lg:mb-0 lg:min-h-80">
                <div class="flex lg:block justify-center items-center">
                    <img src="{{ asset('static/images/benefit2.png') }}" alt="Icon"
                        class="w-16 h-16 mb-3 text-green-500 flex-shrink-0" />
                </div>
                <h2
                    class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900  text-center lg:text-left">
                    Mendapatkan Diskon
                </h2>
                <p class="text-gray-500  text-sm lg:text-base text-center lg:text-left">
                    Keuntungan menjadi agen AmbilPaket adalah memperoleh diskon penjualan yang cukup besar. Pelaku usaha
                    bakal memperoleh diskon hingga kisaran 35% dari total penjualan setiap bulannya
                </p>
            </div>
            <div class="bg-white rounded-lg  p-4 flex flex-col mb-6 lg:mb-0 lg:min-h-80">
                <div class="flex lg:block justify-center items-center">
                    <img src="{{ asset('static/images/benefit3.png') }}" alt="Icon"
                        class="w-16 h-16 mb-3 text-green-500 flex-shrink-0" />
                </div>
                <h2
                    class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900  text-center lg:text-left">
                    Persyaratan Mudah dan
                    Biaya Terjangkau</h2>
                <p class="text-gray-500 text-sm lg:text-base text-center lg:text-left">
                    Untuk menjadi agen dari AmbilPaket tidak perlu persyaratan yang terlalu rumit. Kamu cukup menyiapkan
                    beberapa dokumen yang dibutuhkan.
                </p>
            </div>
        </div>
    </section>
    {{-- END BENEFIT SECTION --}}
@endsection

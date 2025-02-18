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
    {{-- <section class="w-full bg-center bg-no-repeat bg-cover bg-blend-multiply bg-gray-500"
        style="background-image: url('{{ asset('static/images/hero.jpg') }}');"> --}}
    <section class="bg-center bg-no-repeat bg-cover bg-blend-multiply"
        style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url('{{ asset('static/images/hero.jpg') }}');">
        <div class="w-full">
            <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left py-36">
                <div class="mb-16 lg:mb-36" data-aos="fade-down" data-aos-duration="500">
                    <p class="mb-3 text-sm sm:text-base lg:text-lg font-normal text-gray-300">
                        <i>Penasaran sama harga pengiriman kamu? Cek disini aja!</i>
                    </p>
                    <form class="grid lg:grid-cols-12 gap-4 w-full">
                        <label for="origin-city-search" class="sr-only">Origin City Search</label>
                        <div class="relative col-span-4">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="origin-city-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 "
                                placeholder="Kota/Kecamatan/Kelurahan" required />
                        </div>
                        <label for="destination-city-search" class="sr-only">Destination City Search</label>
                        <div class="relative col-span-4">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="destination-city-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                                placeholder="Kota/Kecamatan/Kelurahan" required />
                        </div>
                        <label for="weight-search" class="sr-only">Weight</label>
                        <div class="relative col-span-2">
                            <input type="text" id="weight-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  "
                                placeholder="0.00/Kg" required />
                        </div>
                        <div class="relative col-span-2">
                            <button type="submit"
                                class="p-2.5 w-full text-sm font-medium text-white bg-customprimary-500 rounded-lg border border-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                                Cek harga
                            </button>
                        </div>
                    </form>
                </div>
                <div class="hidden lg:block justify-center" data-aos="fade-right" data-aos-duration="500">
                    <h1
                        class="mb-4 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white animate-fade-in">
                        Solusi Kirim Paket <br> Tanpa Ribet
                    </h1>
                    <p
                        class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300 animate-fade-in-delayed">
                        AmbilPaket siap mengantar dan mengirim paket kamu dari rumah loh. <br>
                        Kalian cukup di rumah aja sambil nunggu paketnya dikirim <br>
                        dan diantar ke tujuan kalian!
                    </p>
                </div>
                <div class="block lg:hidden justify-center" data-aos="fade-right" data-aos-duration="500">
                    <h1
                        class="mb-4 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white animate-fade-in">
                        Solusi Kirim Paket Tanpa Ribet
                    </h1>
                    <p
                        class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300 animate-fade-in-delayed">
                        AmbilPaket siap mengantar dan mengirim paket kamu dari rumah loh.
                        Kalian cukup di rumah aja sambil nunggu paketnya dikirim
                        dan diantar ke tujuan kalian!
                    </p>
                </div>
                <div class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:justify-start" data-aos="fade-right" data-aos-duration="500">
                    <a href="#"
                        class="inline-flex justify-center items-center py-2 md:py-3 px-5 text-sm lg:text-base font-normal text-white rounded-lg bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 animate-slide-in-left">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z" />
                        </svg>
                        Kontak Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- END HERO SECTION --}}
    {{-- PROMO SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 w-full text-left">
            <h1
                class="mb-4 md:mb-10 text-2xl font-extrabold tracking-tight leading-none text-black md:text-4xl lg:text-5xl" data-aos="fade-right" data-aos-duration="500">
                Promo Menarik</h1>
            <div id="default-carousel" class="relative w-full" data-carousel="slide" data-aos="fade-left" data-aos-duration="500">
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
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent  group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
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
    {{-- WHY SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-3 ">
            <img class="hidden lg:block w-full rounded-lg" data-aos="fade-right" data-aos-duration="500" src="{{ asset('static/images/WhyAmbilPaket.png') }}"
                alt="office content 1">
            <div class="text-gray-900 sm:text-lg col-span-2">
                <h2
                    class="mb-4 text-2xl md:text-4xl lg:text-5xl text-center lg:text-left font-extrabold tracking-tight text-gray-900 " data-aos="fade-left" data-aos-duration="500">
                    Kenapa Harus
                    AmbilPaket?</h2>
                <div class="block lg:hidden mx-12" data-aos="fade-down" data-aos-duration="500">
                    <img class="w-full my-4 rounded-lg" src="{{ asset('static/images/WhyAmbilPaket.png') }}"
                        alt="office content 1">
                </div>
                <p class="mb-4 text-center text-sm md:text-base lg:text-left" data-aos="fade-left" data-aos-duration="500">Dengan menggunakan jasa AmbilPaket kami, kamu
                    akan merasa lebih
                    aman dan
                    terjamin dalam
                    pengiriman paket.
                </p>
                <p class="text-center text-sm md:text-base lg:text-left" data-aos="fade-left" data-aos-duration="500">
                    Kami menyediakan layanan pengiriman dengan asuransi sehingga paketmu akan terlindungi dengan baik.
                    Selain itu, kami juga memiliki tim yang profesional dan berpengalaman dalam menangani setiap paket yang
                    kami terima sehingga kamu tidak perlu khawatir tentang kerusakan atau kehilangan paket. </p>
                <div class="flex flex-col space-y-4 mt-6 lg:justify-start sm:flex-row sm:justify-center sm:space-y-0" data-aos="fade-left" data-aos-duration="500">
                    <a href="#"
                        class="inline-flex justify-center items-center py-2 md:py-3 px-5 text-base font-notmal text-center text-white rounded-lg bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-blue-300 ">
                        Daftar Sekarang!
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- END WHY SECTION --}}
    {{-- BENEFIT SECTION --}}
    <section class="bg-gray-100 py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-36 w-full gap-8 mx-auto lg:gap-12 lg:grid lg:grid-cols-3 items-start">
            <h1
                class="col-span-3 text-center text-2xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl mb-8" data-aos="fade-down" data-aos-duration="500">
                Keuntungan Customer
            </h1>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0" data-aos="fade-right" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900">Aman
                    Terjamin</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Kami menyediakan layanan pengiriman dengan asuransi sehingga paketmu akan terlindungi dengan baik.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0" data-aos="zoom-in" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900">Pengiriman
                    Cepat</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Kami menyediakan opsi pengiriman dengan waktu yang lebih cepat untuk kamu yang membutuhkan pengiriman
                    segera.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0" data-aos="fade-left" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900">Pengiriman
                    Dapat
                    Dilacak</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Kami menyediakan opsi pengiriman yang dapat dilacak sehingga kamu dapat mengetahui status pengiriman
                    paketmu dengan mudah dan cepat.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0" data-aos="fade-right" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900">Mendapatkan
                    Poin</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Dapatkan poin setiap pembelianmu dan nikmati keuntungan eksklusif! Belanja lebih, hemat lebih. Raih
                    poin, rasakan keistimewaannya.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0" data-aos="zoom-in" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900">Jangkauan
                    Nasional
                </h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Layanan ini menawarkan jangkauan yang luas, mencakup seluruh wilayah Indonesia. Dengan demikian,
                    pelanggan dapat mengirim dan menerima paket dari dan ke hampir setiap sudut negeri tanpa batasan
                    geografis.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0" data-aos="fade-left" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900">Pilihan
                    Layanan yang
                    Beragam</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Layanan pengiriman ini seringkali menyediakan berbagai pilihan layanan, mulai dari pengiriman kilat
                    untuk keperluan mendesak hingga opsi pengiriman ekonomis untuk pengiriman dengan anggaran terbatas. Ini
                    memberikan fleksibilitas kepada pelanggan untuk memilih layanan yang paling sesuai dengan kebutuhan dan
                    prioritas mereka.
                </p>
            </div>
        </div>
    </section>

    {{-- END BENEFIT SECTION --}}
    {{-- PARTNER SECTION --}}
    <section class="bg-gray-100 py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-36 w-full">
            <h2 class="mb-3 text-2xl lg:text-6xl text-center font-extrabold tracking-tight text-gray-900" data-aos="fade-down" data-aos-duration="500">
                Partner Ekspedisi Kami
            </h2>
            <p class="text-gray-900 text-base lg:text-xl text-center" data-aos="fade-down" data-aos-duration="500">
                Optimalkan Pengiriman Anda dengan Partner Ekspedisi Terpercaya!
            </p>
            <div class="hidden lg:flex flex-wrap justify-center gap-12 items-center mt-12 text-gray-500">
                @foreach ($providerList as $provider)
                    <div class="flex-1 flex items-center justify-center" data-aos="fade-up" data-aos-duration="500">
                        <img src="{{ $provider->logo }}" class="h-full w-auto" alt="{{ $provider->name }}">
                    </div>
                @endforeach
            </div>
            <div id="default-carousel" class="block lg:hidden relative w-full mt-12" data-carousel="slide" data-aos="fade-left" data-aos-duration="500">
                <div class="relative overflow-hidden rounded-lg h-20 md:h-64 lg:h-72 xl:h-96 flex items-center justify-center">
                    @foreach ($providerList as $provider)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ $provider->logo }}" class="mx-auto block w-auto max-h-full object-contain"
                                alt="{{ $provider->name }}">
                        </div>
                    @endforeach
                </div>
    
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true"
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
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-transparent group-focus:ring-4 group-focus:ring-transparent group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true"
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
    
    {{-- END PARTNER SECTION --}}
    {{-- FAQ SECTION --}}
    <section class="bg-gray-100  py-6 lg:py-16">
        <div class="px-6 md:px-12 lg:px-36 w-full gap-8 mx-auto lg:gap-12 lg:grid lg:grid-cols-3 items-start">
            <h1
                class="col-span-3 text-center text-2xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl mb-8" data-aos="fade-down" data-aos-duration="500">
                Pertanyaan Anda
            </h1>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0" data-aos="fade-right" data-aos-duration="500">
                <h2 class="lg:mb-11 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Apa itu
                    AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Platform penjemputan dan pengiriman logistik yang berfokus pada menyediakan layanan jemputan dan
                    mengantarkan paket dengan mudah, cepat, dan aman.

                </p>
            </div>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0" data-aos="zoom-in" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Mengapa
                    harus
                    menggunakan AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left" data-aos="fade-left" data-aos-duration="500">
                    Dengan menggunakan jasa AmbilPaket kami, kamu akan merasa lebih aman dan terjamin dalam pengiriman
                    paket.

                </p>
            </div>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0" data-aos="fade-left" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Apa saja
                    keuntungan
                    pakai AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Kami menyediakan layanan pengiriman dengan asuransi sehingga paketmu akan terlindungi dengan baik.
                </p>
            </div>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0" data-aos="fade-right" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Bagaimana
                    mencetak
                    label atau resi?</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Cara mencetak label atau resi adalah dengan menggunakan printer label, memastikan perangkat lunak
                    terinstal, lalu pilih opsi "Cetak" dan sesuaikan pengaturan sebelum mencetak.
                </p>
            </div>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0" data-aos="zoom-in" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Panduan
                    penggunaan
                    AmbilPaket.com?
                </h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Kirim paket dengan mudah melalui platform
                    AmbilPaket. Daftar sebagai pengirim, pilih agen terdekat, isi alamat penerima, dan lakukan pembayaran.
                    Paket akan diambil dan dikirim dengan aman dan cepat.
                </p>
            </div>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0" data-aos="fade-left" data-aos-duration="500">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Bagaimana
                    cara daftar
                    menjadi agen di AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Pertama-tama, klik tombol "Daftar," pilih opsi "Agen," isi formulir pendaftaran, pilih paket yang
                    sesuai, dan tunggu konfirmasi setelah verifikasi data untuk menjadi agen.
                </p>
            </div>
        </div>
    </section>
    {{-- END FAQ SECTION --}}
@endsection

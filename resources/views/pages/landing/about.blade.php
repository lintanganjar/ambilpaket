@extends('layouts.landing')
@section('content')
    {{-- HERO SECTION --}}
    <section class="bg-center bg-no-repeat bg-cover bg-blend-multiply"
        style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url('{{ asset('static/images/hero4.jpeg') }}');">

        <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left py-36 lg:py-48">
            <div class="hidden lg:block">
                <h1
                    class="mb-4 pt-44 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">
                    Apa itu <br> AmbilPaket?</h1>
                <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Platform
                    penjemputan dan pengiriman logistik yang berfokus pada
                    <br>
                    menyediakan layanan jemputan dan mengantarkan paket dengan <br> mudah, cepat, dan aman.
                </p>
                <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Platform
                    ini didirikan oleh sekelompok pakar logistik,
                    teknologi, dan <br> pelanggan yang berdedikasi untuk
                    membawa layanan jemputan <br> pengiriman ke tingkat selanjutnya. Kami memiliki visi untuk <br> membantu
                    pelanggan kami
                    mendapatkan layanan jemputan <br> pengiriman yang aman dan efisien dengan harga yang terjangkau.</p>
            </div>
            <div class="block lg:hidden">
                <h1
                    class="mb-4 pt-44 text-3xl md:text-4xl lg:text-5xl md:text-left font-extrabold tracking-tight leading-none text-white">
                    Apa itu AmbilPaket?</h1>
                <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left font-normal text-gray-300">Platform
                    penjemputan dan pengiriman logistik yang berfokus pada menyediakan layanan jemputan dan mengantarkan
                    paket dengan mudah, cepat, dan aman.
                </p>
                <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left font-normal text-gray-300">Platform
                    ini didirikan oleh sekelompok pakar logistik,
                    teknologi, dan pelanggan yang berdedikasi untuk
                    membawa layanan jemputan pengiriman ke tingkat selanjutnya. Kami memiliki visi untuk membantu
                    pelanggan kami
                    mendapatkan layanan jemputan pengiriman yang aman dan efisien dengan harga yang terjangkau.</p>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}

    <section class="bg-gray-100">
        <div
            class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-3 py-6 lg:py-16">
            <img class="hidden lg:block h-full object-cover rounded-lg items-end"
                src="{{ asset('static/images/about.png') }}" alt="office content 1">
            <div class="text-gray-900 sm:text-lg col-span-2">
                <h1
                    class="mb-4 mt-4 lg:mt-0 text-2xl md:text-4xl text-center lg:text-left font-extrabold tracking-tight text-gray-900">
                    Telusuri Lebih Jauh
                    Tentang AmbilPaket: Eksplorasi Seru Layanan Penuh Kejutan!
                </h1>
                <p class="mb-8 text-center text-sm md:text-base lg:text-left">Kami menyediakan layanan jemputan pengiriman
                    yang mudah
                    digunakan, dimana pelanggan dapat memesan layanan dengan mudah melalui aplikasi atau website kami. Kami
                    juga menyediakan layanan pengiriman dan pengemasan yang dapat disesuaikan untuk memastikan bahwa paket
                    sampai dengan aman dan tepat waktu.</p>
                <p class="mb-8 text-center text-sm md:text-base lg:text-left">Kami memiliki tim yang berdedikasi dan
                    berpengalaman
                    yang
                    selalu siap untuk membantu pelanggan kami apabila ada pertanyaan atau masalah. Kami memiliki pengalaman
                    dalam memberikan layanan jemputan pengiriman yang aman, efisien, dan dapat diandalkan.
                </p>
                <p class="mb-12 text-center text-sm md:text-base lg:text-left">Kami yakin bahwa layanan jemputan pengiriman
                    dapat
                    mengubah cara pelanggan mengirim dan menerima paket. AmbilPaket.com telah memiliki misi untuk membawa
                    layanan jemputan pengiriman ke tingkat selanjutnya dengan menyediakan layanan yang aman, cepat, dan
                    terjangkau.</p>
                <div class="flex flex-col space-y-4 mt-6 lg:justify-start sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="#"
                        class="inline-flex justify-center items-center py-2 lg:py-3 px-5 text-base font-normal text-center text-white rounded-lg bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-blue-300">
                        Daftar Sekarang!
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

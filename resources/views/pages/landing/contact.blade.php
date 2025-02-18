@extends('layouts.landing')
@section('content')
    {{-- HERO SECTION --}}
    <section class="bg-center bg-no-repeat bg-cover bg-blend-multiply"
        style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url('{{ asset('static/images/hero6.jpeg') }}');">

        <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left py-36 lg:py-48">
            <div class="hidden lg:block">
                <h1 class="mb-4 pt-44 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">Kami Senang Bertemu Orang <br>
                    Baru dan Membantu Mereka </h1>
                <p class="mb-36 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Saya selalu merasa sangat senang bertemu orang baru dan
                    memberikan <br> bantuan yang dibutuhkan. Memberikan dukungan dan berbagi pengetahuan <br> dengan orang lain
                    adalah hal
                    yang membuat saya bahagia dan memperkuat <br> rasa saling terhubung dalam komunitas.
                </p>
            </div>
            <div class="block lg:hidden">
                <h1 class="mb-4 pt-44 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">Kami Senang Bertemu Orang
                    Baru dan Membantu Mereka </h1>
                <p class="mb-36 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Saya selalu merasa sangat senang bertemu orang baru dan
                    memberikan bantuan yang dibutuhkan. Memberikan dukungan dan berbagi pengetahuan dengan orang lain
                    adalah hal
                    yang membuat saya bahagia dan memperkuat rasa saling terhubung dalam komunitas.
                </p>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}

    <section class="bg-gray-100 ">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 mx-auto lg:grid lg:grid-cols-2 py-6 lg:py-16">
            <div class="text-gray-900 sm:text-lg mb-8">
                <h1 class="mb-4 mt-4 lg:mt-0 text-2xl md:text-4xl text-left font-extrabold tracking-tight text-gray-900 ">Hubungi Kami!
                </h1>
                <div class="hidden lg:block">
                    <p class="mb-8 text-base font-normal text-gray-900">Apakah Anda memiliki pertanyaan tentang produk kami? <br>
                        Butuh bantuan dengan pemesanan atau pengiriman? <br> Atau apakah Anda tertarik untuk bekerja sama dengan
                        kami? <br> Jangan sungkan untuk menghubungi kami!</p>
                    <p class="mb-8 text-base font-normal text-gray-900">Jalan Raya Janti, Gang Arjuna Nomor 59 <br> Karangjambe,
                        Banguntapan, Bantul Regency</p>
                </div>
                <div class="block lg:hidden">
                    <p class="mb-8 text-base font-normal text-gray-900">Apakah Anda memiliki pertanyaan tentang produk kami?
                        Butuh bantuan dengan pemesanan atau pengiriman? Atau apakah Anda tertarik untuk bekerja sama dengan
                        kami? Jangan sungkan untuk menghubungi kami!</p>
                    <p class="mb-8 text-base font-normal text-gray-900">Jalan Raya Janti, Gang Arjuna Nomor 59 Karangjambe,
                        Banguntapan, Bantul Regency</p>
                </div>
                <a href="#" class="flex mb-2 text-base font-normal text-gray-900">
                    <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                    </svg>
                    +62 888776554
                </a>
                <a href="#" class="flex mb-2 text-base font-normal text-gray-900">
                    <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                    </svg>
                    info@yourdomain.com
                </a>
            </div>
            <div class="">
                <form action="">
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        </div>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  "
                            placeholder="Nama Lengkap">
                    </div>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        </div>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5   "
                            placeholder="Email">
                    </div>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        </div>
                        <input type="text" id=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5   "
                            placeholder="Nomor Handphone">
                    </div>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        </div>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  "
                            placeholder="Pesan"></textarea>
                    </div>
                    <button type="submit"
                        class="px-8 py-2.5 w-full lg:w-auto text-sm font-medium text-white bg-customprimary-500 rounded-lg border border-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:outline-none focus:ring-customprimary-300 ">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </section>
    <section class="bg-gray-100 ">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left py-6 lg:py-16">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.994470313487!2d110.4067929747659!3d-7.790408992229499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a575d56935b97%3A0x2083067682590692!2sSeven%20Inc.!5e0!3m2!1sen!2sid!4v1733793912777!5m2!1sen!2sid" 
                class="w-full h-[600px] border-0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>
    

@endsection

@extends('layouts.landing')
@section('content')
    {{-- HERO SECTION --}}
    <section class="bg-center bg-no-repeat bg-cover bg-blend-multiply"
        style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.3)), url('{{ asset('static/images/hero5.jpeg') }}');">

        <div class="px-6 md:px-12 lg:px-20 xl:px-36 w-full text-left py-48">
            <div class="hidden lg:block">
                <h1 class="mb-4 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">Bagaimana Kami Dapat <br>
                    Menginspirasi Hari <br> Anda?</h1>
                <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Jika Anda merasa bingung dan memiliki banyak pertanyaan, jangan
                    <br>
                    ragu untuk mengajukannya di sini! Tim AmbilPaket dengan senang <br> hati siap memberikan jawaban atas semua
                    pertanyaan Anda.
                </p>
            </div>
            <div class="block lg:hidden">
                <h1 class="mb-4 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none text-white">Bagaimana Kami Dapat
                    Menginspirasi Hari Anda?</h1>
                <p class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">Jika Anda merasa bingung dan memiliki banyak pertanyaan, jangan
                   
                    ragu untuk mengajukannya di sini! Tim AmbilPaket dengan senang hati siap memberikan jawaban atas semua
                    pertanyaan Anda.
                </p>
            </div>
        </div>

        <div class="absolute w-full top-96 py-32 lg:py-32">
            <div class="mx-6 md:mx-12 lg:mx-20 xl:mx-36 py-6 lg:py-20 bg-white rounded-xl ">
                <h1 class="mb-8 text-xl md:text-4xl lg:text-5xl text-center font-bold tracking-tight leading-none text-black">Temukan Pertanyaan Anda Disini!</h1>
                <form class="flex items-center mx-6 lg:mx-20">
                    <div class="flex w-full">
                        <label for="voice-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            </div>
                            <input type="text" id="voice-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  "
                                placeholder="Ketik pertanyaan anda" required />
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-6 ms-2 text-sm font-medium text-white bg-customprimary-500 rounded-lg border border-customprimary-700 hover:bg-customprimary-900 focus:ring-4 focus:outline-none focus:ring-customprimary-300 ">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}

    <section class="bg-gray-100 mt-12 lg:mt-32">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-8 py-8 mx-auto lg:gap-12 lg:grid lg:grid-cols-3 lg:py-16 items-start">
            <h1
                class="col-span-3 text-center text-2xl font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl mb-8">
                Paling Sering Ditanyakan
            </h1>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0">
                <h2 class="lg:mb-11 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Apa itu
                    AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Platform penjemputan dan pengiriman logistik yang berfokus pada menyediakan layanan jemputan dan
                    mengantarkan paket dengan mudah, cepat, dan aman.

                </p>
            </div>
            <div class="rounded-lg  flex flex-col mb-4 lg:mb-0">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Mengapa harus
                    menggunakan AmbilPaket.com?</h2>
                <p class="text-gray-500 text-sm lg:text-base text-left">
                    Dengan menggunakan jasa AmbilPaket kami, kamu akan merasa lebih aman dan terjamin dalam pengiriman
                    paket.

                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Apa saja keuntungan
                    pakai AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Kami menyediakan layanan pengiriman dengan asuransi sehingga paketmu akan terlindungi dengan baik.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Bagaimana mencetak
                    label atau resi?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Cara mencetak label atau resi adalah dengan menggunakan printer label, memastikan perangkat lunak
                    terinstal, lalu pilih opsi "Cetak" dan sesuaikan pengaturan sebelum mencetak.
                </p>
            </div>
            <div class="rounded-lg flex flex-col mb-4 lg:mb-0">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Panduan penggunaan
                    AmbilPaket.com?
                </h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Kirim paket dengan mudah melalui platform
                    AmbilPaket. Daftar sebagai pengirim, pilih agen terdekat, isi alamat penerima, dan lakukan pembayaran.
                    Paket akan diambil dan dikirim dengan aman dan cepat.
                </p>
            </div>
            <div class="rounded-lg   flex flex-col mb-4 lg:mb-0">
                <h2 class="lg:mb-3 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 ">Bagaimana cara daftar
                    menjadi agen di AmbilPaket.com?</h2>
                <p class="text-gray-500  text-sm lg:text-base text-left">
                    Pertama-tama, klik tombol "Daftar," pilih opsi "Agen," isi formulir pendaftaran, pilih paket yang
                    sesuai, dan tunggu konfirmasi setelah verifikasi data untuk menjadi agen.
                </p>
            </div>
        </div>
    </section>
@endsection

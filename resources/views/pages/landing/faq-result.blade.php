@extends('layouts.landing')
@section('content')
    <section class="bg-gradient-to-r from-[#FA523D] to-[#35383A] dark:bg-gray-900 mt-20">
        <div class="w-full px-6 md:px-12 lg:px-20 xl:px-36">
            <div class="py-20">
                <p class="mb-3 text-lg font-normal text-gray-300 lg:text-xl"><i>Temukan pertanyaan anda di sini!</i></p>
                <form class="flex items-center">
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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customprimary-500 focus:border-customprimary-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customprimary-500 dark:focus:border-customprimary-500"
                                placeholder="Ketik pertanyaan anda" required />
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-6 ms-2 text-sm font-medium text-white bg-customprimary-500 rounded-lg border border-customprimary-700 hover:bg-customprimary-900 focus:ring-4 focus:outline-none focus:ring-customprimary-300 dark:bg-customprimary-600 dark:hover:bg-customprimary-700 dark:focus:ring-customprimary-900">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="items-center px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-16 py-8 mx-auto lg:py-16">
            <div class="px-2 text-gray-900 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 mt-4 lg:mt-0 text-2xl md:text-4xl lg:text-left font-extrabold tracking-tight leading-none text-gray-900 dark:text-white">Bagaimana
                    cara daftar menjadi agen di AmbilPaket.com?</h2>
                <p class="mb-4 text-sm md:text-base lg:text-left text-gray-500">
                    Pertama-tama, klik tombol "Daftar," pilih opsi "Agen," isi formulir pendaftaran, pilih paket yang
                    sesuai, dan tunggu konfirmasi setelah verifikasi data untuk menjadi agen.</p>
            </div>
            <div class="bg-gray-200 p-6 flex flex-col lg:flex-row space-y-3 items-center justify-between rounded-lg mt-10">
                <div>
                    <p class="text-base lg:text-lg font-semibold text-gray-600">
                        Apakah artikel ini membantu?
                    </p>
                </div>
                <div class="flex space-x-2 lg:space-x-4">
                    <button
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-500 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Ya
                        <svg class="w-5 h-5 ml-1 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M15.03 9.684h3.965c.322 0 .64.08.925.232.286.153.532.374.717.645a2.109 2.109 0 0 1 .242 1.883l-2.36 7.201c-.288.814-.48 1.355-1.884 1.355-2.072 0-4.276-.677-6.157-1.256-.472-.145-.924-.284-1.348-.404h-.115V9.478a25.485 25.485 0 0 0 4.238-5.514 1.8 1.8 0 0 1 .901-.83 1.74 1.74 0 0 1 1.21-.048c.396.13.736.397.96.757.225.36.32.788.269 1.211l-1.562 4.63ZM4.177 10H7v8a2 2 0 1 1-4 0v-6.823C3 10.527 3.527 10 4.176 10Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-500 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Tidak
                        <svg class="w-5 h-5 ml-1 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8.97 14.316H5.004c-.322 0-.64-.08-.925-.232a2.022 2.022 0 0 1-.717-.645 2.108 2.108 0 0 1-.242-1.883l2.36-7.201C5.769 3.54 5.96 3 7.365 3c2.072 0 4.276.678 6.156 1.256.473.145.925.284 1.35.404h.114v9.862a25.485 25.485 0 0 0-4.238 5.514c-.197.376-.516.67-.901.83a1.74 1.74 0 0 1-1.21.048 1.79 1.79 0 0 1-.96-.757 1.867 1.867 0 0 1-.269-1.211l1.562-4.63ZM19.822 14H17V6a2 2 0 1 1 4 0v6.823c0 .65-.527 1.177-1.177 1.177Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            <hr class="h-px mt-16 bg-gray-400 border-0 dark:bg-gray-700">
        </div>
    </section>

    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="px-6 md:px-12 lg:px-20 xl:px-36 w-full gap-8 lg:gap-16 py-8 mx-auto grid lg:grid-cols-2 items-start">
            <h1
                class="col-span-2 text-left text-3xl font-semibold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">
                Artikel Terkait
            </h1>
            <div class="col-span-2 lg:col-span-1">
                <a href="#" class="rounded-lg dark:bg-gray-800 flex flex-col ">
                    <h2 class="mx-2 lg:mx-8 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bagaimana caranya agar
                        merchant dapat kembali melakukan order?</h2>
                </a>
            </div>
            <div class="col-span-2 lg:col-span-1">
                <a href="#" class="rounded-lg dark:bg-gray-800 flex flex-col ">
                    <h2 class="mx-2 lg:mx-8 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Adakah kemungkinan
                        merchant tidak dapat membuat order?</h2>
                </a>
            </div>
            <div class="col-span-2 lg:col-span-1">
                <a href="#" class="rounded-lg dark:bg-gray-800 flex flex-col ">
                    <h2 class="mx-2 lg:mx-8 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Apa perbedaan antara
                        postpaid merchant dan prepaid merchant ketika membuat order COD?</h2>
                </a>
            </div>
            <div class="col-span-2 lg:col-span-1">
                <a href="#" class="rounded-lg dark:bg-gray-800 flex flex-col ">
                    <h2 class="mx-2 lg:mx-8 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Apakah ada invoice yang
                        ditagihkan kepada merchant atas transaksi COD?</h2>
                </a>
            </div>

        </div>
    </section>
@endsection

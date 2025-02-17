@php
    $pricingOptions = [
        (object) [
            'id' => 1,
            'name' => 'Bronze',
            'price' => '10',
            'commision' => 5,
            'other_benefits' => [
                'Bisa buka di rumah',
                'Free komisi 5-10% dari nilai kirim',
                'Mempunyai online shop / rekan bisnis onine shop',
                'Gratis pick up barang',
                'Training konten penjualan',
                'Stempel & Brosur',
            ],
        ],
        (object) [
            'id' => 2,
            'name' => 'Gold',

            'price' => '30',
            'commision' => 10,
            'other_benefits' => [
                'Bisa buka di rumah',
                'Free komisi 5-10% dari nilai kirim',
                'Gratis pick up barang',
                'Training konten penjualan',
                'Stempel & Brosur',
                'Poster & Stiker',
                'Seragam (2)',
            ],
        ],
        (object) [
            'id' => 3,
            'name' => 'Platinum',
            'price' => '100',
            'commision' => 15,
            'other_benefits' => [
                'Bisa buka di rumah atau toko',
                'Free komisi 5-10% dari nilai kirim',
                'Gratis pick up barang',
                'Training konten penjualan',
                'Stempel & Brosur',
                'Poster & Stiker',
                'Seragam (2)',
            ],
        ],
        (object) [
            'id' => 4,
            'name' => 'Diamond',
            'price' => '100',
            'commision' => 20,
            'other_benefits' => [
                'Bisa buka di rumah atau toko',
                'Free komisi 20% dari nilai kirim',
                'Gratis pick up barang',
                'Training konten penjualan',
                'Stempel & Brosur',
                'Poster & Stiker',
                'Seragam (2)',
                'Meja pop up counter',
            ],
        ],
    ];
    $agen = (object) [
        'partnership_id' => (object) [
            'name' => 'Bronze',
        ],
    ];

    $partnerships = [
        (object) [
            'id' => 1,
            'name' => 'Partnership A',
            'partnership_transactions' => (object) [
                'request_status' => 'Pending',
                'payment_prof' => asset('static/images/products/apple-imac-1.png'),
            ],
            'payment_methods' => (object) [
                'bank_name' => 'Bank Rakyat Indonesia (BRI)',
            ],
            'agens' => (object) [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone_number' => '08123456789',
                'full_address' => 'Jl. Raya No. 12, Jakarta, Indonesia',
            ],
        ],
        (object) [
            'id' => 2,
            'name' => 'Partnership B',
            'partnership_transactions' => (object) [
                'request_status' => 'Completed',
                'payment_prof' => 'public/static/images/products/apple-imac-1.png',
            ],
            'payment_methods' => (object) [
                'bank_name' => 'Bank Mandiri',
            ],
            'agens' => (object) [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'phone_number' => '08234567890',
                'full_address' => 'Jl. Merdeka No. 45, Bandung, Indonesia',
            ],
        ],
    ];
@endphp

@extends('layouts.dashboard')
@section('content')
    <div class="py-4 ">

        <div class="flex justify-end p-4">
            <!-- Modal toggle -->
            <button data-modal-target="detail-riwayat-modal" data-modal-toggle="detail-riwayat-modal" type="button"
                class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-custompurple-500 border border-custompurple-500 rounded-lg hover:text-white hover:bg-custompurple-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                </svg>
                Riwayat Pemesanan
            </button>

            <!-- Main modal -->
            <div id="detail-riwayat-modal" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 z-50 items-center justify-center hidden  overflow-x-hidden overflow-y-auto top-20 lg:top-4 md:inset-0 h-modal sm:h-full">
                <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
                    <!-- Modal content -->
                    <div class="relative border dark:border-gray-600 bg-white rounded-lg shadow dark:bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Riwayat Pemesanan
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="detail-riwayat-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6 max-h-96 overflow-y-auto">

                            @include('pages.agen.paket-kemitraan.detail-riwayat')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 justify-center p-4 gap-6">
            @foreach ($pricingOptions as $option)
                <div
                    class="bg-white dark:bg-gray-700 shadow-lg rounded-lg border dark:border-gray-700 p-4 md:w-min-64 flex flex-col transition-all duration-500 hover:scale-105">
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-100">{{ $option->name }}</h3>
                    <p class="text-gray-800 dark:text-white font-bold text-4xl mt-4 ">
                        Rp{{ number_format($option->price, 0, ',', '.') }}
                    </p>

                    <ul class="mt-4 space-y-2 flex-grow">
                        @foreach ($option->other_benefits as $feature)
                            <li class="flex  text-sm items-center  text-gray-600 gap-3 dark:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" height="15" width="15"
                                    class="flex-shrink-0 dark:fill-[#F44336] fill-[#AD2113]" viewBox="0 0 448 512">
                                    <path
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>

                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>

                    <!-- Button at the bottom -->
                    <a href="{{ route('pembayaran') }}" id="upgrade-button">
                        <button
                            class="w-full py-2 mt-5 rounded-lg transition font-semibold
                            @if ($option->name == 'Gold') bg-gradient-to-r from-[#f8ed83] to-[#CFB53B] hover:from-[#CFB53B] hover:to-[#f8ed83]
                            @elseif($option->name == 'Platinum')
                                bg-gradient-to-r from-[#E5E2E4] to-[#5A5A5A] hover:from-[#5A5A5A] hover:to-[#E5E2E4]
                            @elseif($option->name == 'Bronze')
                                bg-gradient-to-r from-[#a0763c] to-[#ac8754] hover:from-[#ac8754] hover:to-[#a0763c]
                            @elseif($option->name == 'Diamond')
                                bg-gradient-to-r from-[#5CA9E9] to-[#022F40] hover:from-[#022F40] hover:to-[#5CA9E9]
                            @else
                                bg-blue-600 hover:bg-blue-700 @endif
                            text-white
                            @if ($agen->partnership_id->name == $option->name) cursor-not-allowed opacity-50 @endif"
                            data-id="{{ $option->id }}" data-name="{{ $option->name }}"
                            @if ($agen->partnership_id->name == $option->name) disabled @endif onclick="saveAndRedirect(event)">
                            @if ($agen->partnership_id->name == $option->name)
                                Paket Anda
                            @else
                                Upgrade ke {{ $option->name }}
                            @endif
                        </button>
                    </a>

                </div>
            @endforeach
        </div>


    </div>
@endsection

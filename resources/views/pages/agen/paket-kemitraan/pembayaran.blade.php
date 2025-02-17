@php

    $agens = (object) [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone_number' => '0813312345',
        'users' => (object) [
            'email' => 'John@gmail.com',
        ],
        'partnership_id' => (object) [
            'id' => 1,
            'name' => 'Bronze',
            'price' => '100000',
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
    ];

    $payment_method = [
        (object) [
            'id' => 1,
            'bank_name' => 'Bank Rakyat Indonesia (BRI)',
            'img' => '/static/images/BRI.png',
            'account_name' => 'Ambilpaket',
            'account_number' => '1132456',
        ],
        (object) [
            'id' => 2,
            'bank_name' => 'Mandiri',
            'img' => '/static/images/MANDIRI.png',
            'account_name' => 'Ambilpaket',
            'account_number' => '11234567',
        ],
        (object) [
            'id' => 3,
            'bank_name' => 'Bank Negara Indonesia (BNI)',
            'img' => '/static/images/BNI.png',
            'account_name' => 'Ambilpaket',
            'account_number' => '1233456',
        ],
        (object) [
            'id' => 4,
            'bank_name' => 'Bank Central Asia (BCA)',
            'img' => '/static/images/BCA.png',
            'account_name' => 'Ambilpaket',
            'account_number' => '1232134',
        ],
        (object) [
            'id' => 5,
            'bank_name' => 'Bank Tabungan Negara (BTN)',
            'img' => '/static/images/BTN.png',
            'account_name' => 'Ambilpaket',
            'account_number' => '1232134',
        ],
    ];

    $partnerships = (object) [
        'name' => 'Platinum',
        'price' => '2300000',
    ];
@endphp

@extends('layouts.dashboard')

@section('content')
    <div class="p-4 my-2 bg-white dark:bg-gray-800">
        <div class="mb-4 col-span-full xl:mb-2">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('paket-kemitraan') }}"
                                class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket
                                Kemitraan</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                aria-current="page">Pembayaran</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Ringkasan Pemesanan</h1>
        </div>

        <div class="flex justify-between overflow-x-auto my-10 space-x-2 md:space-x-5 lg:space-x-10 items-center">
            <div class="relative w-full rounded-lg shadow-md overflow-hidden p-6"
                style="background: linear-gradient(to right, 
                {{ $agens->partnership_id->name == 'Gold' ? '#B8860B' : ($agens->partnership_id->name == 'Platinum' ? '#444444' : ($agens->partnership_id->name == 'Diamond' ? '#4A84C4' : ($agens->partnership_id->name == 'Bronze' ? '#B17C54' : '#222222'))) }}, 
                {{ $agens->partnership_id->name == 'Gold' ? '#FFD700' : ($agens->partnership_id->name == 'Platinum' ? '#000000' : ($agens->partnership_id->name == 'Diamond' ? '#69aafa' : ($agens->partnership_id->name == 'Bronze' ? '#E6A368' : '#333333'))) }})">

                <!-- Wave Shape -->
                <div class="absolute inset-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-full"
                        preserveAspectRatio="none" viewBox="0 0 1440 320">
                        <path fill="
                        <?php
                        if ($agens->partnership_id->name == 'Gold') {
                            echo '#B8860B';
                        } elseif ($agens->partnership_id->name == 'Platinum') {
                            echo '#444444';
                        } elseif ($agens->partnership_id->name == 'Diamond') {
                            echo '#4A84C4';
                        } elseif ($agens->partnership_id->name == 'Bronze') {
                            echo '#B17C54';
                        }
                        ?>"
                            d="M0,96L48,106.7C96,117,192,139,288,138.7C384,139,480,117,576,122.7C672,128,768,160,864,176C960,192,1056,192,1152,160C1248,128,1344,64,1392,32L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>

                </div>

                <!-- Card Content -->
                <div class="relative z-10 text-center lg:text-left space-y-3 lg:space-y-0 text-white">
                    <p class="lg:text-xl mb-3 font-semibold text-gray-900 dark:text-white">Paket Kamu</p>
                    <div class="flex justify-between py-3">
                        <p class="lg:text-3xl text-base font-bold text-white">{{ $agens->partnership_id->name }}</p>
                    </div>
                    <div class="flex justify-between ">
                        <p class="lg:text-xl text-base font-semibold text-white">
                            Rp{{ number_format($agens->partnership_id->price, 0, ',', '.') }}</p>
                    </div>
                    <input type="hidden" name="package_name" value="{{ $agens->partnership_id->name }}">
                    <input type="hidden" name="package_price" value="{{ $agens->partnership_id->price }}">
                </div>
            </div>

            <svg class="w-24 h-28 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d=" M19 12H5m14 0-4 4m4-4-4-4" />
            </svg>

            <div class="relative w-full rounded-lg shadow-md overflow-hidden p-6"
                style="background: linear-gradient(to right, 
                {{ $partnerships->name == 'Gold' ? '#B8860B' : ($partnerships->name == 'Platinum' ? '#444444' : ($partnerships->name == 'Diamond' ? '#4A84C4' : ($partnerships->name == 'Bronze' ? '#B17C54' : '#222222'))) }}, 
                {{ $partnerships->name == 'Gold' ? '#FFD700' : ($partnerships->name == 'Platinum' ? '#000000' : ($partnerships->name == 'Diamond' ? '#69aafa' : ($partnerships->name == 'Bronze' ? '#E6A368' : '#333333'))) }})">

                <!-- Wave Shape -->
                <div class="absolute inset-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-full"
                        preserveAspectRatio="none" viewBox="0 0 1440 320">
                        <path fill="
                    <?php
                    if ($partnerships->name == 'Gold') {
                        echo '#B8860B';
                    } elseif ($partnerships->name == 'Platinum') {
                        echo '#444444';
                    } elseif ($partnerships->name == 'Diamond') {
                        echo '#4A84C4';
                    } elseif ($partnerships->name == 'Bronze') {
                        echo '#B17C54';
                    }
                    ?>"
                            d="M0,96L48,106.7C96,117,192,139,288,138.7C384,139,480,117,576,122.7C672,128,768,160,864,176C960,192,1056,192,1152,160C1248,128,1344,64,1392,32L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </div>

                <!-- Card Content -->
                <div class="relative z-10 text-center lg:text-left space-y-3 lg:space-y-0 text-white">
                    <p class="lg:text-xl mb-3 font-semibold text-gray-900 dark:text-white">Upgrade Paket</p>
                    <div class="flex justify-between py-3">
                        <p class="lg:text-3xl text-base font-bold text-white">{{ $partnerships->name }}</p>
                    </div>
                    <div class="flex justify-between ">
                        <p class="lg:text-xl text-base font-semibold text-white">
                            Rp{{ number_format($partnerships->price, 0, ',', '.') }}</p>
                    </div>
                    <input type="hidden" name="package_name" value="{{ $partnerships->name }}">
                    <input type="hidden" name="package_price" value="{{ $partnerships->price }}">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 lg:grid-cols-5 gap-4 my-9">
            @foreach ($payment_method as $item)
                <div class="border border-gray-300 rounded-md flex items-center justify-center p-4 cursor-pointer hover:border-customprimary-500 focus:border-customprimary-500 transition-all duration-200"
                    data-id="{{ $item->id }}" onclick="selectCard(this)">
                    <img src="{{ $item->img }}" alt="{{ $item->bank_name }}" class=" w-4/5">
                </div>
            @endforeach
        </div>
        <input type="hidden" id="selectedBank" name="selected_bank" value="">

        <div class="col-span-12 sm:col-full flex justify-end space-x-2">
            <a href="{{ route('detail-pembayaran') }}"><button type="button" id="submit-button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-green-500 border border-green-500 rounded-lg hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                    <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Submit
                </button>
            </a>
        </div>
    </div>


    <script>
        function selectCard(element) {

            document.querySelectorAll('.grid .border-customprimary-500').forEach(card => {
                card.classList.remove('border-customprimary-500', 'border-4');
                card.classList.add('border-gray-300');
            });

            element.classList.remove('border-gray-300');
            element.classList.add('border-4', 'border-customprimary-500');

            const selectedBankId = element.getAttribute('data-id');
            document.getElementById('selectedBank').value = selectedBankId;
        }
    </script>
@endsection

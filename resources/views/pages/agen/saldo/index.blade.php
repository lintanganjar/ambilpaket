@php
    $agens = (object) [
        'balance' => 2000000,
    ];
    $parcels = (object) [
        (object) [
            'resi_number' => '12345',
            'price' => 100000,
            'status' => 'Gagal',
            'parcel_estimation_date' => '2024-11-20',
            'payment_method_id' => 'bank_transfer',
        ],
        (object) [
            'resi_number' => '67890',
            'price' => 150000,
            'status' => 'Selesai',
            'parcel_estimation_date' => '2024-11-22',
            'payment_method_id' => 'credit_card',
        ],
    ];

    $top_up_transactions = (object) [
        (object) [
            'amount' => 50000,
            'request_status' => 'Sukses',
            'payment_proof' => 'https://example.com/payment1.jpg',
            'top_up_date' => '2024-11-19',
            'payment_method' => (object) [
                'bank_name' => 'BRI',
            ],
        ],
        (object) [
            'amount' => 200000,
            'request_status' => 'Pending',
            'payment_proof' => 'https://example.com/payment2.jpg',
            'top_up_date' => '2024-11-21',
            'payment_method' => (object) [
                'bank_name' => 'BRI',
            ],
        ],
    ];
@endphp
@extends('layouts.dashboard')
@section('content')
    <div class="p-4 bg-white block sm:flex items-center justify-between lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <nav class="flex " aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                        <a href="{{ route('saldo') }}"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">
                            Saldo</a>
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
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">List</span>
                    </div>
                </li>
            </ol>
        </nav>

    </div>
    <div class="p-4 pb-6 bg-white dark:bg-gray-800">
        <div
            class="p-4 flex justify-between rounded-md shadow-md  bg-white items-center  dark:bg-gray-700 ">
            <div class="space-y-3"> 
                <h2 class="font-semibold text-lg text-gray-900 dark:text-white">Saldo Anda</h2>
                <p class="text-2xl font-semibold text-gray-900 dark:text-white">
                    Rp{{ number_format($agens->balance, 0, ',', '.') }}</p>
            </div>
            <div>
                <a href="{{ route('topup-saldo') }}">
                    <button type="button"
                        class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-custompurple-500 border border-custompurple-500 rounded-lg hover:text-white hover:bg-custompurple-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8H5m12 0a1 1 0 0 1 1 1v2.6M17 8l-4-4M5 8a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.6M5 8l4-4 4 4m6 4h-4a2 2 0 1 0 0 4h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1Z" />
                        </svg>

                        Isi Saldo
                    </button>
                </a>
            </div>
        </div>

       
        <div
            class="p-4 pb-7 rounded-md w-full bg-white items-center shadow-md border-b border-gray-200 lg:mt-5 mt-4 dark:bg-gray-700 dark:border-gray-700">
            <p class="text-lg mt-1.5 mb-5 text-gray-900 dark:text-white font-semibold">Riwayat Transaksi</p>
            @if (!empty($parcels))
                <div class="lg:space-y-4 space-y-3  mb-4">
                    @foreach ($parcels as $item)
                        <div class="border-b flex items-start gap-4 p-4 rounded-lg bg-white w-full dark:bg-gray-700">
                            <img src="{{ asset('static/images/credit-card.svg') }}" alt="Top Up Image">
                            <div class="flex justify-between gap-4 w-full">
                                <div class="flex flex-col">
                                    <h2 class="text-sm lg:text-base font-semibold text-gray-900 dark:text-white">Pembayaran</h2>
                                    <p class="text-gray-500 dark:text-gray-300 text-xs lg:text-sm">{{ $item->resi_number }}</p>
                                    <p class="text-gray-500 dark:text-gray-300 text-xs lg:text-sm">{{ $item->parcel_estimation_date }}
                                    </p>
                                </div>
                                <div class="flex text-sm lg:text-base flex-col w-auto items-end">
                                    <p class="text-right text-gray-900 dark:text-white">-
                                        Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    <p
                                        class="font-semibold text-right
                                    @if ($item->status == 'Gagal') text-red-600 
                                    @elseif($item->status == 'Selesai') 
                                        text-green-600 
                                    @elseif($item->status == 'Dalam Perjalanan') 
                                        text-orange-500 @endif dark:text-white">
                                        {{ $item->status }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if (!empty($top_up_transactions))
                <div class="lg:space-y-4 space-y-3">
                    @foreach ($top_up_transactions as $item)
                        <div class="border-b flex items-start gap-4 p-4 rounded-lg bg-white w-full dark:bg-gray-700">
                            <img src="{{ asset('static/images/top-up.svg') }}" alt="Top Up Image">
                            <div class="flex justify-between gap-4 w-full">
                                <div>
                                    <h2 class="text-sm lg:text-base font-semibold text-gray-900 dark:text-white">Isi saldo</h2>
                                    <p class="text-gray-500 dark:text-gray-300 text-xs lg:text-sm">Transfer dari
                                        {{ $item->payment_method->bank_name }}</p>
                                    <p class="text-gray-500 dark:text-gray-300 text-xs lg:text-sm">{{ $item->top_up_date }}</p>
                                </div>
                                <div class="flex text-sm lg:text-base flex-col w-auto items-end">
                                    <p class="text-gray-900 dark:text-white">+
                                        Rp{{ number_format($item->amount, 0, ',', '.') }}</p>
                                    <p
                                        class="font-semibold 
                                    @if ($item->request_status == 'Ditolak') text-red-600 
                                    @elseif($item->request_status == 'Sukses') 
                                        text-green-600 
                                    @elseif($item->request_status == 'Pending') 
                                        text-orange-500 @endif dark:text-white">
                                        {{ $item->request_status }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection

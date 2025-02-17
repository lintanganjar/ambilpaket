@php
    $agens = (object) [
        'balance' => '100000',
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
@endphp
@extends('layouts.dashboard')
@section('content')
    <div class=" p-4 bg-white dark:bg-gray-800">
        <nav class="flex mb-5" aria-label="Breadcrumb">
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
                        <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Isi Saldo</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Isi Saldo
        </h1>

        <div
            class="py-6 rounded-md bg-white items-center   lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">

            <form action="{{ route('detail-topup-saldo') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2  mb-12">
                    <div class="space-y-2">
                        <label for="amount" class="text-base font-medium text-black dark:text-white ">Masukkan nominal
                            (Rp)</label>
                        <input type="text" id="amount"
                            class="block w-full border border-gray-300 h-16 text-xl dark:border-gray-600 rounded-md bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="Rp" oninput="updateTopUpAmount(); addPrefix(); formatAccounting();" required>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Saldo agen saat ini: Rp
                            {{ number_format($agens->balance, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 lg:grid-cols-5 gap-4 my-9">
                    @foreach ($payment_method as $item)
                        <div class="border border-gray-300 rounded-md flex items-center justify-center p-4 cursor-pointer hover:border-customprimary-500 transition-all duration-200"
                            data-id="{{ $item->id }}" onclick="selectCard(this)">
                            <img src="{{ $item->img }}" alt="{{ $item->bank_name }}" class=" w-4/5">
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="selectedBank" name="selected_bank" value="">

                <div class="border border-gray-300 rounded-md p-4">
                    <div class="flex justify-between">
                        <p class="text-base  text-black dark:text-white">Jumlah Top Up</p>
                        <p id="top-up-amount" class="text-lg overflow-x-auto font-semibold text-gray-800 dark:text-white">Rp0</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-base font-medium text-black dark:text-white">Total Bayar</p>
                        <p id="total-bayar" class="text-lg font-bold  overflow-x-auto text-gray-800 dark:text-white">Rp0</p>
                    </div>
                </div>
                <input type="hidden" id="top-up-amount-hidden" name="top_up_amount" value="">
                <div class="flex justify-end mt-8">
                    <a href="detail-topup-saldo">
                        <button type="button"
                            class=" inline-flex items-center px-3 py-2 text-sm font-medium text-center text-green-500 border border-green-500 rounded-lg hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-400 dark:hover:bg-green-500 dark:focus:ring-green-600">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Konfirmasi
                        </button>
                    </a>
                </div>
            </form>
        </div>

    </div>



    <script>
        function addPrefix() {
            const input = document.getElementById('amount');
            // Pastikan "Rp" selalu di awal dan hanya angka yang diizinkan setelahnya
            input.value = "Rp" + input.value.replace(/[^0-9]/g, '').replace(/^Rp/, '');
        };

        function selectCard(element) {
            // Hapus semua kartu yang memiliki border customprimary-500
            document.querySelectorAll('.grid .border-customprimary-500').forEach(card => {
                card.classList.remove('border-customprimary-500', 'border-4');
                card.classList.add('border-gray-300'); // Kembalikan ke border abu-abu default
            });

            // Tambahkan border customprimary-500 ke kartu yang diklik
            element.classList.remove('border-gray-300');
            element.classList.add('border-4', 'border-customprimary-500');

            // Set nilai ID bank yang dipilih ke input hidden
            const selectedBankId = element.getAttribute('data-id');
            document.getElementById('selectedBank').value = selectedBankId;
        }


        function formatAccounting() {
            const input = document.getElementById('amount');
            let value = input.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters

            // Format the number using Intl.NumberFormat
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            });
            value = value ? `Rp${formatter.format(value)}` : ''; // Add Rp prefix if value exists

            input.value = value; // Update the input value
        };

        function updateTopUpAmount() {
            const input = document.getElementById('amount').value;
            const numericValue = input.replace(/[^0-9]/g, '');

            // Perbarui elemen Jumlah Top Up
            document.getElementById('top-up-amount').textContent = numericValue ?
                `Rp${Intl.NumberFormat('id-ID').format(numericValue)}` :
                'Rp0';

            // Perbarui input hidden untuk jumlah top-up
            document.getElementById('top-up-amount-hidden').value = numericValue;

            calculateTotal();
        }

        function calculateTotal() {
            const input = document.getElementById('amount').value;
            const numericValue = parseInt(input.replace(/[^0-9]/g, ''), 10) || 0; // Konversi nilai input ke angka
            const totalBayarElement = document.getElementById('total-bayar');
            totalBayarElement.textContent = `Rp${Intl.NumberFormat('id-ID').format(numericValue)}`;
        }
    </script>
@endsection

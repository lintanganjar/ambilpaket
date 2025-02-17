@php
    // Data contoh untuk opsi paket
    $Data = (object) [
        'id' => 1,
        'name' => 'Bronze',
        'price' => '1000000',
        'commision' => 5,
        'other_benefits' => [
            'Bisa buka di rumah',
            'Free komisi 5-10% dari nilai kirim',
            'Mempunyai online shop / rekan bisnis onine shop',
            'Gratis pick up barang',
            'Training konten penjualan',
            'Stempel & Brosur',
        ],
    ];

    $agens = (object) [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone_number' => '0813312345',
        'users' => (object) [
            'email' => 'John@gmail.com',
        ],
    ];
    $payment = (object) [
        'id' => 1,
        'bank_name' => 'Bank Rakyat Indonesia (BRI)',
        'img' => '/static/images/bri.svg',
        'account_name' => 'Ambilpaket',
        'account_number' => '1132456',
    ];

    // Mendapatkan data berdasarkan ID yang diterima dari URL

@endphp
@extends('layouts.dashboard')
@section('content')
    <div class="p-4 bg-white dark:bg-gray-800">
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
                            <a href="{{ route('pembayaran') }}"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">
                            Pembayaran</a>
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
                                aria-current="page">Detail</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Ringkasan Pemesanan</h1>
        </div>
        <!-- Kontainer Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4">
            <!-- Ringkasan Pemesanan -->
            <div class="bg-white p-4 rounded-md shadow-md dark:bg-gray-700 dark:border-gray-600">
                
                <div class="border border-gray-300 bg-gray-100 dark:bg-gray-700 rounded-md p-2 space-y-2 my-5">
                    <p class="text-lg font-semibold text-black dark:text-white">Detail Pemesanan</p>
                    <p class="text-black font-medium dark:text-white">Paket {{ $Data->name }} -
                        Rp{{ number_format($Data->price, 0, ',', '.') }}</p>
                </div>
                <div class="border border-gray-300 bg-gray-100 dark:bg-gray-700 rounded-md p-2 space-y-2 my-4">
                    <p class="text-lg font-semibold text-black dark:text-white">Metode Pembayaran</p>
                    <p class="text-black font-medium dark:text-white">{{ $payment->bank_name }}</p>
                    <p class="text-black font-medium dark:text-white">{{ $payment->account_name }} -
                        {{ $payment->account_number }}</p>
                </div>
            </div>

            <!-- Form Upload -->
            <form action="">
                <div class="flex flex-col">
                    <!-- Area Upload -->
                    <div
                        class="bg-gray-50 dark:bg-gray-800 w-full text-center px-4 rounded flex flex-col items-center justify-center cursor-pointer border-2 border-gray-600 dark:border-gray-500 border-dashed mx-auto font-[sans-serif]">
                        <div class="py-6 flex flex-col justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-10 mb-2 fill-gray-800 dark:fill-gray-400 inline-block" viewBox="0 0 32 32">
                                <path
                                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z" />
                                <path
                                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" />
                            </svg>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Pilih file atau seret & letakkan
                                di sini</h4>
                            <p class="text-xs text-gray-400 mt-4">JPEG, PNG formats, up to 50MB</p>
                            <input type="file" id="uploadFile1" class="hidden" />
                            <label for="uploadFile1"
                                class="block w-32 m-7 px-5 text-center py-2.5 text-white rounded text-sm tracking-wider font-semibold border-none outline-none cursor-pointer bg-customprimary-500 hover:bg-customprimary-700">
                                Unggah File
                            </label>
                        </div>
                    </div>

                    <!-- Div untuk menampilkan nama dan ukuran file -->
                    <div id="file-container" class="bg-white shadow dark:bg-gray-700 flex justify-between p-2 my-3 hidden">
                        <p id="file-name" class="text-gray-900 dark:text-white"><span id="filename">-</span></p>
                        <p id="file-size" class="text-gray-900 dark:text-white text-sm"><span id="filesize">-</span></p>
                    </div>
                </div>
                <div class="col-span-12 sm:col-full mt-4 flex justify-end space-x-2">
                    <a href="{{ route('paket-kemitraan') }}"><button type="button" id="submit-button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-green-500 border border-green-500 rounded-lg hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Submit
                        </button></a>
                </div>
            </form>
        </div>
    </div>


    <script>
        const fileInput = document.getElementById('uploadFile1');
        const fileContainer = document.getElementById('file-container');
        const fileNameSpan = document.getElementById('filename');
        const fileSizeSpan = document.getElementById('filesize');

        // Add event listener to file input
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];

                // Masukkan nilai nama dan ukuran file ke dalam HTML
                fileNameSpan.textContent = file.name;
                fileSizeSpan.textContent = formatFileSize(file.size);

                // Tampilkan div file-container
                fileContainer.classList.remove('hidden');
            } else {
                // Sembunyikan jika tidak ada file yang diunggah
                fileContainer.classList.add('hidden');
                fileNameSpan.textContent = '-';
                fileSizeSpan.textContent = '-';
            }
        });

        // Fungsi untuk format ukuran file (bytes ke KB/MB)
        function formatFileSize(bytes) {
            const kb = 1024;
            const mb = kb * 1024;

            if (bytes >= mb) {
                return (bytes / mb).toFixed(2) + ' MB';
            } else {
                return (bytes / kb).toFixed(2) + ' KB';
            }
        }
        document.getElementById('submit-button').addEventListener('click', function () {
            const isDarkMode = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan disimpan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: isDarkMode ? '#16a34a' : '#34d399',
                cancelButtonColor: isDarkMode ? '#d33' : '#f87171',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: isDarkMode ? 'bg-gray-800 text-white' : '',
                    title: isDarkMode ? 'text-white' : '',
                    icon: isDarkMode ? 'text-yellow-400' : ''
                },
                background: isDarkMode ? '#1f2937' : '#ffffff',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data telah disimpan.',
                        icon: 'success',
                        confirmButtonColor: isDarkMode ? '#16a34a' : '#34d399',
                        customClass: {
                            popup: isDarkMode ? 'bg-gray-800 text-white' : '',
                            title: isDarkMode ? 'text-white' : '',
                            icon: isDarkMode ? 'text-green-400' : ''
                        },
                        background: isDarkMode ? '#1f2937' : '#ffffff',
                    }).then(() => {
                        document.querySelector('form').submit();
                    });
                }
            });
        });
    </script>
@endsection

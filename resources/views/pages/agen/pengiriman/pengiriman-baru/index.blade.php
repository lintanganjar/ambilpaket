@extends('layouts.dashboard')
@section('content')
    @php
        $regencies = (object) [
            (object) [
                'name' => 'Ponorogo',
            ],
            (object) [
                'name' => 'Madiun',
            ],
        ];
        $provinces = (object) [
            (object) [
                'name' => 'Jawa Timur',
            ],
            (object) [
                'name' => 'Jawa Tengah',
            ],
        ];
        $districts = (object) [
            (object) [
                'name' => 'Jawa Timur',
            ],
            (object) [
                'name' => 'Jawa Tengah',
            ],
        ];
        $serviceProviders = [
            (object) [
                'id' => 1,
                'name' => 'JNE',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
            (object) [
                'id' => 2,
                'name' => 'J&T',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
            (object) [
                'id' => 3,
                'name' => 'Ninja Express',
                'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
            ],
        ];

        $servicePrices = [
            (object) [
                'id' => 1,
                'service_type' => (object) [
                    'id' => 1,
                    'service_provider_id' => (object) [
                        'id' => 1,
                        'name' => 'Provider A',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type A1',
                    'note' => 'Description of Service Type A1',
                ],
                'price' => 100000,
                'origin_city' => 'City A',
                'destination_city' => 'City B',
            ],
            (object) [
                'id' => 2,
                'service_type' => (object) [
                    'id' => 2,
                    'service_provider_id' => (object) [
                        'id' => 1,
                        'name' => 'Provider A',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type A2',
                    'note' => 'Description of Service Type A2',
                ],
                'price' => 150000,
                'origin_city' => 'City A',
                'destination_city' => 'City C',
            ],
            (object) [
                'id' => 3,
                'service_type' => (object) [
                    'id' => 3,
                    'service_provider_id' => (object) [
                        'id' => 2,
                        'name' => 'Provider B',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type B1',
                    'note' => 'Description of Service Type B1',
                ],
                'price' => 120000,
                'origin_city' => 'City B',
                'destination_city' => 'City A',
            ],
            (object) [
                'id' => 4,
                'service_type' => (object) [
                    'id' => 4,
                    'service_provider_id' => (object) [
                        'id' => 2,
                        'name' => 'Provider B',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type B2',
                    'note' => 'Description of Service Type B2',
                ],
                'price' => 130000,
                'origin_city' => 'City B',
                'destination_city' => 'City D',
            ],
            (object) [
                'id' => 5,
                'service_type' => (object) [
                    'id' => 5,
                    'service_provider_id' => (object) [
                        'id' => 3,
                        'name' => 'Provider C',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type C1',
                    'note' => 'Description of Service Type C1',
                ],
                'price' => 140000,
                'origin_city' => 'City C',
                'destination_city' => 'City A',
            ],
        ];
    @endphp
    <div class="grid grid-cols-1 px-4 py-6 xl:grid-cols-3 bg-white xl:gap-4 dark:bg-gray-900">
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
                            <a href="{{ route('penjemputan.jadwal-penjemputan') }}"
                                class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Paket</a>
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
                                aria-current="page">Pengiriman</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Pengiriman Baru</h1>
        </div>

        <div class="col-span-full ">
            <form action="#" id="pengiriman-baru">
                <div class="col-span-3">
                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="flex space-x-5 mb-8 ">
                            <h3 class="text-xl font-semibold dark:text-white">Informasi Paket</h3>
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class=" text-sm font-medium text-center px-3 py-2 text-green-500 border border-green-500 rounded-md hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                                Input Resi
                            </button>


                        </div>

                        <div class="grid grid-cols-12 gap-4">
                            {{-- temp_parcels --}}


                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Item</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="item_name"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="item_name"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Item</label>
                                </div>
                            </div>
                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Deskirpsi Paket</h2>
                            </div>
                            <div class="lg:col-span-6 col-span-12">
                                <div class="relative">
                                    <select id="status_select"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Jenis Paket --</option>
                                        <option value="Barang">Barang</option>
                                        <option value="Dokumen">Dokumen</option>
                                    </select>
                                    <label for="item_type"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Jenis
                                        Paket</label>
                                </div>
                            </div>

                            <div class="lg:col-span-4 col-span-12">
                                <div class="relative">
                                    <input type="text" id="amount"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="amount"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Jumlah</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Dimensi</h2>
                            </div>
                            <div class="lg:col-span-2 col-span-12">
                                <div class="relative">
                                    <input type="text" id="weight"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="weight"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Berat</label>
                                </div>
                            </div>

                            <div class="lg:col-span-3 col-span-12">
                                <div class="relative">
                                    <input type="text" id="item_height"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="item_height"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tinggi</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12">
                                <div class="relative">
                                    <input type="text" id="item_width"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="item_width"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Lebar</label>
                                </div>
                            </div>

                            <div class="lg:col-span-3 col-span-12">
                                <div class="relative">
                                    <input type="text" id="item_lenght"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="item_lenght"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Panjang</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Harga</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="price"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="price"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Harga
                                        Per-item</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Catatan</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="note"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="note"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Catatan</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Estimasi</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="estimation_date"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="estimation_date"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Estimasi
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Penerima</h3>
                        <div class="grid grid-cols-12 gap-4">
                            {{-- temp_parcel_recievers --}}

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Penerima</h2>
                            </div>
                            <div class="lg:col-span-5 col-span-12">
                                <div class="relative">
                                    <input type="text" id="reciever_first_name"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="reciever_first_name"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Depan</label>
                                </div>
                            </div>
                            <div class="lg:col-span-5 col-span-12">
                                <div class="relative">
                                    <input type="text" id="reciever_last_name"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="reciever_last_name"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Belakang</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Provinsi</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="reciever_province_id"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Pilih Provinsi --</option>
                                        @foreach ($provinces as $province)
                                            <option value="">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reciever_province_id"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Provinsi</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kabupaten</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="reciever_regency_id"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Pilih Kabupaten --</option>
                                        @foreach ($regencies as $regency)
                                            <option value="">{{ $regency->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reciever_regency_id"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kabupaten</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kecamatan</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="reciever_district_id"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Pilih Kecamatan --</option>
                                        @foreach ($districts as $district)
                                            <option value="">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reciever_district_id"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kecamatan</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Alamat</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="reciever_full_address"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="reciever_full_address"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Alamat
                                        Lengkap</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kode Pos</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="reciever_postal_code"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="reciever_postal_code"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kode
                                        Pos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Pengirim</h3>
                        {{-- temp_parcel_senders --}}
                        <div class="grid grid-cols-12 gap-4">
                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Pengirim</h2>
                            </div>
                            <div class="lg:col-span-5 col-span-12">
                                <div class="relative">
                                    <input type="text" id="sender_first_name"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="sender_first_name"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Depan</label>
                                </div>
                            </div>
                            <div class="lg:col-span-5 col-span-12">
                                <div class="relative">
                                    <input type="text" id="sender_last_name"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="sender_last_name"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Belakang</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Provinsi</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="reciever_province_id"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Pilih Provinsi --</option>
                                        @foreach ($provinces as $province)
                                            <option value="">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reciever_province_id"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Provinsi</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kabupaten</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="reciever_regency_id"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Pilih Kabupaten --</option>
                                        @foreach ($regencies as $regency)
                                            <option value="">{{ $regency->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reciever_regency_id"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kabupaten</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kecamatan</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="reciever_district_id"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""disabled selected>-- Pilih Kecamatan --</option>
                                        @foreach ($districts as $district)
                                            <option value="">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reciever_district_id"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kecamatan</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Alamat</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="sender_full_address"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="sender_full_address"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Alamat
                                        Lengkap</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kode Pos</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="sender_postal_code"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for="sender_postal_code"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kode
                                        Pos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-6 text-xl font-semibold dark:text-white">Pengiriman</h3>


                        <div class="flex mb-6">
                            <div class="flex items-center me-8">
                                <svg class="w-6 h-6 mr-2 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1"
                                        d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                                </svg>
                                <div class="text-sm font-semibold dark:text-white">Pilihan Kurir</div>
                            </div>

                            <!-- Loop untuk service_providers -->
                            @foreach ($serviceProviders as $provider)
                                <div class="flex items-center me-4">
                                    <input id="provider-{{ $provider->id }}" type="checkbox" value="{{ $provider->id }}"
                                        class="w-4 h-4 text-customprimary-500 bg-gray-100 border-gray-300 rounded focus:ring-customprimary-500 dark:focus:ring-customprimary-500 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="provider-{{ $provider->id }}"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ $provider->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>


                        <div class="lg:mx-16 mx-5">
                            <div class="w-full flex justify-center">
                                <div class="text-center flex-grow">
                                    <p class="text-sm font-semibold dark:text-white">Kurir</p>
                                </div>
                                <div class="text-center flex-grow h-">
                                    <p class="text-sm font-semibold dark:text-white">Jenis Layanan</p>
                                </div>
                                <div class="text-center flex-grow">
                                    <p class="text-sm font-semibold dark:text-white">Tarif</p>
                                </div>
                            </div>

                            <hr class="h-px mx-4 sm:mx-1 my-1 bg-gray-700 border-0 dark:bg-gray-700">
                            <ul class="mt-8 grid w-full gap-2">
                                @foreach ($servicePrices as $servicePrice)
                                    <li>
                                        <input type="radio" id="service-{{ $servicePrice->id }}" name="hosting"
                                            value="hosting-{{ $servicePrice->id }}" class="hidden peer" required />
                                        <label for="service-{{ $servicePrice->id }}"
                                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-customprimary-500 peer-checked:border-2 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="flex justify-between w-full items-center">
                                                <!-- Bagian logo provider -->
                                                <div class="flex flex-col justify-center items-center flex-grow">
                                                    <img src="{{ $servicePrice->service_type->service_provider_id->logo }}"
                                                        alt="{{ $servicePrice->service_type->service_provider_id->name }}"
                                                        class="w-12 h-12 mb-2" />
                                                    <span
                                                        class="px-2 py-1 w-24 h-6 text-xs font-semibold leading-tight text-white bg-customprimary-500 rounded-full flex items-center justify-center">
                                                        {{ $servicePrice->service_type->service_provider_id->name }}
                                                    </span>
                                                </div>

                                                <!-- Nama layanan di tengah -->
                                                <div class="flex justify-center items-center text-left flex-grow">
                                                    <div class="w-full text-sm font-semibold">
                                                        {{ $servicePrice->service_type->name . ' - ' . $servicePrice->service_type->note }}
                                                    </div>
                                                </div>

                                                <!-- Harga layanan di tengah -->
                                                <div class="flex justify-center items-center text-center flex-grow">
                                                    <div class="w-full text-sm font-semibold">Rp.
                                                        {{ number_format($servicePrice->price, 0, ',', '.') }}</div>
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>

                        </div>


                    </div>
                </div>
                <div class="col-span-12 sm:col-full flex justify-end space-x-2">
                    <button type="submit" id="submit-button"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-green-500 border border-green-500 rounded-lg hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full h-full max-w-3xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Masukkan Nomor Resi
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-14 space-y-4">
                    <form action="">
                        <div class="lg:col-span-10 col-span-12">
                            <div class="relative">
                                <input type="text" id="resi_number"
                                    class="block px-3 pb-2 pt-3 w-full text-lg text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                    value="" placeholder=" " />
                                <label for="resi_number"
                                    class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                                    Resi</label>
                            </div>
                        </div>
                    </form>
                    <!-- Modal footer -->
                </div>
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-primary-700 border border-primary-700 rounded-lg hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('submit-button').addEventListener('click', function () {
            const isDarkMode = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: 'Apakah Data Sudah Benar?',
                text: "Data akan dikirim!",
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

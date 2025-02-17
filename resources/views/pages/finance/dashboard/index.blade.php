@php
    $dataList = [
        (object) [
            'id' => 1,
            'resi_number' => 'ABC123456',
            'actual_resi_number' => 'XYZ123456',
            'agen_id' => (object) [
                'id' => (object) [
                    'agen_id' => 1,
                    'into_partnership_id' => (object) [
                        'name' => 'Bronze',
                        'price' => '1200000',
                    ],
                ],
                'first_name' => 'Agung',
                'last_name' => 'Basalamah',
            ],
            'customer_id' => 20,
            'customer_umkm_id' => 30,
            'price' => 50000,
            'agen_commission' => 5000,
            'item_type' => 'Barang',
            'item_name' => 'Sepatu lari',
            'amount' => 1,
            'weight' => '2kg',
            'item_height' => '30cm',
            'item_width' => '20cm',
            'item_lenght' => '10cm',
            'note' => 'Handle with care',
            'service_price_id' => (object) [
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
            'estimation_date' => '2024-12-20',
            'proof_img' => '/images/proof1.jpg',
            'status' => 'berhasil',
        ],
        (object) [
            'id' => 2,
            'resi_number' => 'DEF654321',
            'actual_resi_number' => 'UVW654321',
            'agen_id' => (object) [
                'id' => (object) [
                    'agen_id' => 2,
                    'into_partnership_id' => (object) [
                        'name' => 'Bronze',
                        'price' => '1200000',
                    ],
                ],
                'first_name' => 'Agung',
                'last_name' => 'Basalamah',
            ],
            'customer_id' => 21,
            'customer_umkm_id' => null,
            'price' => 75000,
            'agen_commission' => 7500,
            'item_type' => 'Barang',
            'item_name' => 'Kacamata renang',
            'amount' => 2,
            'weight' => '1.5kg',
            'item_height' => '15cm',
            'item_width' => '15cm',
            'item_lenght' => '15cm',
            'note' => 'Fragile - do not drop',
            'service_price_id' => (object) [
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
            'estimation_date' => '2024-12-21',
            'proof_img' => '/images/proof2.jpg',
            'status' => 'gagal',
        ],
        (object) [
            'id' => 3,
            'resi_number' => 'GHI789012',
            'actual_resi_number' => 'RST789012',
            'agen_id' => (object) [
                'id' => (object) [
                    'agen_id' => 3,
                    'into_partnership_id' => (object) [
                        'name' => 'Bronze',
                        'price' => '1200000',
                    ],
                ],
                'first_name' => 'Agung',
                'last_name' => 'Basalamah',
            ],
            'customer_id' => null,
            'customer_umkm_id' => 32,
            'price' => 60000,
            'agen_commission' => 6000,
            'item_type' => 'Dokumen',
            'item_name' => 'Akta kelahiran',
            'amount' => 3,
            'weight' => '4kg',
            'item_height' => '40cm',
            'item_width' => '30cm',
            'item_lenght' => '10cm',
            'note' => 'Pack securely',
            'service_price_id' => (object) [
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
            'estimation_date' => '2024-12-22',
            'proof_img' => '/images/proof3.jpg',
            'status' => 'berhasil',
        ],
    ];
@endphp
@php
    $dataList = [
        (object) [
            'id' => 1,
            'resi_number' => 'ABC123456',
            'actual_resi_number' => 'XYZ123456',
            'agen_id' => (object) [
                'id' => (object) [
                    'agen_id' => 1,
                    'into_partnership_id' => (object) [
                        'name' => 'Bronze',
                        'price' => '1200000',
                    ],
                ],
                'first_name' => 'Agung',
                'last_name' => 'Basalamah',
            ],
            'customer_id' => 20,
            'customer_umkm_id' => 30,
            'price' => 50000,
            'agen_commission' => 5000,
            'item_type' => 'Barang',
            'item_name' => 'Sepatu lari',
            'amount' => 1,
            'weight' => '2kg',
            'item_height' => '30cm',
            'item_width' => '20cm',
            'item_lenght' => '10cm',
            'note' => 'Handle with care',
            'service_price_id' => (object) [
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
            'estimation_date' => '2024-12-20',
            'proof_img' => '/images/proof1.jpg',
            'status' => 'berhasil',
        ],
        (object) [
            'id' => 2,
            'resi_number' => 'DEF654321',
            'actual_resi_number' => 'UVW654321',
            'agen_id' => (object) [
                'id' => (object) [
                    'agen_id' => 2,
                    'into_partnership_id' => (object) [
                        'name' => 'Bronze',
                        'price' => '1200000',
                    ],
                ],
                'first_name' => 'Agung',
                'last_name' => 'Basalamah',
            ],
            'customer_id' => 21,
            'customer_umkm_id' => null,
            'price' => 75000,
            'agen_commission' => 7500,
            'item_type' => 'Barang',
            'item_name' => 'Kacamata renang',
            'amount' => 2,
            'weight' => '1.5kg',
            'item_height' => '15cm',
            'item_width' => '15cm',
            'item_lenght' => '15cm',
            'note' => 'Fragile - do not drop',
            'service_price_id' => (object) [
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
            'estimation_date' => '2024-12-21',
            'proof_img' => '/images/proof2.jpg',
            'status' => 'gagal',
        ],
        (object) [
            'id' => 3,
            'resi_number' => 'GHI789012',
            'actual_resi_number' => 'RST789012',
            'agen_id' => (object) [
                'id' => (object) [
                    'agen_id' => 3,
                    'into_partnership_id' => (object) [
                        'name' => 'Bronze',
                        'price' => '1200000',
                    ],
                ],
                'first_name' => 'Agung',
                'last_name' => 'Basalamah',
            ],
            'customer_id' => null,
            'customer_umkm_id' => 32,
            'price' => 60000,
            'agen_commission' => 6000,
            'item_type' => 'Dokumen',
            'item_name' => 'Akta kelahiran',
            'amount' => 3,
            'weight' => '4kg',
            'item_height' => '40cm',
            'item_width' => '30cm',
            'item_lenght' => '10cm',
            'note' => 'Pack securely',
            'service_price_id' => (object) [
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
            'estimation_date' => '2024-12-22',
            'proof_img' => '/images/proof3.jpg',
            'status' => 'berhasil',
        ],
    ];
@endphp
@extends('layouts.dashboard')
@section('content')
    <div class="mx-4">

        {{-- CARD --}}

        {{-- CARD --}}
        <div class="grid w-full grid-cols-1 gap-4 mt-4 lg:grid-cols-2">
            <div
                class="flex flex-col items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
               
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-white uppercase">Uang Masuk</h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">Rp{{ number_format(300000, 0, ',', '.') }}</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Data Juni 29 Des 2024</p>
                </div>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="mdi:cash-plus" data-inline="false"></span>
                </span>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="mdi:cash-plus" data-inline="false"></span>
                </span>
            </div>
            <div
                class="flex flex-col items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
              
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-white uppercase">Uang Keluar</h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">Rp{{ number_format(300000, 0, ',', '.') }}</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">Data Juni 29 Des 2024</p>
                </div>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="mdi:cash-minus" data-inline="false"></span>
                </span>
            </div>
        </div>

        {{-- GRAFIK --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4 h-80">
            <div class="bg-white shadow-md p-4 rounded-xl dark:bg-gray-800 border dark:border-gray-700 dark:text-gray-100 h-full">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="bg-white shadow-md p-4 rounded-xl dark:bg-gray-800 border dark:border-gray-700 dark:text-gray-100 h-full">
                <canvas id="lineChart2"></canvas>
            </div>
        </div>


        {{-- TABEL --}}
        <div
            class="p-4  mt-20 lg:mt-4 bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Uang Masuk</h3>
                </div>
               
            </div>
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Agen
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Kemitraan
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Nominal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    @foreach ($dataList as $index => $data)
                                    <tr class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">
                                            <td
                                                class="p-4 py-2 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-50">
                                                {{ $data->agen_id->first_name . ' ' . $data->agen_id->last_name }}
                                            </td>
                                            <td
                                                class="p-4 py-2 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-50">
                                                {{ $data->agen_id->id->into_partnership_id->name}}
                                            </td>
                                            <td
                  q                              class="p-4 py-2 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-400">
                                                {{ $data->updated_at ?? 'N/A' }}
                                            </td>
                                            <td
                                                class="p-4 py-2 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-50">
                                                + Rp{{ number_format($data->agen_id->id->into_partnership_id->price, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="p-4 my-4 bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Uang Keluar</h3>
                </div>
              
            </div>
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Resi
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Agen
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Paket
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-white">
                                            Jumlah
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-white">
                                            Pengiriman
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Nominal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    @foreach ($dataList as $index => $data)
                                    <tr class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">

                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-100">
                                                {{ $data->resi_number }}
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-100">
                                                {{ $data->agen_id->first_name . ' ' . $data->agen_id->last_name }}
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                {{ $data->item_type }} - {{ $data->item_name }}
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm text-center font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                {{ $data->amount }}
                                            </td>
                                            <td
                                                class="p-4 py-1 flex items-center justify-center text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-400">
                                                <img src="{{ $data->service_price_id->service_type->service_provider_id->logo }}"
                                                    alt="{{ $data->service_price_id->service_type->service_provider_id->name }}"
                                                    class="w-12 h-12 me-2" />
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-100">
                                                {{ $data->updated_at ?? 'N/A' }}
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-100">
                                                - Rp{{ number_format($data->service_price_id->price, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Konfigurasi untuk Grafik Paket Terkirim
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            const lineChartData1 = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [1000000, 1500000, 1300000, 1100000, 2000000, 1800000, 1600000, 1000000, 1500000, 1300000, 1100000, 2000000],
                    borderColor: '#AD2113',
                    backgroundColor: 'rgba(173, 33, 19, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
            const formatCurrency = (value) => {
                if (value >= 1000000) {
                    return (value / 1000000).toFixed(1) + ' jt';
                } else if (value >= 1000) {
                    return (value / 1000).toFixed(1) + ' rb';
                } else {
                    return value.toLocaleString();
                }
            };
            const isDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const lineChart1 = new Chart(ctxLine, {
                type: 'line',
                data: lineChartData1,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    size: 14,
                                     color: isDarkMode ? '#F3F4F6' : '#000'
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Pendapatan (Rp)',
                                font: {
                                    size: 14,
                                     color: isDarkMode ? '#F3F4F6' : '#000'
                                }
                            },
                            ticks: {
                                beginAtZero: true,
                                callback: function (value) {
                                    return formatCurrency(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'UANG MASUK'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Pendapatan: ' + formatCurrency(tooltipItem.raw);
                                }
                            }
                        }
                    }
                }
            });
    
            // Konfigurasi untuk Grafik Pendapatan
            const ctxLine2 = document.getElementById('lineChart2').getContext('2d');
            const lineChartData2 = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [1000000, 1500000, 1300000, 1100000, 2000000, 1800000, 1600000, 1000000, 1500000, 1300000, 1100000, 2000000],
                    borderColor: '#AD2113',
                    backgroundColor: 'rgba(173, 33, 19, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
    
       
            const lineChart2 = new Chart(ctxLine2, {
                type: 'line',
                data: lineChartData2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Pendapatan (Rp)',
                                font: {
                                    size: 14
                                }
                            },
                            ticks: {
                                beginAtZero: true,
                                callback: function (value) {
                                    return formatCurrency(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'UANG KELUAR'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Pendapatan: ' + formatCurrency(tooltipItem.raw);
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Konfigurasi untuk Grafik Paket Terkirim
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            const lineChartData1 = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [1000000, 1500000, 1300000, 1100000, 2000000, 1800000, 1600000, 1000000, 1500000, 1300000, 1100000, 2000000],
                    borderColor: '#AD2113',
                    backgroundColor: 'rgba(173, 33, 19, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
            const formatCurrency = (value) => {
                if (value >= 1000000) {
                    return (value / 1000000).toFixed(1) + ' jt';
                } else if (value >= 1000) {
                    return (value / 1000).toFixed(1) + ' rb';
                } else {
                    return value.toLocaleString();
                }
            };
            const isDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const lineChart1 = new Chart(ctxLine, {
                type: 'line',
                data: lineChartData1,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    size: 14,
                                     color: isDarkMode ? '#F3F4F6' : '#000'
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Pendapatan (Rp)',
                                font: {
                                    size: 14,
                                     color: isDarkMode ? '#F3F4F6' : '#000'
                                }
                            },
                            ticks: {
                                beginAtZero: true,
                                callback: function (value) {
                                    return formatCurrency(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'UANG MASUK'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Pendapatan: ' + formatCurrency(tooltipItem.raw);
                                }
                            }
                        }
                    }
                }
            });
    
            // Konfigurasi untuk Grafik Pendapatan
            const ctxLine2 = document.getElementById('lineChart2').getContext('2d');
            const lineChartData2 = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                    label: 'Pendapatan',
                    data: [1000000, 1500000, 1300000, 1100000, 2000000, 1800000, 1600000, 1000000, 1500000, 1300000, 1100000, 2000000],
                    borderColor: '#AD2113',
                    backgroundColor: 'rgba(173, 33, 19, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };
    
       
            const lineChart2 = new Chart(ctxLine2, {
                type: 'line',
                data: lineChartData2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Bulan',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Pendapatan (Rp)',
                                font: {
                                    size: 14
                                }
                            },
                            ticks: {
                                beginAtZero: true,
                                callback: function (value) {
                                    return formatCurrency(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'UANG KELUAR'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Pendapatan: ' + formatCurrency(tooltipItem.raw);
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection


@php
    $data = (object) [
        'partnership_id' => (object) [
            'name' => 'Diamond',
        ],
        'balance' => '1300000',
    ];

    $customer_umkms = [
        (object) [
            'company_name' => 'John Bakery',
            'days_of_pickup' => ['Senin', 'Selasa', 'Rabu'],
            'time_of_pickup' => '10:00',
        ],
        (object) [
            'company_name' => 'John Doe Bakery',
            'days_of_pickup' => ['Kamis', 'Jumat', 'Sabtu'],
            'time_of_pickup' => '10:00',
        ],
    ];

    $parcels = [
        (object) [
            'id' => 1,
            'resi_number' => '12345',
            'customer_umkm_id' => (object) [
                'company_name' => 'John Bakery',
            ],
            'service_price_id' => (object) [
                'price' => 100000,
                'service_type_id' => (object) [
                    'name' => 'Reguler',
                    'service_provider_id' => (object) [
                        'name' => 'JNT',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                ],
            ],
            'status' => 'Gagal',
            'create_at' => '2024-11-20',
            'item_type' => 'Barang',
        ],
        (object) [
            'id' => 2,
            'resi_number' => '67890',
            'customer_umkm_id' => (object) [
                'company_name' => 'John Bakery',
            ],
            'service_price_id' => (object) [
                'price' => 150000,
                'service_type_id' => (object) [
                    'name' => 'Reguler',
                    'service_provider_id' => (object) [
                        'name' => 'JNT',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                ],
            ],
            'status' => 'Selesai',
            'create_at' => '2024-11-22',
            'item_type' => 'Dokumen',
        ],
    ];
@endphp

@extends('layouts.dashboard')
@section('content')
    <div class="mx-4">

        {{-- CARD --}}
        <div class="grid w-full grid-cols-1 gap-4 mt-4 lg:grid-cols-3">

            {{-- CARD 1 --}}
            <div class="relative w-full rounded-lg shadow-md overflow-hidden p-6"
                style="background: linear-gradient(to right, 
                {{ $data->partnership_id->name == 'Gold' ? '#B8860B' : ($data->partnership_id->name == 'Platinum' ? '#444444' : ($data->partnership_id->name == 'Diamond' ? '#4A84C4' : ($data->partnership_id->name == 'Bronze' ? '#B17C54' : '#222222'))) }}, 
                {{ $data->partnership_id->name == 'Gold' ? '#FFD700' : ($data->partnership_id->name == 'Platinum' ? '#000000' : ($data->partnership_id->name == 'Diamond' ? '#69aafa' : ($data->partnership_id->name == 'Bronze' ? '#E6A368' : '#333333'))) }})">

                <!-- Wave Shape -->
                <div class="absolute inset-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-full" preserveAspectRatio="none"
                        viewBox="0 0 1440 320">
                        <path fill="
                            <?php
                            if ($data->partnership_id->name == 'Gold') {
                                echo '#B8860B';
                            } elseif ($data->partnership_id->name == 'Platinum') {
                                echo '#444444';
                            } elseif ($data->partnership_id->name == 'Diamond') {
                                echo '#4A84C4';
                            } elseif ($data->partnership_id->name == 'Bronze') {
                                echo '#B17C54';
                            }
                            ?>"
                            d="M0,96L48,106.7C96,117,192,139,288,138.7C384,139,480,117,576,122.7C672,128,768,160,864,176C960,192,1056,192,1152,160C1248,128,1344,64,1392,32L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>

                </div>

                <!-- Card Content -->
                <div class="relative z-10 text-center lg:text-left space-y-3 lg:space-y-0 text-white">
                    <h2 class="text-lg font-semibold">KEMITRAAN</h2>
                    <p class="2xl:text-4xl md:text-2xl text-xl font-bold mt-2.5">{{ $data->partnership_id->name }}</p>
                    <p class="text-sm mt-1">Data 29 June 2024</p>
                </div>

            </div>

            {{-- CARD 2 --}}
            <div
                class="flex flex-col items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-gray-400 uppercase">Paket Terkirim
                    </h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">460</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Data 29 June 2024</p>
                </div>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="carbon:delivery-parcel" data-inline="false"></span>
                </span>

            </div>

            {{-- CARD 3 --}}
            <div
                class="flex flex-col  justify-between p-4 bg-white border items-center border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">

                <div class="w-full sm:w-1/2 text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-gray-400 uppercase">Saldo</h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">Rp{{ number_format($data->balance, 0, ',', '.') }}</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Data 29 June 2024</p>
                </div>

                <div class="flex flex-col items-center my-3 lg:my-0 sm:items-end">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('topup-saldo') }}">
                            <button type="button"
                                class="inline-flex items-center px-2 py-1.5 text-sm font-medium text-center text-custompurple-500 border border-custompurple-500 rounded-lg hover:text-white hover:bg-custompurple-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="26" height="26" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 8H5m12 0a1 1 0 0 1 1 1v2.6M17 8l-4-4M5 8a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.6M5 8l4-4 4 4m6 4h-4a2 2 0 1 0 0 4h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1Z" />
                                </svg>
                                Isi Saldo
                            </button>
                        </a>
                       
                    </div>
                    

                </div>
            </div>
        </div>

        {{-- GRAFIK --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4  lg:mb-1 mt-5 lg:mt-4 ">
            <div class="bg-white shadow-md p-4 rounded-xl dark:bg-gray-800 border dark:border-gray-700 dark:text-gray-100 h-80">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="bg-white shadow-md p-4 rounded-xl dark:bg-gray-800 border dark:border-gray-700 dark:text-gray-100 h-80">
                <canvas id="lineChart2"></canvas>
            </div>
        </div>

        {{-- TABLE --}}
        <div
            class="px-4 py-4 mt-4 bg-white border  border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <!-- Card header -->
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="lg:mb-2 mb-0 text-xl font-bold text-gray-900 dark:text-white">Riwayat Terbaru</h3>
                    <span class="lg:text-base text-sm font-normal text-gray-500 dark:text-gray-400">Berikut daftar riwayat transaksi
                        terbaru</span>
                </div>
               
            </div>
            <!-- Table --> 
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Nama UMKM
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Nomor Resi
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Layanan
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Nominal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-900 ">
                                    @foreach ($parcels as $index => $parcel)
                                        <tr class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">

                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap  dark:text-white">
                                                {{ $parcel->customer_umkm_id->company_name }}</td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                {{ $parcel->create_at }}</td>

                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                {{ $parcel->resi_number }}</td>
                                            <td
                                                class="p-4 py-1 flex items-center text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                <img src="{{ $parcel->service_price_id->service_type_id->service_provider_id->logo }}"
                                                    alt="" class="w-12 h-12 me-2">

                                            </td>

                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                - Rp{{ number_format($parcel->service_price_id->price, 0, ',', '.') }}
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
            class="px-4 py-6 mt-4 lg:mt-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <!-- Card header -->
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="lg:mb-2 mb-0 text-xl font-bold text-gray-900 dark:text-white">Jadwal Penjemputan</h3>
                    <span class="lg:text-base text-sm font-normal text-gray-500 dark:text-gray-400">Berikut daftar jadwal penjemputan
                        UMKM</span>
                </div>
               
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class=" text-xs p-4 font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white ">
                                            Nama UMKM
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider  text-gray-500 uppercase dark:text-white text-center">
                                            Senin
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider  text-gray-500 uppercase dark:text-white text-center">
                                            Selasa
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider  text-gray-500 uppercase dark:text-white text-center">
                                            Rabu
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider  text-gray-500 uppercase dark:text-white text-center">
                                            Kamis
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider  text-gray-500 uppercase dark:text-white text-center">
                                            Jumat
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider  text-gray-500 uppercase dark:text-white text-center">
                                            Sabtu
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white  dark:bg-slate-900 ">
                                    @foreach ($customer_umkms as $index => $umkm)
                                        <tr
                                            class="{{ $index % 2 == 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">

                                            <td
                                                class="p-4 text-sm font-semibold text-gray-700 dark:text-white whitespace-nowrap align-middle">
                                                {{ $umkm->company_name }}
                                            </td>
                                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                                <td
                                                    class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white text-center ">
                                                    @if (in_array($day, $umkm->days_of_pickup))
                                                        {{ $umkm->time_of_pickup }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            @endforeach
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
        document.addEventListener('DOMContentLoaded', function() {
            // Konfigurasi untuk Grafik Paket Terkirim
            const ctxLine = document.getElementById('lineChart').getContext('2d');
            const lineChartData1 = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Paket Terkirim',
                    data: [100, 120, 130, 90, 200, 180, 150, 100, 120, 130, 90, 200],
                    borderColor: '#AD2113',
                    backgroundColor: 'rgba(173, 33, 19, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            };

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
                                    size: 14
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah',
                                font: {
                                    size: 14
                                }
                            },
                            ticks: {
                                beginAtZero: true
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'PAKET TERKIRIM'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    }
                }
            });

            // Konfigurasi untuk Grafik Pendapatan
            const ctxLine2 = document.getElementById('lineChart2').getContext('2d');
            const lineChartData2 = {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Pendapatan',
                    data: [1000000, 1500000, 1300000, 1100000, 2000000, 1800000, 1600000, 1000000,
                        1500000, 1300000, 1100000, 2000000
                    ],
                    borderColor: '#530316',
                    backgroundColor: 'rgba(83, 3, 22, 0.1)',
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
                                callback: function(value) {
                                    return formatCurrency(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'TRANSAKSI'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
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

@extends('layouts.dashboard')
@section('content')
    @php
        $dataList = [
            (object) [
                'id' => 1,
                'resi_number' => 'ABC123456',
                'actual_resi_number' => 'XYZ123456',
                'agen_id' => 10,
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
                'agen_id' => 11,
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
                'agen_id' => 12,
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
            (object) [
                'id' => 4,
                'resi_number' => 'JKL345678',
                'actual_resi_number' => 'OPQ345678',
                'agen_id' => 13,
                'customer_id' => 23,
                'customer_umkm_id' => null,
                'price' => 85000,
                'agen_commission' => 8500,
                'item_type' => 'Barang',
                'item_name' => 'Laptop asus',
                'amount' => 1,
                'weight' => '3kg',
                'item_height' => '5cm',
                'item_width' => '30cm',
                'item_lenght' => '40cm',
                'note' => 'Handle with caution',
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
                'estimation_date' => '2024-12-23',
                'proof_img' => '/images/proof4.jpg',
                'status' => 'gagal',
            ],
            (object) [
                'id' => 5,
                'resi_number' => 'MNO901234',
                'actual_resi_number' => 'XYZ901234',
                'agen_id' => 14,
                'customer_id' => 24,
                'customer_umkm_id' => 34,
                'price' => 95000,
                'agen_commission' => 9500,
                'item_type' => 'Barang',
                'item_name' => 'Baju tidur',
                'amount' => 5,
                'weight' => '2.5kg',
                'item_height' => '50cm',
                'item_width' => '40cm',
                'item_lenght' => '20cm',
                'note' => 'Keep dry',
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
                'estimation_date' => '2024-12-24',
                'proof_img' => '/images/proof5.jpg',
                'status' => 'berhasil',
            ],
        ];
    @endphp

    <div class="mx-4">
        <div class="grid w-full grid-cols-1 gap-4 mt-4 lg:grid-cols-3">
            <div
                class="flex flex-col items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-white uppercase">Agen</h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">40</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">Jumlah agen aktif saat ini</p>
                </div>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="mdi:account-group" data-inline="false"></span>
                </span>
            </div>

            <div
                class="flex flex-col items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-white uppercase">Kurir</h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">340</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">Total kurir tersedia</p>
                </div>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="mdi:truck" data-inline="false"></span>
                </span>
            </div>

            <div
                class="flex flex-col items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:flex-row sm:p-6 dark:border-gray-700 dark:bg-gray-800 hover:shadow-lg transition-shadow duration-300">
                <div class="w-full text-center sm:text-left">
                    <h3 class="text-base font-semibold text-customprimary-900 dark:text-white uppercase">Customer</h3>
                    <span
                        class="text-2xl font-bold leading-none text-customprimary-500 sm:text-3xl dark:text-white">80</span>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">Jumlah pelanggan terdaftar</p>
                </div>
                <span class="text-customprimary-500 text-6xl">
                    <span class="iconify" data-icon="material-symbols:supervisor-account" data-inline="false"></span>
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-4">
            <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 border-gray-200 shadow-md p-4 rounded-xl col-span-2 h-full">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="bg-white dark:bg-gray-800  border dark:border-gray-700 border-gray-200 shadow-md p-4 rounded-xl">
                <canvas id="customerPieChart"></canvas>
            </div>
        </div>

        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Riwayat Transaksi</h3>
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
                                            Paket
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Resi
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-white">
                                            Harga
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
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    @foreach ($dataList as $index => $data)
                                        <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} dark:bg-gray-800">
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-white">
                                                {{ $data->item_type }} - {{ $data->item_name }}
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-400">
                                                {{ $data->resi_number }}
                                            </td>
                                            <td
                                                class="p-4 py-1 text-sm font-semibold text-gray-700 whitespace-nowrap dark:text-gray-400">
                                                Rp. {{ number_format($data->price, 0, ',', '.') }}
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
                                            <td class="p-4 py-1 whitespace-nowrap">
                                                <span
                                                    class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md 
                                                    @if ($data->status == 'berhasil') bg-green-100 text-green-800 border border-green-100 dark:bg-green-700 dark:text-green-400 dark:border-green-500
                                                    @elseif ($data->status == 'gagal')
                                                        bg-red-100 text-red-800 border border-red-100 dark:bg-red-700 dark:text-red-400 dark:border-red-500
                                                    @else
                                                        bg-gray-100 text-gray-800 border border-gray-100 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-500 @endif
                                                ">
                                                    {{ ucfirst($data->status) }}
                                                </span>
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
        document.addEventListener('DOMContentLoaded', function() {
            const users = [{
                    id: 1,
                    username: 'user1',
                    email: 'user1@example.com',
                    role: 'customer',
                    banned: false
                },
                {
                    id: 2,
                    username: 'user2',
                    email: 'user2@example.com',
                    role: 'UMKM',
                    banned: false
                },
                {
                    id: 3,
                    username: 'user3',
                    email: 'user3@example.com',
                    role: 'customer',
                    banned: true
                },
                {
                    id: 4,
                    username: 'user4',
                    email: 'user4@example.com',
                    role: 'UMKM',
                    banned: false
                },
                {
                    id: 5,
                    username: 'user5',
                    email: 'user5@example.com',
                    role: 'customer',
                    banned: false
                }
            ];

            const customerCount = users.filter(user => user.role === 'customer').length;
            const umkmCount = users.filter(user => user.role === 'UMKM').length;

            const ctxPie = document.getElementById('customerPieChart').getContext('2d');
            const customerData = {
                labels: ['Customer', 'UMKM'],
                datasets: [{
                    data: [customerCount, umkmCount],
                    backgroundColor: ['#E68A6B', '#AD2113'],
                    hoverBackgroundColor: ['#F6BC9E', '#7C0911'],
                }]
            };

            new Chart(ctxPie, {
                type: 'pie',
                data: customerData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'CUSTOMER'
                        }
                    }
                }
            });

            const ctxLine = document.getElementById('lineChart').getContext('2d');
            const lineChartData = {
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
                    },
                    {
                        label: 'Pendapatan',
                        data: [1000000, 1500000, 1300000, 1100000, 2000000, 1800000,
                            1600000, 1000000, 1500000, 1300000, 1100000, 2000000
                        ],
                        borderColor: '#530316',
                        backgroundColor: 'rgba(83, 3, 22, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        hidden: true
                    }
                ]
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

            const lineChart = new Chart(ctxLine, {
                type: 'line',
                data: lineChartData,
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
                                font: {
                                    size: 14
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
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
                            text: 'TRANSAKSI PAKET'
                        },
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                filter: function(legendItem, chartData) {
                                    return true;
                                }
                            },
                            onClick: function(e, legendItem) {
                                const datasetIndex = legendItem.datasetIndex;
                                const chart = this.chart;

                                if (chart.isDatasetVisible(datasetIndex)) {
                                    chart.hide(datasetIndex);
                                } else {
                                    chart.show(datasetIndex);
                                    const otherIndex = datasetIndex === 0 ? 1 : 0;
                                    chart.hide(otherIndex);
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    if (tooltipItem.datasetIndex === 1) {
                                        return 'Pendapatan: ' + formatCurrency(tooltipItem.raw);
                                    } else {
                                        return 'Paket Terkirim: ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection

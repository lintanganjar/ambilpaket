@php
    $pricingOptions = (object) [
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
                'create_at'=>'12-12-2024'
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
                'create_at'=>'12-12-2024'
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
{{-- <div class="p-4 md:p-5 space-y-4">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Paket
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partnerships as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->partnership_transactions->request_status }}
                        </td>
                        <td class="px-6 py-4">
                            <!-- Modal toggle -->
                            <button data-modal-target="default-modal-1"
                                data-modal-toggle="default-modal-1"
                                data-partnership-id="{{ $item->id }}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Detail
                            </button>

                            <!-- Main modal -->
                            <div id="default-modal-1" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0  max-h-full">
                                <div class="relative py-4 px-7 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div
                                        class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between py-3 px-6 border-b rounded-t dark:border-gray-600">
                                            <h3
                                                class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Ringkasan Pemesanan
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="default-modal-1">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div
                                            class="py-4 px-7 space-y-3 max-h-[60vh] overflow-y-auto flex flex-row">
                                            <div class="">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                        Paket</label>
                                                    <input type="text" id="name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required value="{{ $item->name ?? '' }}" />
                                                </div>
                                                <div>
                                                    <label for="bank_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank
                                                        Name</label>
                                                    <input type="text" id="bank_name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required
                                                        value="{{ $item->payment_methods->bank_name ?? '' }}" />
                                                </div>
                                                <div>
                                                    <label for="first_name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                                        Name</label>
                                                    <input type="text" id="first_name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required
                                                        value="{{ $item->agens->first_name ?? '' }} {{ $item->agens->last_name ?? '' }}" />
                                                </div>
                                                <div>
                                                    <label for="phone_number"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                                        Number</label>
                                                    <input type="text" id="phone_number"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required
                                                        value="{{ $item->agens->phone_number ?? '' }}" />
                                                </div>
                                                <div>
                                                    <label for="full_address"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                                        Address</label>
                                                    <input type="text" id="full_address"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required
                                                        value="{{ $item->agens->full_address ?? '' }}" />
                                                </div>
                                            </div>

                                            <div class="">
                                                <img src="{{ $item->partnership_transactions->payment_prof ?? '' }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div> --}}
<table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-500">
    <thead class="bg-gray-100 dark:bg-gray-700">
        <tr>
            <th scope="col" class="p-4 text-sm font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                #
            </th>
            <th scope="col" class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Nama Paket
            </th>
            <th scope="col" class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Tanggal
            </th>
            <th scope="col" class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Metode Pembayaran
            </th>
            <th scope="col" class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Status
            </th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
        @foreach ($partnerships as $item)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-center">
                        {{ $loop->iteration }}
                    </div>
                </td>
                <td class="items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                    <div class="flex space-x-6 mr-10">
                        <div class="text-xs font-normal text-gray-900 dark:text-white">
                            <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                {{ $item->name }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                    <div class="flex space-x-6 mr-10">
                        <div class="text-xs font-normal text-gray-900 dark:text-white">
                            <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                {{ $item->payment_methods->create_at }}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                    <div class="flex space-x-6 mr-10">
                        <div class="text-xs font-normal text-gray-900 dark:text-white">
                            <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                {{ $item->payment_methods->bank_name }}
                            </div>
                        </div>
                    </div>
                </td>

                <td class="p-4 text-xs font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex items-center">
                        @if ($item->partnership_transactions->request_status === 'Diterima')
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                            <span>Diterima</span>
                        @elseif ($item->partnership_transactions->request_status === 'Ditolak')
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                            <span>Ditolak</span>
                        @else
                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-200 mr-2"></div>
                            <span>Menunggu</span>
                        @endif
                    </div>
                </td>


            </tr>
        @endforeach
    </tbody>
</table>

<!-- Main modal -->
<div id="detail-riwayat-pemesanan-modal" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full">
    <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Riwayat Pemesanan Paket Kemitraan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="detail-riwayat-pemesanan-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                <div class="grid grid-cols-12 gap-4">
                    <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                        <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Paket</h2>
                    </div>
                    <div class="lg:col-span-10 col-span-12">
                        <div class="relative">
                            <input type="text" id="customer_umkm_id"
                                class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                value="{{ ucwords($item->name) }}" placeholder=" " disabled />
                            <label for="customer_umkm_id"
                                class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Nama Paket Kemitraan</label>
                        </div>
                    </div>

                    <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                        <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Bank</h2>
                    </div>
                    <div class="lg:col-span-10 col-span-12">
                        <div class="relative">
                            <input type="text" id="customer_umkm_id"
                                class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                value="{{ ucwords($item->name) }}" placeholder=" " disabled />
                            <label for="customer_umkm_id"
                                class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                Nama Bank</label>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

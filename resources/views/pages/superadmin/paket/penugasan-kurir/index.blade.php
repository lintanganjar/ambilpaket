@extends('layouts.dashboard')
@section('content')
    @php
        $dataList = [
            (object) [
                'id_pengemasan' => uniqid(),
                'tanggal_pengemasan' => '2024-11-26',
                'kurir' => null,
                'paket' => [
                    (object) [
                        'paket_name' => 'Paket 1',
                        'customer_id' => (object) [
                            'id' => 1,
                            'full_address' => 'John Doe, 456 Elm Street, Suite 3, Los Angeles, CA 90001, USA',
                            'name' => 'John Doe',
                        ],
                        'status' => 'belum dikirim',
                    ],
                    (object) [
                        'paket_name' => 'Paket 2',
                        'customer_id' => (object) [
                            'id' => 2,
                            'full_address' => 'Jane Smith, 789 Maple Avenue, Suite 5, San Francisco, CA 94105, USA',
                            'name' => 'Jane Smith',
                        ],
                        'status' => 'belum dikirim',
                    ],
                    (object) [
                        'paket_name' => 'Paket 3',
                        'customer_id' => (object) [
                            'id' => 3,
                            'full_address' => 'Mark Johnson, 123 Oak Drive, Apt 12B, Chicago, IL 60601, USA',
                            'name' => 'Mark Johnson',
                        ],
                        'status' => 'belum dikirim',
                    ],
                ],
                'area_id' => (object) [
                    'id' => 1,
                    'name' => 'Jakarta Selatan',
                ],
            ],
            (object) [
                'id_pengemasan' => uniqid(),
                'tanggal_pengemasan' => '2024-11-25',
                'kurir' => null,
                'paket' => [
                    (object) [
                        'paket_name' => 'Paket 4',
                        'customer_id' => (object) [
                            'id' => 1,
                            'full_address' => 'John Doe, 456 Elm Street, Suite 3, Los Angeles, CA 90001, USA',
                            'name' => 'John Doe',
                        ],
                        'status' => 'belum dikirim',
                    ],
                    (object) [
                        'paket_name' => 'Paket 5',
                        'customer_id' => (object) [
                            'id' => 2,
                            'full_address' => 'Jane Smith, 789 Maple Avenue, Suite 5, San Francisco, CA 94105, USA',
                            'name' => 'Jane Smith',
                        ],
                        'status' => 'belum dikirim',
                    ],
                ],
                'area_id' => (object) [
                    'id' => 2,
                    'name' => 'Jakarta Barat',
                ],
            ],
            (object) [
                'id_pengemasan' => uniqid(),
                'tanggal_pengemasan' => '2024-11-24',
                'kurir' => null,
                'paket' => [
                    (object) [
                        'paket_name' => 'Paket 6',
                        'customer_id' => (object) [
                            'id' => 1,
                            'full_address' => 'John Doe, 456 Elm Street, Suite 3, Los Angeles, CA 90001, USA',
                            'name' => 'John Doe',
                        ],
                        'status' => 'belum dikirim',
                    ],
                    (object) [
                        'paket_name' => 'Paket 7',
                        'customer_id' => (object) [
                            'id' => 1,
                            'full_address' => 'John Doe, 456 Elm Street, Suite 3, Los Angeles, CA 90001, USA',
                            'name' => 'John Doe',
                        ],
                        'status' => 'belum dikirim',
                    ],
                    (object) [
                        'paket_name' => 'Paket 8',
                        'customer_id' => (object) [
                            'id' => 2,
                            'full_address' => 'Jane Smith, 789 Maple Avenue, Suite 5, San Francisco, CA 94105, USA',
                            'name' => 'Jane Smith',
                        ],
                        'status' => 'belum dikirim',
                    ],
                    (object) [
                        'paket_name' => 'Paket 9',
                        'customer_id' => (object) [
                            'id' => 3,
                            'full_address' => 'Mark Johnson, 123 Oak Drive, Apt 12B, Chicago, IL 60601, USA',
                            'name' => 'Mark Johnson',
                        ],
                        'status' => 'belum dikirim',
                    ],
                ],
                'area_id' => (object) [
                    'id' => 3,
                    'name' => 'Bandung Timur',
                ],
            ],
        ];

        $dataKurir = [
            (object) [
                'tanggal' => '2024-11-25',
                'kurir' => 'John Doe',
                'phone_number' => 83849826116,
                'area_id' => (object) [
                    'id' => 1,
                    'name' => 'Jakarta Selatan',
                ],
            ],
            (object) [
                'tanggal' => '2024-11-24',
                'kurir' => 'Jane Smith',
                'phone_number' => 83849826116,
                'area_id' => (object) [
                    'id' => 2,
                    'name' => 'Jakarta Barat',
                ],
            ],
            (object) [
                'tanggal' => '2024-11-23',
                'kurir' => 'Michael Brown',
                'phone_number' => 83849826116,
                'area_id' => (object) [
                    'id' => 3,
                    'name' => 'Bandung Timur',
                ],
            ],
            (object) [
                'tanggal' => '2024-11-22',
                'kurir' => 'Emily Davis',
                'phone_number' => 83849826116,
                'area_id' => (object) [
                    'id' => 2,
                    'name' => 'Jakarta Barat',
                ],
            ],
            (object) [
                'tanggal' => '2024-11-21',
                'kurir' => 'David Wilson',
                'phone_number' => 83849826116,
                'area_id' => (object) [
                    'id' => 1,
                    'name' => 'Jakarta Selatan',
                ],
            ],
        ];
    @endphp
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
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
                                <a href="{{ route('superadmin-parcel.courier-assignment') }}"
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Penugasan
                                    Kurir</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua Penugasan Kurir</h1>
            </div>
            <div class="sm:flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form action="#" method="GET" class="hidden lg:block">
                        <label for="courier-assign-search" class="sr-only">Search</label>
                        <div class="relative lg:w-96">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="courier-assign-search"
                                class="bg-white border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Cari">
                        </div>
                    </form>
                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                        <button type="button" data-modal-target="add-courier-assignment-modal"
                            data-modal-toggle="add-courier-assignment-modal"
                            class="inline-flex items-center justify-center w-auto px-3 py-2 text-xs font-medium text-center text-primary-700 rounded-lg border border-primary-700 hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:text-white dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-5 h-5 md:mr-2 mr-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="hidden sm:inline">Tambah</span>
                        </button>
                        <button type="button" data-modal-target="download-file-courier-assignment-modal"
                            data-modal-toggle="download-file-courier-assignment-modal"
                            class="inline-flex items-center justify-center w-auto px-3 py-2 text-xs font-medium text-center text-gray-900 bg-white border border-gray-900 rounded-lg hover:text-white hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 sm:w-auto dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            
                            <svg class="w-5 h-5 md:mr-2 mr-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="hidden sm:inline">Unduh</span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    #
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    id
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Tanggal Pengemasan
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Area
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Jumlah Paket
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                    Kurir
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach ($dataList as $courierAssign)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ucwords($courierAssign->id_pengemasan) }}
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ucwords($courierAssign->tanggal_pengemasan) }}
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ ucwords($courierAssign->area_id->name) }}
                                    </td>

                                    <td
                                        class="p-4 text-xs font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ count($courierAssign->paket) }}
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <select class="courier-select js-example-templating block w-full truncate"
                                            data-area-id="{{ $courierAssign->area_id->id }}">
                                            <option value="" disabled selected hidden></option>
                                            @foreach ($dataKurir as $kurir)
                                                @if ($kurir->area_id->id == $courierAssign->area_id->id)
                                                    <option value="{{ $kurir->kurir }}"
                                                        data-phone="{{ $kurir->phone_number }}">
                                                        {{ $kurir->kurir }} - {{ $kurir->phone_number }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>

                                    <script>
                                        $(document).ready(function() {
                                            function formatState(state) {
                                                if (!state.id) {
                                                    return state.text;
                                                }
                                                var $state = $('<span class="text-xs">' + state.text + '</span>');
                                                return $state;
                                            };

                                            $(".js-example-templating").select2({
                                                placeholder: "Pilih Kurir",
                                                templateResult: formatState
                                            });
                                        });
                                    </script>

                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="detail-courier-assignment-modal"
                                            data-modal-toggle="detail-courier-assignment-modal"
                                            class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-custompurple-500 border border-custompurple-500 rounded-lg hover:text-white hover:bg-custompurple-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke="currentColor" stroke-width="2"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            Detail
                                        </button>

                                        <button type="button" data-modal-target="delete-courier-assignment-modal"
                                            data-modal-toggle="delete-courier-assignment-modal"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center mb-4 sm:mb-0">
            <span class="text-xs font-normal text-gray-900 dark:text-white">Menampilkan <span
                    class="font-semibold text-gray-900 dark:text-white">1-20</span> dari <span
                    class="font-semibold text-gray-900 dark:text-white">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="#"
                class="inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-5 h-5 mr-1 -ml-1"" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Sebelumnya
            </a>
            <a href="#"
                class="inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                Berikutnya
                <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Detail hub Modal -->
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="detail-courier-assignment-modal">
        <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                    <h3 class="text-xl font-semibold dark:text-white">
                        Detail Penugasan Kurir
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 max-h- hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-toggle="detail-courier-assignment-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                    @include('pages.superadmin.paket.penugasan-kurir.detail')
                </div>
                <!-- Modal footer -->
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    {{-- <button type="button" id="edit-btn"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-primary-700 border border-primary-700 rounded-lg hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Edit
                    </button> --}}
                    <button type="button" data-modal-toggle="detail-courier-assignment-modal"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- add hub Modal -->
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="add-courier-assignment-modal">
        <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                    <h3 class="text-xl font-semibold dark:text-white">
                        Tambah Pengemasan Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 max-h- hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-toggle="add-courier-assignment-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                    @include('pages.superadmin.paket.penugasan-kurir.add-form')
                </div>
                <!-- Modal footer -->
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="button" id="submit-button"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-green-500 border border-green-500 rounded-lg hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                    <button type="button" data-modal-toggle="add-courier-assignment-modal"
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

    <!-- Delete courier-assignment Modal -->
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="delete-courier-assignment-modal">
        <div class="relative w-full h-full max-w-md px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-hide="delete-courier-assignment-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-5 mb-6 text-lg text-gray-900 dark:text-white">Apakah Anda yakin ingin menghapus penugasan kurir ini?</h3>
                    <a href="#"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                        Ya, Saya yakin
                    </a>
                    <a href="#"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                        data-modal-hide="delete-courier-assignment-modal">
                        Tidak, Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Download File Modal -->
    <div class="fixed inset-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto h-modal sm:h-full"
        id="download-file-courier-assignment-modal">
        <div class="relative w-full max-w-md px-4 h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-hide="download-file-courier-assignment-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 text-center">
                    <svg class="w-14 h-14 text-gray-800 dark:text-white mx-auto" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                            clip-rule="evenodd" />
                    </svg>

                    <h3 class="mt-4 mb-6 text-lg font-medium text-gray-900 dark:text-white">
                        Pilih format file untuk diunduh </h3>
                    <div class="flex justify-center space-x-3">
                        <a href=""
                            class="font-medium text-sm inline-flex items-center px-4 py-2 text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 17v-5h1.5a1.5 1.5 0 1 1 0 3H5m12 2v-5h2m-2 3h2M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m6 4v5h1.375A1.627 1.627 0 0 0 14 15.375v-1.75A1.627 1.627 0 0 0 12.375 12H11Z" />
                            </svg>
                            PDF
                        </a>
                        <a href=""
                            class="font-medium text-sm inline-flex items-center px-4 py-2 text-center text-primary-600 border border-primary-600 rounded-lg hover:text-white hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-900">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m14 9.006h-.335a1.647 1.647 0 0 1-1.647-1.647v-1.706a1.647 1.647 0 0 1 1.647-1.647L19 12M5 12v5h1.375A1.626 1.626 0 0 0 8 15.375v-1.75A1.626 1.626 0 0 0 6.375 12H5Zm9 1.5v2a1.5 1.5 0 0 1-1.5 1.5v0a1.5 1.5 0 0 1-1.5-1.5v-2a1.5 1.5 0 0 1 1.5-1.5v0a1.5 1.5 0 0 1 1.5 1.5Z" />
                            </svg>
                            DOCX
                        </a>
                        <a href=""
                            class="font-medium text-sm inline-flex items-center px-4 py-2 text-center text-green-600 border border-green-600 rounded-lg hover:text-white hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:text-white dark:border-none dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m2.665 9H6.647A1.647 1.647 0 0 1 5 15.353v-1.706A1.647 1.647 0 0 1 6.647 12h1.018M16 12l1.443 4.773L19 12m-6.057-.152-.943-.02a1.34 1.34 0 0 0-1.359 1.22 1.32 1.32 0 0 0 1.172 1.421l.536.059a1.273 1.273 0 0 1 1.226 1.718c-.2.571-.636.754-1.337.754h-1.13" />
                            </svg>
                            CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('submit-button').addEventListener('click', function () {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan disimpan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, submit form
                    Swal.fire(
                        'Berhasil!',
                        'Data telah disimpan.',
                        'success'
                    ).then(() => {
                        // Arahkan ke action form atau submit menggunakan JavaScript
                        document.querySelector('form').submit();
                    });
                }
            });
        });
    </script>
@endsection

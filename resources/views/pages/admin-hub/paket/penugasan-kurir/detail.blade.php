@php
    $data = [
        (object) [
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
                ],
                (object) [
                    'paket_name' => 'Paket 7',
                    'customer_id' => (object) [
                        'id' => 1,
                        'full_address' => 'John Doe, 456 Elm Street, Suite 3, Los Angeles, CA 90001, USA',
                        'name' => 'John Doe',
                    ],
                ],
                (object) [
                    'paket_name' => 'Paket 8',
                    'customer_id' => (object) [
                        'id' => 2,
                        'full_address' => 'Jane Smith, 789 Maple Avenue, Suite 5, San Francisco, CA 94105, USA',
                        'name' => 'Jane Smith',
                    ],
                ],
                (object) [
                    'paket_name' => 'Paket 9',
                    'customer_id' => (object) [
                        'id' => 3,
                        'full_address' => 'Mark Johnson, 123 Oak Drive, Apt 12B, Chicago, IL 60601, USA',
                        'name' => 'Mark Johnson',
                    ],
                ],
            ],
            'area_id' => (object) [
                'id' => 3,
                'name' => 'Bandung Timur',
            ],
        ],
    ];
@endphp
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
                                Paket
                            </th>

                            <th scope="col"
                                class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Penerima
                            </th>

                            <th scope="col"
                                class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Alamat Penerima
                            </th>

                            <th scope="col"
                                class="p-4 text-sm font-medium text-center text-gray-500 uppercase dark:text-gray-400">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($data as $courierAssign)
                            @foreach ($courierAssign->paket as $paket)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $paket->paket_name }}
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $paket->customer_id->name }}
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $paket->customer_id->full_address }}
                                    </td>

                                    <td
                                        class="p-4 text-xs font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold leading-tight text-yellow-800 bg-yellow-200 rounded-full">
                                            Belum Dikirim
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

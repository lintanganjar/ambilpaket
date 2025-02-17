@php
    $data = (object) [
        'id' => 1,
        'parcel_id' => (object) [
            'id' => 3,
            'proof_img' => 'neil-sims.png',
            'resi_number' => 'RESI03948230',
            'item_name' => 'Jam Dinding',
        ],
        'date' => '2024-11-06, 2024-11-07, 2024-11-08',
        'detail' =>
            'Paket telah sampai di HUB Surabaya, Paket telah sampai di HUB Mojokerto, Paket telah diantar ke tujuan',
    ];

    $dates = explode(',', $data->date);
    $details = explode(',', $data->detail);
@endphp

<form action="#">
    <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">{{ strtoupper($data->parcel_id->resi_number) }}
    </h3>

    <ol class="relative border-s border-gray-400 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">
        @foreach ($dates as $index => $date)
            <li class="mb-10 ms-6">
                <span
                    class="absolute flex items-center justify-center w-4 h-4 bg-customprimary-500 rounded-full -start-2 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600"></span>
                <h3 class="flex items-start mb-1 text-xs font-semibold text-gray-900 dark:text-white">{{ trim($date) }}
                </h3>
                <time class="block mb-3 text-xs font-normal leading-none text-gray-500 dark:text-gray-400">
                    {{ isset($details[$index]) ? trim($details[$index]) : '' }}
                </time>
            </li>
        @endforeach
    </ol>

    <div class="grid grid-cols-12 mb-2">

        <div class="lg:col-span-2 col-span-12 flex items-center">
            <h2 class="text-xs font-medium text-gray-900 dark:text-white">Catatan</h2>
        </div>
        <div class="lg:col-span-10 col-span-12">
            <div class="relative">
                <input type="text" id="detail"
                    class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                    value="" placeholder=" " />
                <label for="detail"
                    class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tambah
                    catatan baru</label>
            </div>
        </div>
    </div>

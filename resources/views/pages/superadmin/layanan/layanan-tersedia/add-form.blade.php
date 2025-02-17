@php
    $data = (object) [
        'id' => 1,
        'service_provider_id' => (object) [
            'id' => 1,
            'name' => 'Provider A',
            'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
        ],
        'name' => 'Service Type A1',
        'note' => 'Description of Service Type A1',
    ];
@endphp
<form action="#">
    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Layanan</h3>
            <div class="grid grid-cols-12 gap-4">

                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Provider</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="service_provicer_id"
                            class="block pt-1.5 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="" disabled selected>-- Pilih Provider --</option>
                            <option value="1">Provider A</option>
                            <option value="2">Provider B</option>
                            <option value="3">Provider C</option>
                            <option value="4">Provider D</option>
                            <option value="5">Provider E</option>
                        </select>
                        <label for="service_provider_id"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Layanan</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="" placeholder=" " />
                        <label for="name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Layanan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 flex items-center">
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
            </div>
        </div>
    </div>

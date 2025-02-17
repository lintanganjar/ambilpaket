@php
    $data = (object) [
        'id' => 1,
        'user_id' => (object) [
            'id' => 1,
            'email' => 'andi@example.com',
            'role' => 'courier',
        ],
        'courier_type' => 'delivery',
        'first_name' => 'andi',
        'last_name' => 'simalakama',
        'phone_number' => 81234567890,
        'gender' => 'laki-laki',
        'profile_img' => 'neil-sims.png',
        'area_id' => (object) [
            'id' => 3,
            'name' => 'surabaya',
            'district_coverage' => '[kenjeran, taman, sukolilo]',
        ],
        'approval' => null,
        'balance' => 10000000,
        'bank_name' => 'BNI',
        'account_name' => 'andi simalakama',
        'account_number' => '1234567890',
    ];
@endphp

<form action="#">
    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Umum</h3>
            <div class="grid grid-cols-12 gap-4">
                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Lengkap</h2>
                </div>
                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="first_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->first_name }}" placeholder=" " disabled />
                        <label for="first_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Depan</label>
                    </div>
                </div>
                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="last_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->last_name }}" placeholder=" " disabled />
                        <label for="last_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Belakang</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Jenis Kelamin</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="gender"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->gender) }}" placeholder=" " disabled />
                        <label for="gender"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Jenis
                            Kelamin</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nomor Telepon</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="phone_number"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ '+62 ' . preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1 $2 $3', $data->phone_number) }}"
                            placeholder=" " disabled />
                        <label for="phone_number"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                            Telepon Aktif</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Tipe Kurir</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="courier_type" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="delivery" {{ $data->courier_type === 'delivery' ? 'selected' : '' }}>Delivery
                            </option>
                            <option value="pickup" {{ $data->courier_type === 'pickup' ? 'selected' : '' }}>Pickup
                            </option>
                        </select>
                        <label for="courier_type"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tipe
                            Kurir</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Area</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="area_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->area_id->id }}" selected>{{ ucwords($data->area_id->name) }}
                            </option>
                            <!-- Add other areas as options -->
                            {{-- @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ ucwords($area->name) }}</option>
                                        @endforeach --}}
                        </select>
                        <label for="district"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kecamatan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Daerah Tercover</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="area_id"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords(implode(', ', explode(', ', trim($data->area_id->district_coverage, '[]')))) }}"
                            placeholder=" " disabled />
                        <label for="area_id"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Daerah
                            Tercover</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Bank</h3>
            <div class="grid grid-cols-12 gap-4">

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Bank</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="bank_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->bank_name) }}" placeholder=" " disabled />
                        <label for="bank_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Bank</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Pemilik</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="account_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->account_name) }}" placeholder=" " disabled />
                        <label for="account_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Pemilik Bank</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center w">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Rekening</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="account_number"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->account_number) }}" placeholder=" " disabled />
                        <label for="account_number"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                            Rekening</label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Lainnya</h3>
            <div class="grid grid-cols-12 gap-4">

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Saldo Kurir</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="balance"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ 'Rp ' . number_format($data->balance, 0, ',', '.') }}" placeholder=" "
                            disabled />
                        <label for="balance"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Saldo
                            Kurir</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

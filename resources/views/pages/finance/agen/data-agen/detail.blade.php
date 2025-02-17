@php
    $data = (object) [
        'id' => 1,
        'partnership_id' => (object) [
            'id' => 3,
            'name' => 'Agen Biasa',
        ],
        'submission_id' => 2,
        'user_id' => 5,
        'first_name' => 'andi',
        'last_name' => 'simalakama',
        'phone_number' => 81234567890,
        'province_id' => (object) [
            'id' => 3,
            'name' => 'Jawa Timur',
        ],
        'regency_id' => (object) [
            'id' => 3,
            'name' => 'Kota Surabaya',
        ],
        'district_id' => (object) [
            'id' => 3,
            'name' => 'Kecamatan Tegalsari',
        ],
        'full_address' => 'Jl. Merdeka No. 1',
        'building_type' => 'rumah',
        'building_status' => 'milik sendiri',
        'location' => 'Surabaya',
        'latitude' => '-6.175110',
        'longitude' => '106.865036',
        'balance' => 5000000,
        'bank_name' => 'BNI',
        'account_name' => 'andi simalakama',
        'account_number' => '1234567890',
        'profile_img' => 'neil-sims.png',
    ];
@endphp

<form action="#">
    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">

            <div class="rounded-lg 2xl:col-span-2 dark:border-gray-700 dark:bg-gray-800">
                <div class="flex justify-center items-center">
                    <div class="flex flex-col items-center text-center">
                        <img class="mb-2 rounded-lg w-16 h-16"
                            src="{{ asset('static/images/users/' . $data->profile_img) }}" alt="Foto Profile">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white">Foto Profile</h3>
                        <div class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                            JPG, GIF, atau PNG. Ukuran maks 800K
                        </div>
                        <div class="hidden img-action-div flex items-center justify-center space-x-2">
                            <button type="button"
                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-primary-700 border border-primary-700 rounded-lg hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">

                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                    </path>
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                </svg>
                                Unggah
                            </button>
                            <button type="button"
                                class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Alamat</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="full_address"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->full_address) }}" placeholder=" " disabled />
                        <label for="full_address"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Alamat
                            Lengkap</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Provinsi</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="province_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->province_id->id }}" selected>
                                {{ ucwords($data->province_id->name) }}</option>
                            <!-- Add other provinces as options -->
                            {{-- @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ ucwords($province->name) }}</option>
                                        @endforeach --}}
                        </select>
                        <label for="province"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Provinsi</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kabupaten</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="regency_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->regency_id->id }}" selected>
                                {{ ucwords($data->regency_id->name) }}</option>
                            <!-- Add other regencies as options -->
                            {{-- @foreach ($regencies as $regency)
                                            <option value="{{ $regency->id }}">{{ ucwords($regency->name) }}</option>
                                        @endforeach --}}
                        </select>
                        <label for="regency"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kabupaten</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kecamatan</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="district_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->district_id->id }}" selected>
                                {{ ucwords($data->district_id->name) }}</option>
                            <!-- Add other districts as options -->
                            {{-- @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ ucwords($district->name) }}</option>
                                        @endforeach --}}
                        </select>
                        <label for="district"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kecamatan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Lokasi</h2>
                </div>
                <div class="lg:col-span-4 col-span-12">
                    <div class="relative">
                        <input type="text" id="location"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->location }}" placeholder=" " disabled />
                        <label for="location"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Domisili</label>
                    </div>
                </div>
                <div class="lg:col-span-3 col-span-12">
                    <div class="relative">
                        <input type="text" id="latitude"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->latitude }}" placeholder=" " disabled />
                        <label for="latitude"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Lintang</label>
                    </div>
                </div>
                <div class="lg:col-span-3 col-span-12">
                    <div class="relative">
                        <input type="text" id="longitude"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->longitude }}" placeholder=" " disabled />
                        <label for="longitude"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Garis
                            Bujur</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Bangunan</h2>
                </div>
                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="building_type"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->building_type }}" placeholder=" " disabled />
                        <label for="building_type"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tipe
                            Bangunan</label>
                    </div>
                </div>
                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="building_status"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->building_status }}" placeholder=" " disabled />
                        <label for="building_status"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Status
                            Bangunan</label>
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
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Riwayat Kemitraan</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="partnership_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->partnership_id->id }}" selected>
                                {{ ucwords($data->partnership_id->name) }}</option>
                            <!-- Add other districts as options -->
                            {{-- @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ ucwords($district->name) }}</option>
                                        @endforeach --}}
                        </select>
                        <label for="district"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kemitraan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Saldo</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="balance"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ 'Rp ' . number_format($data->balance, 0, ',', '.') }}" placeholder=" "
                            disabled />
                        <label for="balance"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Saldo
                            Agen</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

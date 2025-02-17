@php
    $data = (object) [
        'id' => 1,
        'agen_first_name' => 'andi',
        'agen_last_name' => 'simalakama',
        'agen_phone_number' => 81234567890,
        'agen_email' => 'andi@example.com',
        'agen_password' => bcrypt('password123'),
        'agen_province_id' => (object) [
            'id' => 3,
            'name' => 'Jawa Timur',
        ],
        'agen_regency_id' => (object) [
            'id' => 3,
            'name' => 'Kota Surabaya',
        ],
        'agen_district_id' => (object) [
            'id' => 3,
            'name' => 'Kecamatan Tegalsari',
        ],
        'agen_full_address' => 'Jl. Merdeka No. 1',
        'latitude' => '-6.175110',
        'longitude' => '106.865036',
        'building_type' => 'rumah',
        'building_status' => 'milik sendiri',
        'location' => 'Surabaya',
        'ktp_img' => 'ktp_andi.png',
        'npwp_img' => 'npwp_andi.png',
        'akta_pendiri_perusahaan_img' => 'akta_andi.png',
        'suket_domisili_usaha_img' => 'suket_domisili.png',
        'surat_izin_usaha_perusahaan_img' => 'surat_izin.png',
        'location_img' => 'location_andi.png',
        'building_condition_img' => 'condition_andi.png',
        'approval' => null,
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
                        <input type="text" id="agen_first_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->agen_first_name }}" placeholder=" " disabled />
                        <label for="agen_first_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Depan</label>
                    </div>
                </div>
                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="agen_last_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->agen_last_name }}" placeholder=" " disabled />
                        <label for="agen_last_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Belakang</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nomor Telepon</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="agen_phone_number"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ '+62 ' . preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1 $2 $3', $data->agen_phone_number) }}"
                            placeholder=" " disabled />
                        <label for="agen_phone_number"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                            Telepon Aktif</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Email</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="email" id="agen_email"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->agen_email }}" placeholder=" " disabled />
                        <label for="agen_email"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Password</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="password" id="agen_password"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->agen_password }}" placeholder=" " disabled />
                        <label for="agen_password"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Password</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Alamat</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="agen_full_address"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->agen_full_address) }}" placeholder=" " disabled />
                        <label for="agen_full_address"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Alamat
                            Lengkap</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Provinsi</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <select id="agen_province_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->agen_province_id->id }}" selected>
                                {{ ucwords($data->agen_province_id->name) }}</option>
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
                        <select id="agen_regency_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->agen_regency_id->id }}" selected>
                                {{ ucwords($data->agen_regency_id->name) }}</option>
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
                        <select id="agen_district_id" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->agen_district_id->id }}" selected>
                                {{ ucwords($data->agen_district_id->name) }}</option>
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
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Dokumen Pendukung</h3>
            <div class="grid grid-cols-12 gap-4">

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">KTP</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="ktp_img"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-blue-500 bg-gray-50 rounded-lg border border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer cursor-pointer"
                            value="{{ !empty($data->ktp_img) ? 'Lihat Dokumen' : 'Tidak Tersedia' }}"
                            onclick="{{ !empty($data->ktp_img) ? "window.open('" . asset('static/images/docs/' . $data->ktp_img) . "', '_blank')" : '' }}"
                            readonly />
                        <label for="ktp_img"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kartu
                            Tanda Penduduk</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">NPWP</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="npwp_img"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-blue-500 bg-gray-50 rounded-lg border border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer cursor-pointer"
                            value="{{ !empty($data->npwp_img) ? 'Lihat Dokumen' : 'Tidak Tersedia' }}"
                            onclick="{{ !empty($data->npwp_img) ? "window.open('" . asset('static/images/docs/' . $data->npwp_img) . "', '_blank')" : '' }}"
                            readonly />
                        <label for="npwp_img"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                            Pokok Wajib Pajak</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Akta Kelahiran</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="akta_pendiri_perusahaan_img"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-blue-500 bg-gray-50 rounded-lg border border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer cursor-pointer"
                            value="{{ !empty($data->akta_pendiri_perusahaan_img) ? 'Lihat Dokumen' : 'Tidak Tersedia' }}"
                            onclick="{{ !empty($data->akta_pendiri_perusahaan_img) ? "window.open('" . asset('static/images/docs/' . $data->akta_pendiri_perusahaan_img) . "', '_blank')" : '' }}"
                            readonly />
                        <label for="akta_pendiri_perusahaan_img"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Akta
                            Pendiri Perusahaan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Surat Domisili</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="suket_domisili_usaha_img"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-blue-500 bg-gray-50 rounded-lg border border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer cursor-pointer"
                            value="{{ !empty($data->suket_domisili_usaha_img) ? 'Lihat Dokumen' : 'Tidak Tersedia' }}"
                            onclick="{{ !empty($data->suket_domisili_usaha_img) ? "window.open('" . asset('static/images/docs/' . $data->suket_domisili_usaha_img) . "', '_blank')" : '' }}"
                            readonly />
                        <label for="suket_domisili_usaha_img"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Surat
                            Keterangan Domisili Usaha</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Surat Izin Usaha</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="surat_izin_usaha_perusahaan_img"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-blue-500 bg-gray-50 rounded-lg border border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer cursor-pointer"
                            value="{{ !empty($data->surat_izin_usaha_perusahaan_img) ? 'Lihat Dokumen' : 'Tidak Tersedia' }}"
                            onclick="{{ !empty($data->surat_izin_usaha_perusahaan_img) ? "window.open('" . asset('static/images/docs/' . $data->surat_izin_usaha_perusahaan_img) . "', '_blank')" : '' }}"
                            readonly />
                        <label for="surat_izin_usaha_perusahaan_img"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Surat
                            Izin Usaha Perusahaan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Foto Bangunan</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="building_condition_img"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-blue-500 bg-gray-50 rounded-lg border border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer cursor-pointer"
                            value="{{ !empty($data->building_condition_img) ? 'Lihat Dokumen' : 'Tidak Tersedia' }}"
                            onclick="{{ !empty($data->building_condition_img) ? "window.open('" . asset('static/images/docs/' . $data->building_condition_img) . "', '_blank')" : '' }}"
                            readonly />
                        <label for="building_condition_img"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Foto
                            Kondisi Bangunan</label>
                    </div>
                </div>

            </div>
        </div>
    </div>

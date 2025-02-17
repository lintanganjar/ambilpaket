@php
    $data = (object) [
        'id' => 1,
        'user_id' => (object) [
            'id' => 3,
            'email' => 'alex@example.com',
        ],
        'first_name' => 'Alex',
        'last_name' => 'Kurniawan',
        'phone_number' => '081234567890',
        'company_name' => 'Toko Maju Jaya',
        'product_type' => 'Makanan',
        'province' => (object) [
            'id' => 3,
            'name' => 'Jawa Timur',
        ],
        'regency' => (object) [
            'id' => 3,
            'name' => 'Kota Surabaya',
        ],
        'district' => (object) [
            'id' => 3,
            'name' => 'Kecamatan Tegalsari',
        ],
        'full_address' => 'Jl. Tegalsari No.01',
        'latitude' => '-6.914744',
        'longitude' => '107.609810',
        'parcel_average_per_day' => 20,
        'pickup_activation' => true,
        'days_of_pickup' => '[senin, rabu, jumat]',
        'time_of_pickup' => '09:00:00',
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
                        <select id="province" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->province->id }}" selected>{{ ucwords($data->province->name) }}
                            </option>
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
                        <select id="regency" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->regency->id }}" selected>{{ ucwords($data->regency->name) }}
                            </option>
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
                        <select id="district" disabled
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="{{ $data->district->id }}" selected>{{ ucwords($data->district->name) }}
                            </option>
                            <!-- Add other districts as options -->
                            {{-- @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ ucwords($district->name) }}</option>
                                        @endforeach --}}
                        </select>
                        <label for="district"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kecamatan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Koordinat</h2>
                </div>
                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="latitude"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->latitude }}" placeholder=" " disabled />
                        <label for="latitude"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Latitude</label>
                    </div>
                </div>

                <div class="lg:col-span-5 col-span-12">
                    <div class="relative">
                        <input type="text" id="longitude"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ $data->longitude }}" placeholder=" " disabled />
                        <label for="longitude"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Longitude</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-3">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Umkm</h3>
            <div class="grid grid-cols-12 gap-4">

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Usaha</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="company_name"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->company_name) }}" placeholder=" " disabled />
                        <label for="company_name"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                            Usaha</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Tipe Usaha</h2>
                </div>
                <div class="lg:col-span-10 col-span-12">
                    <div class="relative">
                        <input type="text" id="product_type"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->product_type) }}" placeholder=" " disabled />
                        <label for="product_type"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tipe
                            Usaha</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                    <h2 class="text-xs font-medium text-gray-900 dark:text-white">Pengiriman</h2>
                </div>
                <div class="lg:col-span-2 col-span-12">
                    <div class="relative">
                        <select id="pickup_activation"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                            <option value="true" {{ $data->pickup_activation === true ? 'selected' : '' }}>Aktif
                            </option>
                            <option value="false" {{ $data->pickup_activation === false ? 'selected' : '' }}>Tidak
                                Aktif</option>
                        </select>
                        <label for="pickup_activation"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Status
                            Layanan</label>
                    </div>
                </div>

                <div class="lg:col-span-2 col-span-12">
                    <div class="relative">
                        <input type="text" id="parcel_average_per_day"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->parcel_average_per_day) }}" placeholder=" " disabled />
                        <label for="parcel_average_per_day"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Rata-rata
                            Paket Per-Hari</label>
                    </div>
                </div>
                <div class="lg:col-span-3 col-span-12">
                    <div class="relative">
                        <input type="text" id="time_of_pickup"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords($data->time_of_pickup) }}" placeholder=" " disabled />
                        <label for="time_of_pickup"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Waktu
                            Penjadwalan Pickup</label>
                    </div>
                </div>
                <div class="lg:col-span-3 col-span-12">
                    <div class="relative">
                        <input type="text" id="days_of_pickup"
                            class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                            value="{{ ucwords(implode(', ', explode(', ', trim($data->days_of_pickup, '[]')))) }}"
                            placeholder=" " disabled />
                        <label for="days_of_pickup"
                            class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Hari
                            Penjadwalan Pickup</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

@extends('layouts.dashboard')
@section('content')
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
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
                            <a href="{{ route('admin-hub.merch.stock') }}"
                                class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Merchandise</a>
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
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                aria-current="page">Pengiriman</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Tambah Pengiriman Baru</h1>
        </div>

        <div class="col-span-full ">
            <form action="{{ route('admin-hub.merch.pengiriman_baru_store') }}" method="POST" id="form_pengirimian">
                @csrf
                <div class="col-span-3">
                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Merchandise</h3>
                        <div class="grid grid-cols-12 gap-4">

                            <div class="lg:col-span-2 col-span-12 flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Merchandise</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="merchandise_select" name="merch[select]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""selected hidden>Pilih Merchandise</option>
                                        @foreach ($merchData as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="merchandise_select"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Merchandise</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Jumlah</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="amount" name="merch[ammount]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for=""
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Jumlah</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Tanggal</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="request_data" name="merch[date]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for=""
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tanggal
                                        Permintaan</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Catatan</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="request_data" name="merch[note]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for=""
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Catatan
                                        Permintaan</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Penerima</h3>
                        <div class="grid grid-cols-12 gap-4">

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Penerima</h2>
                            </div>
                            <div class="lg:col-span-5 col-span-12">
                                <div class="relative">
                                    <input type="text" id="customer_id" name="receiver[first_name]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for=""
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Depan</label>
                                </div>
                            </div>
                            <div class="lg:col-span-5 col-span-12">
                                <div class="relative">
                                    <input type="text" id="customer_id" name="receiver[last_name]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for=""
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                                        Belakang</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Alamat</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <input type="text" id="full_address" name="receiver[address]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                                        value="" placeholder=" " />
                                    <label for=""
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Alamat
                                        Lengkap</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Provinsi</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="province_select" name="receiver[province]"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""selected hidden>pilih provinsi</option>
                                        @foreach ($province as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="province_select" name="province"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Provinsi</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kabupaten</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="regency_select" name="receiver[regency]" disabled
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""selected hidden>pilih kabupaten</option>
                                    </select>
                                    <label for="regency_select" name="receiver[regency]"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Provinsi</label>
                                </div>
                            </div>

                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Kecamatan</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="district_select" name="receiver[district]" disabled
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""selected hidden>pilih Kecamatan</option>
                                    </select>
                                    <label for="district_select" name="district"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Provinsi</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-6 text-xl font-semibold dark:text-white">Informasi Lainnya</h3>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Status</h2>
                            </div>
                            <div class="lg:col-span-10 col-span-12">
                                <div class="relative">
                                    <select id="status_select" name="status"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                                        <option value=""selected>Pilih Status</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="belum_dikirim">Belum Dikirim</option>
                                        <option value="sudah_dikirim">Sudah Dikirim</option>
                                    </select>
                                    <label for="status_select"
                                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Status
                                        Permintaan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-full flex justify-end space-x-2">
                    <button type="button" id="submit-button"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-primary-700 border border-primary-700 rounded-lg hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Submit
                    </button>
                    {{-- <button type="button" onclick="window.location.href='{{ route('merch.merch-waiting-list') }}';"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button> --}}
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const province = @json($province);
        var regencies = null
        document.getElementById('province_select').addEventListener('change', function(){
            const value = parseInt(this.value, 10);
            var regency_select = document.getElementById('regency_select')
            var district_select = document.getElementById('district_select');
            regency_select.innerHTML = '<option value=""selected hidden>pilih Kabupaten</option>'; 
            district_select.innerHTML = '<option value=""selected hidden>pilih Kecamatan</option>'; 
            district_select.disabled = true;
            regency_select.disabled = false;
            province_data = province.find(p => p.id === value);
            regencies = province_data.regencies;
            regencies.forEach(function(regency) {
                let option = document.createElement('option');
                option.value = regency.id;  // Menentukan nilai option
                option.textContent = regency.name;  // Menentukan teks yang ditampilkan
                regency_select.appendChild(option);  // Menambahkan option ke dalam select
            }); 
        });
        document.getElementById('regency_select').addEventListener('change', function(){
            const value = parseInt(this.value, 10);
            var district_select = document.getElementById('district_select');
            district_select.disabled = false
            district_select.innerHTML = '<option value=""selected hidden>pilih Kecamatan</option>'
            regencies_data = regencies.find(p => p.id === value);
            districts = regencies_data.districts;
            districts.forEach(function(district){
                let option = document.createElement('option');
                option.value = district.id;  // Menentukan nilai option
                option.textContent = district.name;  // Menentukan teks yang ditampilkan
                district_select.appendChild(option);
            })
        })
        document.getElementById('submit-button').addEventListener('click', function (e) {
            const isDarkMode = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: 'Apakah Data Sudah Benar?',
                text: "Data akan dikirim!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: isDarkMode ? '#16a34a' : '#34d399',
                cancelButtonColor: isDarkMode ? '#d33' : '#f87171',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: isDarkMode ? 'bg-gray-800 text-white' : '',
                    title: isDarkMode ? 'text-white' : '',
                    icon: isDarkMode ? 'text-yellow-400' : ''
                },
                background: isDarkMode ? '#1f2937' : '#ffffff',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data telah disimpan.',
                        icon: 'success',
                        confirmButtonColor: isDarkMode ? '#16a34a' : '#34d399',
                        customClass: {
                            popup: isDarkMode ? 'bg-gray-800 text-white' : '',
                            title: isDarkMode ? 'text-white' : '',
                            icon: isDarkMode ? 'text-green-400' : ''
                        },
                        background: isDarkMode ? '#1f2937' : '#ffffff',
                    }).then(() => {
                        document.getElementById('form_pengirimian').submit();
                    });
                }
            });
        });
    </script>
@endsection

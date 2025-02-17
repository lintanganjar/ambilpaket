@extends('layouts.dashboard')
@section('content')
    {{-- @php
        $dataList = [
            (object) [
                'id' => 1,
                'agen_first_name' => 'Andi',
                'agen_last_name' => 'Simalakama',
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
                'account_name' => 'Andi Simalakama',
                'account_number' => '1234567890',
            ],
            (object) [
                'id' => 2,
                'agen_first_name' => 'Budi',
                'agen_last_name' => 'Santoso',
                'agen_phone_number' => 81345678901,
                'agen_email' => 'budi@example.com',
                'agen_password' => bcrypt('password456'),
                'agen_province_id' => (object) [
                    'id' => 2,
                    'name' => 'Jawa Barat',
                ],
                'agen_regency_id' => (object) [
                    'id' => 2,
                    'name' => 'Kota Bandung',
                ],
                'agen_district_id' => (object) [
                    'id' => 5,
                    'name' => 'Kecamatan Sukajadi',
                ],
                'agen_full_address' => 'Jl. Asia Afrika No. 10',
                'latitude' => '-6.914744',
                'longitude' => '107.609810',
                'building_type' => 'ruko',
                'building_status' => 'sewa',
                'location' => 'Bandung',
                'ktp_img' => 'ktp_budi.png',
                'npwp_img' => 'npwp_budi.png',
                'akta_pendiri_perusahaan_img' => 'akta_budi.png',
                'suket_domisili_usaha_img' => 'suket_domisili_budi.png',
                'surat_izin_usaha_perusahaan_img' => 'surat_izin_budi.png',
                'location_img' => 'location_budi.png',
                'building_condition_img' => 'condition_budi.png',
                'approval' => null,
                'bank_name' => 'BCA',
                'account_name' => 'Budi Santoso',
                'account_number' => '2345678901',
            ],
            (object) [
                'id' => 3,
                'agen_first_name' => 'Citra',
                'agen_last_name' => 'Pratama',
                'agen_phone_number' => 81456789012,
                'agen_email' => 'citra@example.com',
                'agen_password' => bcrypt('password789'),
                'agen_province_id' => (object) [
                    'id' => 1,
                    'name' => 'DKI Jakarta',
                ],
                'agen_regency_id' => (object) [
                    'id' => 1,
                    'name' => 'Kota Jakarta Selatan',
                ],
                'agen_district_id' => (object) [
                    'id' => 2,
                    'name' => 'Kecamatan Kebayoran Baru',
                ],
                'agen_full_address' => 'Jl. Sudirman No. 50',
                'latitude' => '-6.224980',
                'longitude' => '106.798470',
                'building_type' => 'kantor',
                'building_status' => 'milik sendiri',
                'location' => 'Jakarta Selatan',
                'ktp_img' => 'ktp_citra.png',
                'npwp_img' => 'npwp_citra.png',
                'akta_pendiri_perusahaan_img' => 'akta_citra.png',
                'suket_domisili_usaha_img' => 'suket_domisili_citra.png',
                'surat_izin_usaha_perusahaan_img' => 'surat_izin_citra.png',
                'location_img' => 'location_citra.png',
                'building_condition_img' => 'condition_citra.png',
                'approval' => 'approved',
                'bank_name' => 'Mandiri',
                'account_name' => 'Citra Pratama',
                'account_number' => '3456789012',
            ],
            (object) [
                'id' => 4,
                'agen_first_name' => 'Dedi',
                'agen_last_name' => 'Supriyadi',
                'agen_phone_number' => 81567890123,
                'agen_email' => 'dedi@example.com',
                'agen_password' => bcrypt('password321'),
                'agen_province_id' => (object) [
                    'id' => 4,
                    'name' => 'Bali',
                ],
                'agen_regency_id' => (object) [
                    'id' => 7,
                    'name' => 'Kota Denpasar',
                ],
                'agen_district_id' => (object) [
                    'id' => 10,
                    'name' => 'Kecamatan Denpasar Barat',
                ],
                'agen_full_address' => 'Jl. Imam Bonjol No. 7',
                'latitude' => '-8.670458',
                'longitude' => '115.212629',
                'building_type' => 'rumah',
                'building_status' => 'warisan',
                'location' => 'Denpasar',
                'ktp_img' => 'ktp_dedi.png',
                'npwp_img' => 'npwp_dedi.png',
                'akta_pendiri_perusahaan_img' => 'akta_dedi.png',
                'suket_domisili_usaha_img' => 'suket_domisili_dedi.png',
                'surat_izin_usaha_perusahaan_img' => 'surat_izin_dedi.png',
                'location_img' => 'location_dedi.png',
                'building_condition_img' => 'condition_dedi.png',
                'approval' => null,
                'bank_name' => 'BRI',
                'account_name' => 'Dedi Supriyadi',
                'account_number' => '4567890123',
            ],
            (object) [
                'id' => 5,
                'agen_first_name' => 'Eka',
                'agen_last_name' => 'Wijaya',
                'agen_phone_number' => 81678901234,
                'agen_email' => 'eka@example.com',
                'agen_password' => bcrypt('password654'),
                'agen_province_id' => (object) [
                    'id' => 5,
                    'name' => 'Sumatera Utara',
                ],
                'agen_regency_id' => (object) [
                    'id' => 12,
                    'name' => 'Kota Medan',
                ],
                'agen_district_id' => (object) [
                    'id' => 15,
                    'name' => 'Kecamatan Medan Barat',
                ],
                'agen_full_address' => 'Jl. Gatot Subroto No. 25',
                'latitude' => '3.595195',
                'longitude' => '98.672223',
                'building_type' => 'ruko',
                'building_status' => 'sewa',
                'location' => 'Medan',
                'ktp_img' => 'ktp_eka.png',
                'npwp_img' => 'npwp_eka.png',
                'akta_pendiri_perusahaan_img' => 'akta_eka.png',
                'suket_domisili_usaha_img' => 'suket_domisili_eka.png',
                'surat_izin_usaha_perusahaan_img' => 'surat_izin_eka.png',
                'location_img' => 'location_eka.png',
                'building_condition_img' => 'condition_eka.png',
                'approval' => 'rejected',
                'bank_name' => 'Danamon',
                'account_name' => 'Eka Wijaya',
                'account_number' => '5678901234',
            ],
        ];
    @endphp --}}
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
                                <a href="{{ route('admin-hub-agen.agen-registration') }}"
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Pendaftar
                                    Agen</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua Pendaftar Agen</h1>
            </div>
            <div class="sm:flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form action="#" method="GET" class="hidden lg:block">
                        <label for="agen-search" class="sr-only">Search</label>
                        <div class="relative lg:w-96">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" id="agen-search"
                                class="bg-white border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Cari">
                        </div>
                    </form>
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
                                    Nama
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Alamat
                                </th>
                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Kontak
                                </th>

                                <th scope="col"
                                    class="p-4 text-sm font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @forelse ($pendaftaran as $agen)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <div class="text-xs font-normal text-gray-900 dark:text-white">
                                                <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                                    {{ ucwords($agen->agen_first_name . ' ' . $agen->agen_last_name) }}
                                                </div>
                                                <div class="text-xs font-normal text-gray-900 dark:text-white">
                                                    {{ ucwords($agen->agen_email) }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="items-center p-4 mr-12 whitespace-nowrap">
                                        <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                            {{ $agen->agen_full_address }}
                                        </div>
                                        <div class="text-xs font-normal text-gray-900 dark:text-white">
                                            {{ ucwords($agen->district->name . ', ' . $agen->regency->name . ', ' . $agen->province->name) }}
                                        </div>
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ '+62 ' . preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1 $2 $3', $agen->agen_phone_number) }}

                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="detail-agen-approval-modal"
                                            data-modal-toggle="detail-agen-approval-modal"
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
                                    </td>
                                </tr>
                            @empty
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td colspan="5" class="text-center p-4 mr-12 whitespace-nowrap">Pendaftar kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('components.pagination', ['paginator' => $pendaftaran])

    <!-- Detail agen approval Modal -->
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="detail-agen-approval-modal">
        <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                    <h3 class="text-xl font-semibold dark:text-white">
                        Detail Pendaftar Agen
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-toggle="detail-agen-approval-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                    @include('pages.admin-hub.agen.pendaftaran-agen.detail')
                </div>
                <!-- Modal footer -->
                <div
                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-primary-700 border border-primary-700 rounded-lg hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Setujui
                    </button>
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Tolak
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add agen approval Modal -->
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="add-agen-approval-modal">
        <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                    <h3 class="text-xl font-semibold dark:text-white">
                        Tambah Agen Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-toggle="add-agen-approval-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                    @include('pages.admin-hub.agen.pendaftaran-agen.add-form')
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
                    <button type="button" data-modal-toggle="add-agen-approval-modal"
                        class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete agen Modal -->
    <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
        id="delete-agen-approval-modal">
        <div class="relative w-full h-full max-w-md px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-hide="delete-agen-approval-modal">
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
                    <h3 class="mt-5 mb-6 text-lg text-gray-900 dark:text-white">Apakah Anda yakin ingin menghapus agen ini?</h3>
                    <a href="#"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-800">
                        Ya, Saya yakin
                    </a>
                    <a href="#"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                        data-modal-hide="delete-agen-approval-modal">
                        Tidak, Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Download File Modal -->
    <div class="fixed inset-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto h-modal sm:h-full"
        id="download-file-agen-approval-modal">
        <div class="relative w-full max-w-md px-4 h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                        data-modal-hide="download-file-agen-approval-modal">
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
            const isDarkMode = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan disimpan!",
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
                        document.querySelector('form').submit();
                    });
                }
            });
        });
    </script>
    
@endsection

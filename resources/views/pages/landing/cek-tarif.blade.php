@extends('layouts.landing')
@section('content')
    @php
        $servicePrices = [
            (object) [
                'id' => 1,
                'service_type' => (object) [
                    'id' => 1,
                    'service_provider_id' => (object) [
                        'id' => 1,
                        'name' => 'Provider A',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type A1',
                    'note' => 'Description of Service Type A1',
                ],
                'price' => 100000,
                'origin_city' => 'City A',
                'destination_city' => 'City B',
            ],
            (object) [
                'id' => 2,
                'service_type' => (object) [
                    'id' => 2,
                    'service_provider_id' => (object) [
                        'id' => 1,
                        'name' => 'Provider A',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type A2',
                    'note' => 'Description of Service Type A2',
                ],
                'price' => 150000,
                'origin_city' => 'City A',
                'destination_city' => 'City C',
            ],
            (object) [
                'id' => 3,
                'service_type' => (object) [
                    'id' => 3,
                    'service_provider_id' => (object) [
                        'id' => 2,
                        'name' => 'Provider B',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type B1',
                    'note' => 'Description of Service Type B1',
                ],
                'price' => 120000,
                'origin_city' => 'City B',
                'destination_city' => 'City A',
            ],
            (object) [
                'id' => 4,
                'service_type' => (object) [
                    'id' => 4,
                    'service_provider_id' => (object) [
                        'id' => 2,
                        'name' => 'Provider B',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type B2',
                    'note' => 'Description of Service Type B2',
                ],
                'price' => 130000,
                'origin_city' => 'City B',
                'destination_city' => 'City D',
            ],
            (object) [
                'id' => 5,
                'service_type' => (object) [
                    'id' => 5,
                    'service_provider_id' => (object) [
                        'id' => 3,
                        'name' => 'Provider C',
                        'logo' => 'https://www.jne.co.id/cfind/source/images/logo.svg',
                    ],
                    'name' => 'Service Type C1',
                    'note' => 'Description of Service Type C1',
                ],
                'price' => 140000,
                'origin_city' => 'City C',
                'destination_city' => 'City A',
            ],
        ];
    @endphp
   <section class="bg-gradient-to-r from-[#FA523D] to-[#35383A] mt-20">
    <div class="w-full px-6 md:px-12 lg:px-20 xl:px-36">
        <div class="py-20">
            <p class="mb-3 text-lg font-normal text-gray-300 lg:text-xl"><i>Penasaran sama harga pengiriman kamu? Cek
                    disini
                    aja!</i></p>
            <form class="grid lg:grid-cols-12 gap-4 w-full">
                <label for="origin-city-search" class="sr-only">Origin City Search</label>
                <div class="relative col-span-4">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 mr-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="origin-city-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                        placeholder="Kota/Kecamatan/Kelurahan" required />
                </div>
                <label for="destination-city-search" class="sr-only">Destination City Search</label>
                <div class="relative col-span-4">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 mr-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="destination-city-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                        placeholder="Kota/Kecamatan/Kelurahan" required />
                </div>
                <label for="weight-search" class="sr-only">Weight</label>
                <div class="relative col-span-2">
                    <input type="text" id="weight-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2.5"
                        placeholder="0.00/Kg" required />
                </div>
                <div class="realtive col-span-2">
                    <button type="submit" onclick="window.location.href='{{ route('landing-page.delivery-price') }}';"
                        class="p-2.5 w-full text-sm font-medium text-white bg-customprimary-500 rounded-lg border border-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Cek harga
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

    <div class="w-full px-6 md:px-12 lg:px-20 xl:px-36 my-12">

        <div class="w-full p-4 rounded-lg bg-gray-200 my-2 flex flex-wrap justify-center lg:justify-between items-center gap-4">
            <div class="flex flex-wrap gap-3 justify-center lg:justify-start">
                <div>
                    <input type="radio" id="all-filter" name="filter" value="filter" class="hidden peer" required
                        checked />
                    <label for="all-filter"
                        class="inline-flex items-center justify-between w-full p-2 px-5 font-medium text-gray-700 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:bg-customprimary-500 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100 ">
                        <div class="block">
                            <div class="w-full justify-center text-sm">Semua</div>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" id="filter1" name="filter" value="filter" class="hidden peer" required />
                    <label for="filter1"
                        class="inline-flex items-center justify-between w-full p-2 px-5 font-medium text-gray-700 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:bg-customprimary-500 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100 ">
                        <div class="block">
                            <div class="w-full justify-center text-sm">Cargo</div>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" id="filter2" name="filter" value="filter" class="hidden peer" required />
                    <label for="filter2"
                        class="inline-flex items-center justify-between w-full p-2 px-5 font-medium text-gray-700 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:bg-customprimary-500 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100 ">
                        <div class="block">
                            <div class="w-full justify-center text-sm">Reguler</div>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" id="filter3" name="filter" value="filter" class="hidden peer" required />
                    <label for="filter3"
                        class="inline-flex items-center justify-between w-full p-2 px-5 font-medium text-gray-700 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:bg-customprimary-500 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100 ">
                        <div class="block">
                            <div class="w-full justify-center text-sm">Express</div>
                        </div>
                    </label>
                </div>
                <div>
                    <input type="radio" id="filter4" name="filter" value="filter" class="hidden peer" required />
                    <label for="filter4"
                        class="inline-flex items-center justify-between w-full p-2 px-5 font-medium text-gray-700 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:bg-customprimary-500 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100 ">
                        <div class="block">
                            <div class="w-full justify-center text-sm">Trucking</div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="w-full sm:w-auto">
                <select id="sort" name="sort"
                    class="block w-full pl-3 pr-10 py-2 text-base font-medium text-gray-700 border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="" disabled selected>Urutkan</option>
                    <option value="oldest">Oldest</option>
                    <option value="popular">Most Popular</option>
                    <option value="rating">Highest Rating</option>
                    <option value="price">Lowest Price</option>
                </select>
            </div>
        </div>

        <div class="mt-5">
            <ul class="flex flex-col space-y-3 w-full">
                @foreach ($servicePrices as $servicePrice)
                <li>
                    <input type="radio" id="service-{{ $servicePrice->id }}" name="hosting" value="hosting-{{ $servicePrice->id }}" class="hidden peer" required />
                    <label for="service-{{ $servicePrice->id }}" class="block w-full p-4 text-gray-500 bg-gray-50 border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-customprimary-500 peer-checked:border-2 hover:text-gray-600 hover:bg-gray-100 ">
                        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 text-center sm:text-left">
                            <div>
                                <img src="{{ $servicePrice->service_type->service_provider_id->logo }}" alt="{{ $servicePrice->service_type->service_provider_id->name }}" class="w-12 h-12 mx-auto" />
                            </div>
                            <div class="font-medium">
                                <div class="text-sm text-gray-500 ">Jenis Layanan</div>
                                <div class="text-sm text-gray-900 ">{{ $servicePrice->service_type->name }}</div>
                            </div>
                            <div class="font-medium">
                                <div class="text-sm text-gray-500 ">Estimasi Pengiriman</div>
                                <div class="text-sm text-gray-900 ">2-3 Hari</div>
                            </div>
                            <div class="font-medium">
                                <div class="text-sm text-gray-500 ">Harga</div>
                                <div class="text-sm text-gray-900 ">Rp. {{ number_format($servicePrice->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </label>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection

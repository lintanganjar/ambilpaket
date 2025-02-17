@php
    $data = (object) [
        'id' => 1,
        'customer_umkm_id' => (object) [
            'id' => 1,
            'company_name' => 'Toko Maju Jaya',
            'product_type' => 'Makanan',
        ],
        'timeline' => (object) [
            'date' => '2024-11-20',
        ],
        'parcel_assignment' => (object) [
            'kurir_name' => 'Kurir 1',
            'assignment_date' => '2024-11-20',
        ],
        'resi_number' => 'RESI001',
        'actual_resi_number' => 'ACTUAL001',
        'agen_id' => 1,
        'customer_id' => 101,
        'price' => 20000,
        'agen_commission' => 5000,
        'item_type' => 'Electronics',
        'item_name' => 'Smartphone',
        'amount' => 1,
        'weight' => '200g',
        'item_height' => '5cm',
        'item_width' => '10cm',
        'item_lenght' => '15cm',
        'note' => 'Fragile item',
        'service_price_id' => 101,
        'estimation_date' => '2024-11-20',
        'proof_img' => '/images/proof_img1.png',
        'status' => 'Dalam Perjalanan',
    ];
@endphp

<form action="#">
    <div class="col-span-3">
        <div class="grid grid-cols-12 gap-4">
            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Usaha</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <select id="customer_umkm_id" disabled
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                        <option value="{{ $data->customer_umkm_id->id }}" selected>
                            {{ ucwords($data->customer_umkm_id->company_name) }}</option>
                        <!-- Add other umkms as options -->
                        {{-- @foreach ($umkms as $umkm)
                    <option value="{{ $umkm->id }}">{{ ucwords($umkm->name) }}</option>
                @endforeach --}}
                    </select>
                    <label for="customer_umkm_id"
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
                        value="{{ ucwords($data->customer_umkm_id->product_type) }}" placeholder=" " disabled />
                    <label for="product_type"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tipe
                        Usaha</label>
                </div>
            </div>


            <div class="lg:col-span-2 col-span-12 flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Tanggal Pengiriman</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <input type="text" id="date"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="{{ ucwords($data->timeline->date) }}" placeholder=" " disabled />
                    <label for="date"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tanggal
                        Pengiriman</label>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nomor Resi</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <input type="text" id="resi_number"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="{{ ucwords($data->resi_number) }}" placeholder=" " disabled />
                    <label for="resi_number"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nomor
                        Resi</label>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Tipe Barang</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <input type="text" id="resi_number"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="{{ ucwords($data->item_type) }}" placeholder=" " disabled />
                    <label for="resi_number"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tipe
                        Barang</label>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Barang
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <input type="text" id="resi_number"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="{{ ucwords($data->item_name) }}" placeholder=" " disabled />
                    <label for="resi_number"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                        Barang</label>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Status</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <input type="text" id="status"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="{{ ucwords($data->status) }}" placeholder=" " disabled />
                    <label for="status"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Status</label>
                </div>
            </div>
        </div>
    </div>

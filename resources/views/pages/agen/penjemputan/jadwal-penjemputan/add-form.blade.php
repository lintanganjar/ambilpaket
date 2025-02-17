@php
    $data = (object) [
        'id' => 1,
        'agen_id' => (object) [
            'id' => 1,
            'first_name' => 'Budi',
            'last_name' => 'Santoso',
        ],
        'customer_umkm_id' => (object) [
            'id' => 1,
            'company_name' => 'Toko Maju Jaya',
            'product_type' => 'Makanan',
            'days_of_pickup' => '[senin, rabu, jumat]',
            'time_of_pickup' => '09:00:00',
        ],
    ];
@endphp
<form action="#">
    <div class="col-span-3">
        <div class="grid grid-cols-12 gap-4">
            <div class="lg:col-span-2 col-span-12 flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Agen</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <select id="agen_id"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                        <option value="" disabled selected>-- Pilih Agen --</option>
                        <option value="1">Agen A</option>
                        <option value="2">Agen B</option>
                        <option value="3">Agen C</option>
                        <option value="4">Agen D</option>
                        <option value="5">Agen E</option>
                    </select>
                    <label for="agen_id"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama
                        Lengkap</label>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Nama Usaha</h2>
            </div>
            <div class="lg:col-span-10 col-span-12">
                <div class="relative">
                    <select id="customer_umkm_id"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer">
                        <option value="" disabled selected>-- Pilih Umkm --</option>
                        <option value="1">Umkm A</option>
                        <option value="2">Umkm B</option>
                        <option value="3">Umkm C</option>
                        <option value="4">Umkm D</option>
                        <option value="5">Umkm E</option>
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
                    <input type="text" id="customer_umkm_id"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="" placeholder=" " />
                    <label for="customer_umkm_id"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tipe
                        Usaha</label>
                </div>
            </div>

            <div class="lg:col-span-2 col-span-12 lg:flex items-center">
                <h2 class="text-xs font-medium text-gray-900 dark:text-white">Waktu Penjemputan</h2>
            </div>
            <div class="lg:col-span-5 col-span-12">
                <div class="relative">
                    <input type="text" id="customer_umkm_id"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="" placeholder=" " />
                    <label for="customer_umkm_id"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Waktu
                        Penjemputan Pickup</label>
                </div>
            </div>
            <div class="lg:col-span-5 col-span-12">
                <div class="relative">
                    <input type="text" id="customer_umkm_id"
                        class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:bg-gray-800 dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-customprimary-500 peer"
                        value="" placeholder=" " />
                    <label for="customer_umkm_id"
                        class="absolute text-xs text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-customprimary-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Hari
                        Penjemputan Pickup</label>
                </div>
            </div>
        </div>
    </div>

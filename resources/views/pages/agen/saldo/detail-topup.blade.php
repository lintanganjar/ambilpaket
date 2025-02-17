@php

    $top_up_transactions = (object) (object) [
        'transaction_id' => '22222',
        'amount' => 50000,
        'request_status' => 'Sukses',
        'payment_proof' => 'https://example.com/payment1.jpg',
        'create_at' => '2024-11-19',
        'payment_methods' => (object) [
            'bank_name' => 'BRI',
            'account_name' => 'John',
            'account_number' => '0222222222',
        ],
    ];

@endphp
@extends('layouts.dashboard')

@section('content')
    <div class="p-4 my-2">
        <div class="p-4 rounded-md bg-white border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-start gap-5">
                <a href="{{ route('saldo') }}">
                    <svg class="w-8 h-8 text-gray-800 dark:text-white transform transition-transform duration-200 hover:scale-110"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </a>
                <h2 class="text-lg text-black dark:text-white font-semibold">Detail Pembayaran</h2>
            </div>
            <div class="flex flex-col  lg:px-28 justify-center">
                <div class=" rounded-md p-4 flex flex-col lg:space-y-2 items-center">
                    <svg class="lg:w-24 lg:h-24 w-16 h-16 text-customprimary-500 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                            clip-rule="evenodd" />
                    </svg>

                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                        Rp{{ number_format($top_up_transactions->amount, 0, ',', '.') }}</p>
                    <p class="lg:text-sm text-xs  text-gray-500">Segera upload bukti pembayaran</p>
                </div>
                <div class="grid grid-cols-2 mt-4 border border-gray-300 rounded-md p-3 lg:p-10">
                    <div class="lg:space-y-4 space-y-3 lg:text-base text-sm font-medium text-black dark:text-white">
                        <p>ID Transaksi</p>
                        <p>Tanggal</p>
                        <p>Durasi Pembayaran</p>
                        <p>Jumlah Top Up</p>
                        <p>Nama Bank</p>
                        <p>Nama Pemilik</p>
                        <p>Rekening Tujuan</p>
                        <p>Status</p>

                    </div>
                    <div class="space-y-3 text-sm lg:space-y-4 lg:text-base font-medium text-black dark:text-white">
                        <!-- Access transaction_id from selectedBank object -->
                        <p>{{ $top_up_transactions->transaction_id ?? 'N/A' }}</p>
                        <p>{{ $top_up_transactions->created_at ?? 'N/A' }}</p>
                        <p>23 jam 54 menit </p>
                        <p>Rp{{ number_format($top_up_transactions->amount, 0, ',', '.') }}</p>
                        <p>{{ $top_up_transactions->payment_methods->bank_name ?? 'N/A' }}</p>
                        <p>{{ $top_up_transactions->payment_methods->account_name ?? 'N/A' }}</p>
                        <div class="flex gap-5">
                            <p id="amount">{{ $top_up_transactions->payment_methods->account_number ?? 'N/A' }}</p>
                            <button id="copyButton" onclick="copyToClipboard()"
                                class="button border-2 border-blue-500 rounded lg:rounded-md py-0.5 text-teal-500 px-2 text-xs hover:bg-teal-200">
                                Salin
                            </button>
                        </div>
                        <p>{{ $top_up_transactions->request_status ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="flex  mt-9">
                    <!-- Modal toggle -->
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="px-4 py-2 w-full block text-blue-500 text-base font-semibold border-2 border-blue-500 hover:text-white rounded-md hover:bg-blue-500"
                        type="button">
                        Upload Sekarang
                    </button>

                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-28 md:top-4 md:inset-0 h-modal sm:h-full">
                        <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="lg:text-xl text-lg font-semibold text-gray-900 dark:text-white">
                                        Upload Bukti Pembayaran
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 dark:text-white space-y-5 max-h-96 overflow-y-auto">
                                    <p class="font-semibold">File Gambar</p>
                                    <div class="my-4 flex items-center  space-x-4">
                                        <label for="file-upload"
                                            class="px-3 py-2 dark:text-white text-sm lg:text-base border-[3px] font-medium border-customprimary-500 rounded-md hover:bg-customprimary-500 hover:text-white text-black cursor-pointer">
                                            Pilih File
                                        </label>
                                        <input type="file" id="file-upload" class="hidden" onchange="updateFileName()" />
                                        <span id="file-name" class="text-gray-700 text-xs lg:text-sm dark:text-white max-w-[190px] md:max-w-[570px]  lg:max-w-[670px] break-words">Tidak ada file yang dipilih</span>
                                    </div>
                                    
                                    
                                    <div id="image-preview" class="hidden mt-4 flex justify-center">
                                        <img id="uploaded-image" class="max-w-full max-h-96 h-auto rounded-md" />
                                    </div>
                                
                                  
                                </div>

                                <!-- Modal footer -->
                                <div
                                    class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="detail-pickup-submission-history-modal"
                                            data-modal-toggle="detail-pickup-submission-history-modal"
                                            class="inline-flex items-center px-4 py-2 text-xs font-medium text-center text-custompurple-500 border border-custompurple-500 rounded-lg hover:text-white hover:bg-custompurple-500 focus:ring-4 focus:ring-custompurple-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01" />
                                            </svg>

                                            </svg>
                                            Upload
                                        </button>

                                        <button type="button" data-modal-toggle="detail-pickup-submission-history-modal"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                            <svg class="w-4 h-4 mr-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Tutup
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
    <script>
          function updateFileName() {
        const fileInput = document.getElementById('file-upload');
        const fileName = document.getElementById('file-name');
        const imagePreview = document.getElementById('image-preview');
        const uploadedImage = document.getElementById('uploaded-image');
        
        // Update file name text
        if (fileInput.files.length > 0) {
            fileName.textContent = fileInput.files[0].name;

            // Display the uploaded image
            const reader = new FileReader();
            reader.onload = function(e) {
                uploadedImage.src = e.target.result;
                imagePreview.classList.remove('hidden'); // Show the image preview
            }
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            fileName.textContent = 'Tidak ada file yang dipilih';
            imagePreview.classList.add('hidden'); // Hide the image preview
        }
    }
        function copyToClipboard() {
            // Ambil elemen yang berisi jumlah
            const amountText = document.getElementById('amount').innerText;

            // Buat elemen input sementara untuk menyalin teks
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = amountText;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Ubah teks tombol menjadi 'Tersalin'
            const button = document.getElementById('copyButton');
            button.textContent = 'Tersalin';

            // Nonaktifkan tombol sementara selama 2 detik untuk mencegah klik berulang
            button.disabled = true;
            setTimeout(() => {
                button.disabled = false;
                button.textContent = 'Salin';
            }, 2000);
        };

    
    </script>
@endsection

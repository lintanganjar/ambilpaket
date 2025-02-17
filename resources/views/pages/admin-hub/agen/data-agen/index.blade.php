@extends('layouts.dashboard')
@section('content')
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
                                <a href="{{ route('admin-hub-agen.data-agen') }}"
                                    class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Agen</a>
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
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua Agen</h1>
            </div>
            <div class="sm:flex">
                <div class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <form action="" method="GET" class="hidden lg:block">
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
                            @foreach ($data_agen as $agen)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <img class="w-10 h-10 rounded-full hidden lg:block md:block"
                                                src="{{ asset('static/images/users/' . $agen->profile_img) }}"
                                                alt="avatar">
                                            <div class="text-xs font-normal text-gray-900 dark:text-white">
                                                <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                                    {{ ucwords($agen->first_name . ' ' . $agen->last_name) }}
                                                </div>
                                                <div class="text-xs font-normal text-gray-900 dark:text-white">
                                                    {{ ucwords($agen->user->email) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="items-center p-4 mr-12 whitespace-nowrap">
                                        <div class="text-xs font-semibold text-gray-900 dark:text-white">
                                            {{ $agen->full_address }}
                                        </div>
                                        <div class="text-xs font-normal text-gray-900 dark:text-white">
                                            {{ ucwords($agen->district->name . ', ' . $agen->regency->name . ', ' . $agen->province->name) }}
                                        </div>
                                    </td>

                                    <td class="p-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ '+62 ' . preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1 $2 $3', $agen->phone_number) }}

                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" data-modal-target="detail-agen-modal-{{$agen->id}}"
                                            data-modal-toggle="detail-agen-modal-{{$agen->id}}"
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

                            {{-- Modal Data --}}

                                <!-- Detail agen Modal -->
                                <div class="fixed left-0 right-0 z-50 items-center justify-center hidden overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full"
                                    id="detail-agen-modal-{{$agen->id}}">
                                    <div class="relative w-full h-full max-w-4xl px-4 md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                            <!-- Modal header -->
                                            <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-700">
                                                <h3 class="text-xl font-semibold dark:text-white">
                                                    Detail Agen
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                                                    data-modal-toggle="detail-agen-modal-{{$agen->id}}">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6 max-h-96 overflow-y-auto">
                                                @include('pages.admin-hub.agen.data-agen.detail',['agen' => $agen,'partnerships' => $partnerships])
                                            </div>
                                            <!-- Modal footer -->
                                            <div
                                                class="items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-700 flex justify-end space-x-2">
                                                <button type="button" id="edit-btn" data-modal-id="detail-agen-modal-{{$agen->id}}"
                                                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-primary-700 border border-primary-700 rounded-lg hover:text-white hover:bg-primary-700 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button type="button" id="close-btn" data-modal-toggle="detail-agen-modal-{{$agen->id}}"
                                                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Tutup
                                                </button>
                                                <button type="submit" id="submit-btn"
                                                    class="hidden inline-flex items-center px-3 py-2 text-xs font-medium text-center text-green-500 border border-green-500 rounded-lg hover:text-white hover:bg-green-500 focus:ring-4 focus:ring-customblue-200 dark:text-white dark:border-none dark:bg-green-400 dark:hover:bg-green-500 dark:focus:ring-green-600">
                                                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Submit
                                                </button>
                                                <button type="button" id="cancel-btn" data-modal-id="detail-agen-modal-{{$agen->id}}"
                                                    class="hidden inline-flex items-center px-3 py-2 text-xs font-medium text-center text-red-600 border border-red-600 rounded-lg hover:text-white hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:text-white dark:border-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('components.pagination', ['paginator' => $data_agen])
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

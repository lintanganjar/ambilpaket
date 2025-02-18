<nav class="fixed z-50 w-full bg-white border-gray-200 px-4 lg:px-6 py-6 ">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
        <a href="" class="flex items-center">
            <img src="{{ asset('static/images/ambilpaket.png') }}" class="mr-1 h-10" alt="AmbilPaket Logo" />
            <span class="text-base font-extrabold whitespace-nowrap text-customprimary-500  uppercase">
                AmbilPaket
            </span>
        </a>
        <div class="flex items-center lg:order-2">
            <!-- Menu Desktop -->
            <div class="hidden lg:flex space-x-4">
                <a href="{{ route('auth') }}"
                    class="text-white bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 ">
                    Masuk
                </a>
                <a href=""
                    class="text-customprimary-500 hover:text-white  hover:bg-customprimary-500 focus:ring-4 ring-1 ring-customprimary-500 focus:ring-customprimary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 ">
                    Daftar
                </a>
            </div>

            <!-- Button untuk menu mobile -->
            <button data-collapse-toggle="mobile-menu-2" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <!-- Menu mobile -->
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col items-center mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('customer') }}"
                        class="relative block py-2 pl-3 pr-4 lg:p-0 @if (Route::is('customer')) text-customprimary-700 lg:before:content-[''] lg:before:absolute lg:before:bottom-[-32px] lg:before:left-0 lg:before:w-full lg:before:h-[3px] lg:before:bg-customprimary-700 lg:before:rounded-lg lg:before:opacity-100 @else text-gray-700 hover:text-customprimary-700 lg:before:content-[''] lg:before:absolute lg:before:bottom-[-32px] lg:before:left-0 lg:before:w-full lg:before:h-[3px] lg:before:bg-customprimary-700 lg:before:rounded-lg lg:before:opacity-0 hover:lg:before:opacity-100 lg:before:transition-opacity lg:before:duration-300 @endif">
                        Customer
                    </a>
                </li>
                <li>
                    <a href="{{ route('umkm') }}"
                        class="relative block py-2 pl-3 pr-4 lg:p-0 @if (Route::is('umkm')) text-customprimary-700 lg:before:content-[''] lg:before:absolute lg:before:bottom-[-32px] lg:before:left-0 lg:before:w-full lg:before:h-[3px] lg:before:bg-customprimary-700 lg:before:rounded-lg lg:before:opacity-100 @else text-gray-700 hover:text-customprimary-700 lg:before:content-[''] lg:before:absolute lg:before:bottom-[-32px] lg:before:left-0 lg:before:w-full lg:before:h-[3px] lg:before:bg-customprimary-700 lg:before:rounded-lg lg:before:opacity-0 hover:lg:before:opacity-100 lg:before:transition-opacity lg:before:duration-300 @endif">
                        UMKM
                    </a>
                </li>
                <li>
                    <a href="{{ route('agen') }}"
                        class="relative block py-2 pl-3 pr-4 lg:p-0 @if (Route::is('agen')) text-customprimary-700 lg:before:content-[''] lg:before:absolute lg:before:bottom-[-32px] lg:before:left-0 lg:before:w-full lg:before:h-[3px] lg:before:bg-customprimary-700 lg:before:rounded-lg lg:before:opacity-100 @else text-gray-700 hover:text-customprimary-700 lg:before:content-[''] lg:before:absolute lg:before:bottom-[-32px] lg:before:left-0 lg:before:w-full lg:before:h-[3px] lg:before:bg-customprimary-700 lg:before:rounded-lg lg:before:opacity-0 hover:lg:before:opacity-100 lg:before:transition-opacity lg:before:duration-300 @endif">
                        Agen
                    </a>
                </li>
                <!-- Menu untuk mobile -->
                <div class="flex flex-col lg:hidden space-y-4 mt-3 w-full">
                    <li class="w-full">
                        <a href=""
                            class="block w-full text-center text-customprimary-500 hover:text-white  hover:bg-customprimary-500 focus:ring-4 ring-1 ring-customprimary-500 focus:ring-customprimary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2  focus:outline-none ">
                            Daftar
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('auth') }}"
                            class="block w-full text-center text-white bg-customprimary-500 hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 0 focus:outline-none ">
                            Masuk
                        </a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>

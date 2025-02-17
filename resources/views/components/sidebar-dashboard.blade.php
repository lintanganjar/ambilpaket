@php
    $url = explode('/', request()->url());
    $page_slug = $url[count($url) - 2];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0"
    aria-label="Sidebar">
    <div
        class="h-full px-3 py-5 overflow-y-auto scrollbar-hide bg-white border-r hover:text-red-500 border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
            <img src="{{ asset('static/images/ambilpaket.svg') }}" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
            <span class="text-base font-black whitespace-nowrap  text-customprimary-500 dark:text-white tracking-wide leading-none">
                AmbilPaket
            </span>
        </a>
        <ul class="space-y-2 font-medium">
            {{ $slot }}
        </ul>
    </div>
</aside>

<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
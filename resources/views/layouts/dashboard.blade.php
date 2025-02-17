<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <script>
        // On page load or when changing themes, best to add inline in head to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="#">
    <meta name="author" content="#">
    <meta name="generator" content="Laravel">

    <style>
        .custom-sidebar-collapsed .self-center,
        .custom-sidebar-collapsed ul span,
        .custom-sidebar-collapsed ul button {
            display: none;
        }

        .custom-sidebar-collapsed .h-6 {
            margin-right: 0;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <title>Dashboard - </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    @if (isset($page->params['robots']))
        <meta name="robots" content="{{ $page->params['robots'] }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="title">
    <meta name="twitter:description" content="description">
    <meta name="twitter:image" content="#">
    <!-- Facebook -->
    <meta property="og:url" content="#">
    <meta property="og:title" content="title">
    <meta property="og:description" content="description">
    <meta property="og:type" content="website">
    <meta property="og:image" content="#">
    <meta property="og:image:type" content="image/png">

    <script>

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpenIcon = document.getElementById('eyeOpenIcon');
            const eyeClosedIcon = document.getElementById('eyeClosedIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpenIcon.style.display = 'block';
                eyeClosedIcon.style.display = 'none';
            } else {
                passwordInput.type = 'password';
                eyeOpenIcon.style.display = 'none';
                eyeClosedIcon.style.display = 'block';
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const toggleButton = document.querySelector("[sidebar-toggle-target]");
            
            const sidebar = document.querySelector("#logo-sidebar");
            console.log(sidebar);
            const navbarNav = document.querySelector("#logo-navbar nav > div");
            const mainContent = document.querySelector("#main-content");

            toggleButton.addEventListener("click", function() {
                sidebar.classList.toggle("custom-sidebar-collapsed");

                if (sidebar.classList.contains("w-64")) {
                    sidebar.classList.remove("w-64");
                    sidebar.classList.add("hidden");
                    navbarNav.classList.remove("lg:ml-64");
                    // navbarNav.classList.remove("lg:pr-72");
                    mainContent.classList.remove("lg:ml-64");
                } else {
                    sidebar.classList.remove("hidden");
                    sidebar.classList.add("w-64");
                    navbarNav.classList.add("lg:ml-64");
                    // navbarNav.classList.add("lg:pr-72");
                    mainContent.classList.add("lg:ml-64");
                }
            });

            document.getElementById('edit-btn').addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-id');
                const inputs = document.querySelectorAll(`#${modalId} input, #${modalId} select`);

                inputs.forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-gray-50');
                });

                const checkboxes = document.querySelectorAll(`#${modalId} input[type="checkbox"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.disabled = false;
                });

                const listItems = document.querySelectorAll(`#${modalId} li`);
                listItems.forEach(listItem => {
                    listItem.classList.remove('bg-gray-50');
                    listItem.classList.add('bg-white', 'cursor-pointer', 'transition', 'transform',
                        'hover:scale-105', 'hover:shadow-lg');
                });

                const labels = document.querySelectorAll(`#${modalId} label`);
                labels.forEach(label => {
                    label.classList.add('cursor-pointer');
                });

                document.getElementById('submit-btn').classList.remove('hidden');
                document.getElementById('cancel-btn').classList.remove('hidden');
                document.getElementById('close-btn').classList.add('hidden');
                this.classList.add('hidden');

                const imgDiv = document.querySelector(`#${modalId} .img-action-div`);
                imgDiv.classList.remove('hidden');
            });

            document.getElementById('cancel-btn').addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-id');
                const inputs = document.querySelectorAll(`#${modalId} input, #${modalId} select`);

                inputs.forEach(input => {
                    input.disabled = true;
                    input.classList.add('bg-gray-50');
                });

                const checkboxes = document.querySelectorAll(`#${modalId} input[type="checkbox"]`);
                checkboxes.forEach(checkbox => {
                    checkbox.disabled = true;
                });

                const listItems = document.querySelectorAll(`#${modalId} li`);
                listItems.forEach(listItem => {
                    listItem.classList.add('bg-gray-50');
                    listItem.classList.remove('bg-white', 'cursor-pointer', 'transition',
                        'transform',
                        'hover:scale-105', 'hover:shadow-lg');
                });

                const labels = document.querySelectorAll(`#${modalId} label`);
                labels.forEach(label => {
                    label.classList.remove('cursor-pointer');
                });

                document.getElementById('submit-btn').classList.add('hidden');
                document.getElementById('edit-btn').classList.remove('hidden');
                document.getElementById('close-btn').classList.remove('hidden');
                this.classList.add('hidden');

                const imgDiv = document.querySelector(`#${modalId} .img-action-div`);
                imgDiv.classList.add('hidden');
            });
        });
    </script>
</head>
@php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
@endphp

<body class="{{ $whiteBg ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }}">
    <div id="logo-navbar" class="w-auto z-30 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <x-navbar-dashboard />
    </div>
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

        @if (Request::is('admin-hub*'))
            <x-sidebar.admin-hub-sidebar />
        @elseif (Request::is('fe-test/agen*'))
            <x-sidebar.agen-sidebar />
        @elseif (Request::is('fe-test/superadmin*'))
            <x-sidebar.superadmin-sidebar />
        @elseif (Request::is('fe-test/finance*'))
            <x-sidebar.finance-sidebar />
        @else
        @endif

        <div id="main-content"
            class="relative w-full h-full overflow-y-auto scrollbar-hide bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main>
                @yield('content')
            </main>
            <x-footer-dashboard />
        </div>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

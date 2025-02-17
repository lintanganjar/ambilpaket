<!DOCTYPE html>
<html lang="en" class="dark">

<head>
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
    </style>

    <title>AmbilPaket- </title>
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
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
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
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

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
    </script>
</head>
@php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
@endphp

<body class="{{ $whiteBg ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }}">
    <nav class="fixed z-50 w-full bg-transparent border-gray-200 px-4 lg:px-6 py-6 dark:bg-gray-800">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
            <a href="https://flowbite.com" class="flex items-center">
                <img src="{{ asset('static/images/ambilpaket.png') }}" class="mr-1 h-12" alt="AmbilPaket Logo" />
                {{-- <span class="self-center text-xl font-bold whitespace-nowrap dark:text-white">AmbilPaket</span> --}}
                <span class="text-lg font-bold whitespace-nowrap text-white dark:text-white tracking-wide leading-none">
                    AmbilPaket
                </span>
            </a>
        </div>
    </nav>
    <div id="main-content"
        class="relative w-full h-full overflow-y-auto overflow-x-hidden bg-gray-100 dark:bg-gray-900">
        <main>
            <section class="w-full bg-center bg-no-repeat bg-cover bg-blend-multiply bg-black/70"
                style="background-image: url('{{ asset('static/images/hero3.jpeg') }}');">
                <div class="px-6 md:px-12 lg:px-20 xl:px-36 text-left">
                    <div class="grid grid-cols-1 md:grid-cols-2 h-screen ">
                        <div class="flex flex-col justify-center items-center md:items-start px-8 md:px-16 text-white">
                            <h1
                                class="mb-4 text-3xl md:text-4xl lg:text-5xl md:text-left text-center font-extrabold tracking-tight leading-none">
                                Selamat Datang di <br> AmbilPaket!
                            </h1>
                            <p
                                class="mb-8 text-sm md:text-base lg:text-lg md:text-left text-center font-normal text-gray-300">
                                AmbilPaket siap mengantar dan mengirim paket kamu dari rumah
                                loh, kalian cukup di rumah aja sambil nunggu paketnya dikirim dan
                                diantar ke tujuan kalian!
                            </p>
                        </div>

                        <div class="flex justify-center items-center">
                            <div class="w-full max-w-md p-8">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="email"
                                            class="block text-sm font-medium text-white mb-2">Email</label>
                                        <input type="email" id="email" name="email"
                                            placeholder="Tulis email kamu disini..."
                                            class="w-full p-3 border border-gray-300 rounded-lg bg-transparent backdrop-blur-lg text-white focus:outline-none focus:ring-2 focus:ring-white">
                                    </div>
                                    <div class="mb-6">
                                        <label for="password" class="block text-sm font-medium text-white mb-2">Kata
                                            sandi</label>
                                        <div class="relative">
                                            <input type="password" id="password" name="password"
                                                placeholder="Tulis kata sandi kamu disini..."
                                                class="w-full p-3 border border-gray-300 rounded-lg bg-transparent backdrop-blur-lg text-white focus:outline-none focus:ring-2 focus:ring-white">
                                            <button type="button"
                                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-white focus:outline-none"
                                                onclick="togglePasswordVisibility()">
                                                <svg id="eyeOpenIcon" class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24" style="display: none;">
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                <svg id="eyeClosedIcon" class="w-6 h-6 " aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    
                                    <button type="submit"
                                        class="w-full py-3 px-6 text-white bg-customprimary-500 hover:bg-customprimary-700 rounded-lg">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>
    </div>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

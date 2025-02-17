{{-- @extends('layouts.dashboard')
@section('sidebar')
<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="testing-meni" tittle="test1"/>
    <x-sidebar-menu-dropdown-dashboard routeName="testing-dropdown" tittle="test2.*">
        <x-sidebar-menu-dropdown-item-dashboard routeName="testing-item" tittle="test2.item1"/>
    </x-sidebar-menu-dropdown-dashboard>
</x-sidebar-dashboard>
@endsection
@section('navbar')
    <x-navbar-dashboard></x-navbar-dashboard>
@endsection

@section('content')
@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Sidebar kecil */
        .custom-sidebar-collapsed {
            width: 64px;
        }

        .custom-sidebar-collapsed .sidebar-text {
            display: none;
        }
    </style>
</head>

<body>

    <div class="flex">
        <!-- Sidebar -->
        <div id="custom-sidebar" class="w-64 transition-all duration-300 bg-gray-800 text-white h-screen">
            <ul class="flex flex-col space-y-2 p-4">
                <li class="flex items-center space-x-2">
                    <i class="fas fa-home"></i>
                    <span class="text-sm sidebar-text">Dashboard</span>
                </li>
                <li class="flex items-center space-x-2">
                    <i class="fas fa-user"></i>
                    <span class="text-sm sidebar-text">Profile</span>
                </li>
                <li class="flex items-center space-x-2">
                    <i class="fas fa-cog"></i>
                    <span class="text-sm sidebar-text">Settings</span>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <!-- Hamburger Button -->
            <button sidebar-toggle-target="#custom-sidebar" class="bg-gray-800 text-white p-2 rounded">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-xl font-bold mt-4">Main Content Area</h1>
            <p>Here goes your main content...</p>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleButtons = document.querySelectorAll("[sidebar-toggle-target]");
            const sidebar = document.querySelector("#custom-sidebar");

            // Tambahkan event listener pada tombol toggle
            toggleButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    sidebar.classList.toggle("custom-sidebar-collapsed");
                });
            });

            // Tambahkan event listener pada sidebar
            sidebar.addEventListener("click", function() {
                if (sidebar.classList.contains("custom-sidebar-collapsed")) {
                    sidebar.classList.remove("custom-sidebar-collapsed");
                }
            });
        });
    </script>
</body>

</html>

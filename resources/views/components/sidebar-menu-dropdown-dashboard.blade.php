@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <button type="button"
        class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group hover:bg-customprimary-500 hover:text-white hover:font-semibold dark:hover:text-red-400 dark:hover:bg-gray-700
    {{ request()->routeIs($routeName) ? 'bg-gray-100 text-customprimary-500 dark:text-red-400 dark:bg-gray-700 font-semibold' : 'text-gray-500 dark:text-gray-200 font-normal' }}"
        aria-controls="{{ $routeName }}" data-collapse-toggle="{{ $routeName }}">
        <span class="iconify" data-icon="{{ $icon }}" data-inline="false" style="width: 24px; height: 24px;"></span>
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>{{ $title }}</span>
        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>

    <ul id="{{ $routeName }}" class="space-y-2 py-2 {{ request()->routeIs($routeName) ? 'block' : 'hidden' }}">
        {{ $slot }}
    </ul>
</li>

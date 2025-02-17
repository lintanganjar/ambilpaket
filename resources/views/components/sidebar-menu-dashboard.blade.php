@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <a href="{{ route(str_replace('*', '', $routeName)) }}"
        class="flex items-center p-2 text-base rounded-lg group transition duration-75 hover:bg-customprimary-500 hover:text-white
    {{ request()->routeIs($routeName) ? 'bg-gray-100 text-customprimary-500 dark:bg-gray-700 dark:text-red-400 font-semibold' : 'text-gray-700 hover:text-customprimary-500 dark:text-gray-200 dark:hover:bg-gray-700' }}">
        <span class="iconify" data-icon="{{ $icon }}" data-inline="false" style="width: 24px; height: 24px;"></span>
        <span class="ml-3 font-semibold" sidebar-toggle-item>{{ $title }}</span>
    </a>

</li>

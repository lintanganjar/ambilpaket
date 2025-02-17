@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <a href="{{ route(str_replace('*', '', $routeName)) }}"
        class="text-base rounded-lg flex items-center p-2 group transition duration-75 pl-11 hover:bg-customprimary-500 hover:text-white
    {{ request()->routeIs($routeName) ? 'bg-gray-200 text-customprimary-500 dark:bg-gray-700 dark:text-customprimary-300 font-semibold' : 'text-gray-700  dark:text-gray-200 dark:hover:text-white dark:hover:text-red-400 dark:hover:bg-gray-700' }}">
        <span class="ml-3">{{ $title }}</span>
    </a>

</li>

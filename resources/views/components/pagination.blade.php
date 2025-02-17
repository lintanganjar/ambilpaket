<div class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center mb-4 sm:mb-0">
        <span class="text-xs font-normal text-gray-900 dark:text-white">Menampilkan
            <span class="font-semibold text-gray-900 dark:text-white">{{$paginator->firstItem()}}</span> 
            sampai 
            <span class="font-semibold text-gray-900 dark:text-white">{{$paginator->lastItem()}}</span>
            dari
            <span class="font-semibold text-gray-900 dark:text-white">{{$paginator->total()}}</span>
        </span>
    </div>
    @if ($paginator->hasPages())
    <div class="flex items-center space-x-3">

        @if ($paginator->currentPage() == 1)
            <button disabled class=" disabled:opacity-50 inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg focus:ring-4 focus:ring-customprimary-200 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Sebelumnya
            </button>
        @else
            <a href="{{$paginator->previousPageUrl()}}" class="inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Sebelumnya
            </a>
        @endif

        @if (!$paginator->hasMorePages())
        <button disabled class=" disabled:opacity-50 inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg focus:ring-4 focus:ring-customprimary-200 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Berikutnya
            <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg>
        </button>
        @else
        <a href="{{$paginator->nextPageUrl()}}" class="inline-flex items-center justify-center flex-1 px-3 py-2 text-xs font-medium text-center text-customprimary-700 border border-customprimary-700 rounded-lg hover:text-white hover:bg-customprimary-700 focus:ring-4 focus:ring-customprimary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            Berikutnya
            <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
        @endif

    </div>
    @endif
</div>
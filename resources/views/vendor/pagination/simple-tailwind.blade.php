@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        {{-- <span
                class="relative inline-flex cursor-default items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-600">
                {!! __('pagination.previous') !!}
            </span> --}}
        @if ($paginator->onFirstPage())
            <x-ui.button-alt>
                <span class="px-4 text-secondary-300 dark:text-secondary-600">
                    {!! __('pagination.previous') !!}
                </span>
            </x-ui.button-alt>
        @else
            {{-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                {!! __('pagination.previous') !!}
            </a> --}}
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <x-ui.button>
                    <span class="px-4 py-2">
                        {!! __('pagination.previous') !!}
                    </span>
                </x-ui.button>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                {!! __('pagination.next') !!}
            </a> --}}
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                <x-ui.button>
                    <span class="px-4 py-2">
                        {!! __('pagination.next') !!}
                    </span>
                </x-ui.button>
            </a>
        @else
            {{-- <span
                class="relative inline-flex cursor-default items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-600">
                {!! __('pagination.next') !!}
            </span> --}}
            <x-ui.button-alt>
                <span class="px-4 text-secondary-300 dark:text-secondary-600">
                    {!! __('pagination.next') !!}
                </span>
            </x-ui.button-alt>
        @endif
    </nav>
@endif

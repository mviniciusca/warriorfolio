@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <x-ui.button-alt>
                <span class="px-4 text-secondary-300 dark:text-secondary-600">
                    {!! __('pagination.previous') !!}
                </span>
            </x-ui.button-alt>
        @else
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
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                <x-ui.button>
                    <span class="px-4 py-2">
                        {!! __('pagination.next') !!}
                    </span>
                </x-ui.button>
            </a>
        @else
            <x-ui.button-alt>
                <span class="px-4 text-secondary-300 dark:text-secondary-600">
                    {!! __('pagination.next') !!}
                </span>
            </x-ui.button-alt>
        @endif
    </nav>
@endif

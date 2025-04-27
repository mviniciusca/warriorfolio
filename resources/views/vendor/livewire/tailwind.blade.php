@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-end">
    <div class="flex items-center gap-2">
        {{-- Previous Page Link --}}
        @unless ($paginator->onFirstPage())
        <button wire:click="previousPage('{{ $paginator->getPageName() }}')"
            class="relative inline-flex items-center rounded-lg border border-secondary-300 bg-white px-3 py-1.5 text-xs font-medium leading-5 text-secondary-700 transition duration-150 ease-in-out hover:text-secondary-500 focus:outline-none active:bg-secondary-100 active:text-secondary-700 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 dark:hover:text-white">
            <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
            Previous
        </button>
        @endunless

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <button wire:click="nextPage('{{ $paginator->getPageName() }}')"
            class="relative inline-flex items-center rounded-lg border border-secondary-300 bg-white px-3 py-1.5 text-xs font-medium leading-5 text-secondary-700 transition duration-150 ease-in-out hover:text-secondary-500 focus:outline-none active:bg-secondary-100 active:text-secondary-700 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 dark:hover:text-white">
            Next
            <svg class="h-4 w-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        @endif
    </div>
</nav>
@endif

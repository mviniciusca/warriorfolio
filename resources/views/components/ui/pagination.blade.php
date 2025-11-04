@props(['paginator'])

@php
// Preserve search parameters in pagination URLs
$paginator->appends(request()->query());
@endphp

@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="space-y-4">
    {{-- Desktop Pagination --}}
    <div class="hidden sm:flex items-center justify-center">
        <div class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <span class="saturn-btn-outlined cursor-not-allowed opacity-50" aria-disabled="true">
                <x-ui.ionicon icon="chevron-back" />
                <span class="sr-only">{{ __('Previous') }}</span>
            </span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200" rel="prev"
                aria-label="{{ __('Previous') }}">
                <x-ui.ionicon icon="chevron-back" />
                <span class="sr-only">{{ __('Previous') }}</span>
            </a>
            @endif

            {{-- Pagination Elements --}}
            @php
            $start = max(1, $paginator->currentPage() - 2);
            $end = min($paginator->lastPage(), $paginator->currentPage() + 2);
            @endphp

            {{-- First Page --}}
            @if ($start > 1)
            <a href="{{ $paginator->url(1) }}"
                class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200">
                1
            </a>
            @if ($start > 2)
            <span class="saturn-text opacity-50 px-2">...</span>
            @endif
            @endif

            {{-- Page Numbers --}}
            @for ($page = $start; $page <= $end; $page++) @if ($page==$paginator->currentPage())
                <span class="saturn-btn-primary" aria-current="page">
                    {{ $page }}
                </span>
                @else
                <a href="{{ $paginator->url($page) }}"
                    class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200">
                    {{ $page }}
                </a>
                @endif
                @endfor

                {{-- Last Page --}}
                @if ($end < $paginator->lastPage())
                    @if ($end < $paginator->lastPage() - 1)
                        <span class="saturn-text opacity-50 px-2">...</span>
                        @endif
                        <a href="{{ $paginator->url($paginator->lastPage()) }}"
                            class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200">
                            {{ $paginator->lastPage() }}
                        </a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}"
                            class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200" rel="next"
                            aria-label="{{ __('Next') }}">
                            <x-ui.ionicon icon="chevron-forward" />
                            <span class="sr-only">{{ __('Next') }}</span>
                        </a>
                        @else
                        <span class="saturn-btn-outlined cursor-not-allowed opacity-50" aria-disabled="true">
                            <x-ui.ionicon icon="chevron-forward" />
                            <span class="sr-only">{{ __('Next') }}</span>
                        </span>
                        @endif
        </div>
    </div>

    {{-- Mobile Pagination --}}
    <div class="flex sm:hidden justify-between items-center">
        @if ($paginator->onFirstPage())
        <span class="saturn-btn-outlined cursor-not-allowed opacity-50 flex-1 text-center" aria-disabled="true">
            <x-ui.ionicon icon="chevron-back" />
            {{ __('Previous') }}
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}"
            class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200 flex-1 text-center"
            rel="prev">
            <x-ui.ionicon icon="chevron-back" />
            {{ __('Previous') }}
        </a>
        @endif

        <span class="saturn-text px-4 text-sm">
            {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}
        </span>

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="saturn-btn-outlined hover:saturn-bg-accent transition-colors duration-200 flex-1 text-center"
            rel="next">
            {{ __('Next') }}
            <x-ui.ionicon icon="chevron-forward" />
        </a>
        @else
        <span class="saturn-btn-outlined cursor-not-allowed opacity-50 flex-1 text-center" aria-disabled="true">
            {{ __('Next') }}
            <x-ui.ionicon icon="chevron-forward" />
        </span>
        @endif
    </div>

    {{-- Page Info --}}
    <div class="text-center">
        <p class="text-sm saturn-text opacity-70">
            {{ __('Showing') }}
            @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {{ __('to') }}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
            {{ $paginator->count() }}
            @endif
            {{ __('of') }}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {{ __('results') }}
        </p>
    </div>
</nav>
@endif

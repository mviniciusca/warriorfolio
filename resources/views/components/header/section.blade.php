@props(['is_filled' => false, 'navigation' => null])

{{-- Header Section --}}
{{-- Background Image --}}
<x-ui.background />
{{-- Navigation / Logo / Dark Mode --}}
<x-core.layout :with_padding="false" :$is_filled>
    {{-- Header Section --}}
    <div class="-mt-4 flex items-center justify-between py-2">
        <div class="app-logo flex flex-wrap items-center gap-4">
            <div>
                <x-ui.logo />
            </div>
            <div>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="ml-2 inline-flex items-center rounded-lg p-2 text-sm hover:bg-secondary-100 focus:outline-none focus:ring-2 focus:ring-secondary-200 dark:hover:bg-secondary-700 dark:focus:ring-secondary-600 lg:hidden"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">{{ __('Open main menu') }}</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            {{-- Navigation --}}
            @if ($navigation)
                <div class="nav-bar hidden w-full items-center justify-between font-mono lg:order-1 lg:flex lg:w-auto"
                    id="mobile-menu-2">
                    <x-header.navigation :$navigation />
                </div>
            @endif
        </div>
        {{-- Darkmode --}}
        <div class="flex flex-wrap items-center">
            <livewire:dark-mode wire:key='header-dark-mode' />
        </div>
    </div>
    {{-- Light Beam --}}
    <div class="z-50 h-2 mx-auto -mt-5 animate-pulse">
        <img src="{{ asset('img/core/core-ui-elements/beams/pink-beam.png') }}" alt="light-beam" id="menu-gipper-board">
    </div>
</x-core.layout>

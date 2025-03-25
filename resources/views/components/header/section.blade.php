{{--

Core Component: Header Section
----------------------------------------------------------------
This component is responsible for rendering the header section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Header\Section.php

--}}

@props([
    'is_filled' => false,
    'navigation' => null,
    'is_menu_highlighted' => $design['is_menu_highlighted'] ?? false
])

{{-- Core: Background Image --}}
<x-ui.background />
{{-- Header --}}
<nav class="relative z-50 pb-2 pt-8 w-full">
    {{-- Background Layer --}}
    <div class="absolute inset-0 -z-10 bg-contain bg-no-repeat bg-top animate-pulse"
        style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
    </div>
    <x-core.layout :with_padding="false" :$is_filled>
        {{-- Logo and Primary Navigation --}}
        <div class="-mt-4 flex items-center justify-between py-4 font-mono uppercase text-xs">
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.logo />
                <x-ui.mobile-navigation />
                {{-- Navigation --}}
                @if ($navigation)
                    <div class="nav-bar hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto"
                        id="mobile-menu-2">
                        <x-header.navigation :primary_navigation="true" :$is_menu_highlighted :$navigation />
                    </div>
                @endif
            </div>
            {{-- Secondary Navigation and Darkmode App --}}
            <div class="flex font-mono uppercase text-xs flex-wrap items-center">
                 <x-header.navigation :secondary_navigation="true" :$is_menu_highlighted :$navigation />
                <livewire:dark-mode wire:key='header-dark-mode' />
            </div>
        </div>
    </x-core.layout>
</nav>

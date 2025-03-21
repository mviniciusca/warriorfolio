{{--

Core Component: Header Section
----------------------------------------------------------------
This component is responsible for rendering the header section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Header\Section.php

--}}

@props(['is_filled' => false, 'navigation' => null])

{{-- Core: Background Image --}}
<x-ui.background />
{{-- Header: Navigation / Logo / Dark Mode --}}
<div id="navbar-wrapper" class="bg-white/0 bg-contain bg-no-repeat bg-top pb-2 pt-8 dark:bg-black/0 z-50 w-full"
    style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
    <x-core.layout :with_padding="false" :$is_filled>
        {{-- Header Section --}}
        <div class="-mt-4 flex items-center justify-between py-4">
            <div class="app-logo logo-wrapper flex flex-wrap items-center gap-4">
                <x-ui.logo />
                <x-ui.mobile-navigation />
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
    </x-core.layout>
</div>

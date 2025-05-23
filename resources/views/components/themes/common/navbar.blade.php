<nav id="main-navigation" class="relative z-40 mx-auto w-full pb-2">
    @if ($line_beam_is_active)
    <div class="absolute inset-0 -z-20 animate-pulse bg-auto bg-top bg-no-repeat"
        style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
    </div>
    @endif
    <x-core.layout :$is_filled :with_padding='false'>
        {{-- Logo and Primary Navigation --}}
        <div class="-mt-4 flex items-center justify-between mb-12 text-xs">
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.logo />
                <x-ui.mobile-navigation />
                {{-- Navigation --}}
                @if ($navigation)
                <div class="nav-bar hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto"
                    id="mobile-menu-2">
                    <x-themes.common.partials.navigation :$is_menu_highlighted :$navigation
                        :primary_navigation="true" />
                </div>
                @endif
            </div>
            {{-- Secondary Navigation and Darkmode App --}}
            <div class="flex flex-wrap items-center text-xs">
                <x-themes.common.partials.navigation :$is_menu_highlighted :$navigation :secondary_navigation="true" />
                @if ($darkmode_is_active)
                <livewire:dark-mode wire:key='header-dark-mode' />
                @endif
            </div>
        </div>
    </x-core.layout>
</nav>

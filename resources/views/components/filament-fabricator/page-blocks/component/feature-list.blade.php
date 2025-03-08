@aware(['page'])
@props([
    'link' => null, // Add link to a card
    'columns' => null ?? 3, // Cards grid columns
    'features' => null, // Cards data
    'is_active' => null, // Enable or disable the component
    'is_center' => null, // Align the cards to the center
    'is_filled' => false, // Fill the cards with a color
    'is_border' => null, // Add border to the cards
    'is_animated' => null, // Add animation to the cards
    'module_title' => null, // Module title
    'with_padding' => false, // Add padding to the component
    'is_new_window' => null, // Open the link in a new window
    'module_subtitle' => null, // Module subtitle
    'is_section_filled' => null, // Fill the section with a color
])

@if ($is_active)
    <x-core.layout :$with_padding class="{{ $is_section_filled ? 'section-filled' : '' }}">
        <section>
            @if ($module_title || $module_subtitle)
                <div>
                    <x-slot name="module_title">
                        {!! $module_title !!}
                    </x-slot>
                    <x-slot name="module_subtitle">
                        {!! $module_subtitle !!}
                    </x-slot>
                </div>
            @endif
            <div class="mx-auto py-4 md:py-8 lg:py-12">
                <div
                    class="{{ $is_center ? 'text-center' : 'text-left' }} {{ $columns == 2 ? 'grid grid-cols-1 md:grid-cols-2 gap-4' : '' }} {{ $columns == 3 ? 'grid grid-cols-1 md:grid-cols-3 gap-4' : '' }} {{ $columns == 4 ? 'grid grid-cols-1 md:grid-cols-4 gap-4' : '' }} grid grid-cols-1 gap-4">
                    @foreach ($features as $key => $item)
                        @if ($link)
                            <a target="{{ $is_new_window ? '_blank' : '_self' }}" href="{{ $link }}">
                        @endif
                        <div
                            class="{{ $is_animated ? 'hover:-mt-3 hover:z-10' : '' }} {{ $is_filled ? ' dark:bg-secondary-900 hover:dark:bg-secondary-800 bg-opacity-40 bg-secondary-50' : '' }} {{ $is_border ? 'border  dark:border-secondary-800 border-secondary-300' : '' }} icon-card duration-50 min-h-60 rounded-lg p-4 opacity-90 transition-all hover:opacity-100">
                            <div
                                class="{{ $is_center ? 'items-center justify-center' : 'items-start justify-normal' }} mx-auto mb-2 flex">
                                <ion-icon class="h-10 w-10 opacity-80 lg:h-11 lg:w-11"
                                    name="{{ $item['icon'] }}"></ion-icon>
                            </div>
                            <h3 class="my-4 text-xl font-semibold leading-tight">{!! $item['title'] !!}</h3>
                            <p class="text-sm opacity-70">
                                {!! $item['description'] !!}
                            </p>
                        </div>
                        @if ($link)
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </x-core.layout>
@endif

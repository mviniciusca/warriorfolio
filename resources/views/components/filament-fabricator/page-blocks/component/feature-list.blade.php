@aware(['page'])
@props([
    'is_active' => null,
    'is_animated' => null,
    'is_border' => null,
    'is_card_filled' => null,
    'is_center' => null,
    'is_color_icon' => null,
    'is_content_center' => true,
    'is_filled' => null,
    'is_light_fx' => null,
    'button_header' => null,
    'button_url' => null,
    'columns' => null ?? 3,
    'features' => null,
    'module_subtitle' => null,
    'module_title' => null,
    'with_padding' => true,
    'is_heading_active' => true,
    ])

@if ($is_active)
<x-core.layout :$with_padding :$is_filled :$button_header :$button_url :$is_center>
    @if (($module_title || $module_subtitle) && $is_heading_active)
    <div>
        <x-slot name="module_title" class="py-8 text-center">
            {!! $module_title !!}
        </x-slot>
        <x-slot name="module_subtitle">
            {!! $module_subtitle !!}
        </x-slot>
    </div>
    @endif
    <div class="mx-auto mt-8 lg:mt-16">
        <div
        class="{{ $is_content_center ? 'text-center justify-center' : 'text-left' }} {{ $columns == 2 ? 'grid grid-cols-1 md:grid-cols-2 gap-4' : '' }} {{ $columns == 3 ? 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4' : '' }} {{ $columns == 4 ? 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6' : '' }} grid grid-cols-1 gap-4">
        @foreach ($features as $key => $item)
        @if ($item['link'] ?? false)
        <a target="{{ $item['is_new_window'] ? '_blank' : '_self' }}" href="{{ $item['link'] ?? '#' }}">
            @endif
                    <div
                        class="{{ $is_card_filled ? ' dark:bg-secondary-900/60 bg-secondary-50/60 ' : '' }} {{ $is_border ? 'border  dark:border-secondary-800/70 border-secondary-300' : '' }} icon-card duration-100 {{ $columns != 1 ? 'min-h-24' : 'min-h-10' }} overflow-hidden rounded-lg bg-contain bg-top bg-no-repeat p-4 opacity-90 transition-all hover:opacity-100">
                        @if ($is_light_fx)
                            <div class="-mt-4 h-4 animate-pulse bg-contain bg-top bg-no-repeat"
                                style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
                            </div>
                        @endif
                        <div
                            class="{{ $is_content_center ? 'items-center justify-center' : 'items-start justify-normal' }} mx-auto -mt-0 mb-2 flex">
                            <ion-icon
                                class="{{ $is_animated ? 'animate-pulse' : '' }} {{ $is_color_icon ? 'text-primary-500 dark:text-primary-600' : '' }} h-8 w-8 rounded-full p-1"
                                name="{{ $item['icon'] }}" />
                        </div>
                        <h4 class="my-1 text-base font-semibold leading-tight">{!! $item['title'] !!}</h4>
                        <p class="{{ $columns != 1 ? 'py-2' : 'pb-2' }} text-sm leading-snug opacity-80"> {!! $item['description'] !!}</p>
                    </div>
                    @if ($item['link'] ?? false)
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </x-core.layout>
@endif

@aware(['page'])
@props([
    'link' => null,
    'is_active' => null,
    'is_animated' => null,
    'is_border' => null,
    'is_card_filled' => null,
    'is_center' => null,
    'is_color_icon' => null,
    'is_content_center' => true,
    'is_filled' => null,
    'is_light_fx' => null,
    'is_new_window' => null,
    'button_header' => null,
    'button_url' => null,
    'columns' => null ?? 3,
    'features' => null,
    'module_subtitle' => null,
    'module_title' => null,
    'with_padding' => true,
])

@if ($is_active)
    <x-core.layout :$with_padding :$is_filled :$button_header :$button_url :$is_center>
        @if ($module_title || $module_subtitle)
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
                    @if ($link)
                        <a target="{{ $is_new_window ? '_blank' : '_self' }}" href="{{ $link }}">
                    @endif
                    <div
                        class="{{ $is_card_filled ? ' dark:bg-secondary-900/50 bg-secondary-200/10 ' : '' }} {{ $is_border ? 'border  dark:border-secondary-800/50 border-secondary-300/30' : '' }} icon-card duration-50 {{ $columns != 1 ? 'min-h-48' : 'min-h-10' }} overflow-hidden rounded-lg bg-contain bg-top bg-no-repeat p-4 opacity-90 transition-all hover:opacity-100">
                        @if ($is_light_fx)
                            <div class="-mt-4 h-4 animate-pulse bg-contain bg-top bg-no-repeat"
                                style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
                            </div>
                        @endif
                        <div
                            class="{{ $is_content_center ? 'items-center justify-center' : 'items-start justify-normal' }} mx-auto -mt-1 mb-2 flex">
                            <ion-icon
                                class="{{ $is_animated ? 'animate-pulse' : '' }} {{ $is_color_icon ? 'text-primary-500 dark:text-primary-600 ' : '' }} h-10 w-10 rounded-full p-1 opacity-90 lg:h-11 lg:w-11"
                                name="{{ $item['icon'] }}" />
                        </div>
                        <h3 class="my-2 text-lg font-semibold leading-tight opacity-90">{!! $item['title'] !!}</h3>
                        <p class="{{ $columns != 1 ? 'py-2' : 'pb-2' }} text-sm opacity-70"> {!! $item['description'] !!}
                        </p>
                    </div>
                    @if ($link)
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </x-core.layout>
@endif

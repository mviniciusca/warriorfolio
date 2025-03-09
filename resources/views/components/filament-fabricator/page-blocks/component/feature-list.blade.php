@aware(['page'])
@props([
    'link' => null,
    'columns' => null ?? 3,
    'features' => null,
    'is_active' => null,
    'is_center' => null,
    'is_filled' => null,
    'is_card_filled' => null,
    'is_border' => null,
    'is_animated' => null,
    'module_title' => null,
    'module_subtitle' => null,
    'with_padding' => true,
    'is_new_window' => null,
    'button_url' => null,
    'button_header' => null,
    'is_light_fx' => null,
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

        <div class="mx-auto">
            <div
                class="{{ $is_center ? 'text-center' : 'text-left' }} {{ $columns == 2 ? 'grid grid-cols-1 md:grid-cols-2 gap-4' : '' }} {{ $columns == 3 ? 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4' : '' }} {{ $columns == 4 ? 'grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6' : '' }} grid grid-cols-1 gap-4">
                @foreach ($features as $key => $item)
                    @if ($link)
                        <a target="{{ $is_new_window ? '_blank' : '_self' }}" href="{{ $link }}">
                    @endif
                    <div
                        class="{{ $is_card_filled ? ' dark:bg-secondary-800/30 bg-secondary-300/10 ' : '' }} {{ $is_border ? 'border  dark:border-secondary-800/50 border-secondary-300/30' : '' }} icon-card duration-50 min-h-60 overflow-hidden rounded-lg bg-contain bg-top bg-no-repeat p-4 opacity-90 transition-all hover:opacity-100">


                        @if ($is_light_fx)
                            <div class="-mt-7 h-6 animate-pulse bg-contain bg-bottom bg-no-repeat"
                                style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
                            </div>
                        @endif

                        <div
                            class="{{ $is_center ? 'items-center justify-center' : 'items-start justify-normal' }} mx-auto -mt-1 mb-2 flex">
                            <ion-icon
                                class="{{ $is_animated ? 'animate-pulse' : '' }} h-10 w-10 rounded-full p-3 text-primary-500 opacity-90 lg:h-11 lg:w-11"
                                name="{{ $item['icon'] }}" />
                        </div>


                        <h3 class="my-4 text-xl font-semibold leading-tight opacity-90">{!! $item['title'] !!}</h3>
                        <p class="text-sm opacity-70"> {!! $item['description'] !!} </p>
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

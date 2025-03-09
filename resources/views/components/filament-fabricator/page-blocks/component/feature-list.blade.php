@aware(['page'])
@props([
    'link' => null,
    'columns' => null ?? 3,
    'features' => null,
    'is_active' => null,
    'is_center' => null,
    'is_filled' => null,
    'is_border' => null,
    'is_animated' => null,
    'module_title' => null,
    'module_subtitle' => null,
    'with_padding' => true,
    'is_new_window' => null,
    'button_url' => null,
    'button_header' => null,
])

@if ($is_active)
    <x-core.layout :$with_padding :$is_filled :$button_header :$button_url>
        @if ($module_title || $module_subtitle)
            <div>
                <x-slot name="module_title" class="py-8">
                    {!! $module_title !!}
                </x-slot>
                <x-slot name="module_subtitle">
                    {!! $module_subtitle !!}
                </x-slot>
            </div>
        @endif

        <div class="mx-auto">
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
        </div>

    </x-core.layout>
    {{-- <section class="{{ $is_filled ? 'section-filled' : '' }}">
        <div class="mx-auto max-w-7xl">

            @if ($module_title || $module_subtitle)
                <div>
                    <x-slot name="module_title" class="py-8">
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
        </div>
    </section> --}}
@endif

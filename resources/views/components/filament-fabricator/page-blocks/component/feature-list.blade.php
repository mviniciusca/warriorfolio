@aware(['page'])
@props([
    'features' => null,
    'is_active' => null,
    'is_center' => null,
    'link' => null,
    'is_new_window' => null,
    'is_filled' => false,
    'is_section_filled' => false,
    'is_animated' => null,
    'is_border' => null,
    'module_title' => null,
    'module_subtitle' => null,
])

@if ($is_active)
    <x-core.layout class="{{ $is_section_filled ? 'bg-secondary-50 dark:bg-black' : '' }}">
        <section>
            @if ($module_title || $module_subtitle)
                <div class="mb-4 md:mb-8 lg:mb-12">
                    <x-slot name="module_title">
                        {!! $module_title !!}
                    </x-slot>
                    <x-slot name="module_subtitle">
                        {!! $module_subtitle !!}
                    </x-slot>
                </div>
            @endif
            <div class="mx-auto pb-8">
                <div class="{{ $is_center ? 'text-center' : 'text-left' }} grid grid-cols-1 gap-6 md:grid-cols-3">
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

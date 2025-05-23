{{--

Core Component: Dynamic Slideshow
----------------------------------------------------------------
This is the Dynamic Slideshow Component
-------------------------------------------------------------------
Data:
App\View\Components\Hero\Slider.php

--}}

@props(['sliders' => null])

@if ($sliders !== null)
@if ($sliders->is_active)
<x-core.layout :with_padding='false'>
    <div class="swiper {{ $sliders->slider_size }} mx-auto">
        @if ($sliders->show_title)
        <h1 class="slider-title text-md pb-2 pt-4 text-center font-semibold">
            {{ $sliders->title }}
        </h1>
        @endif
        <div class="swiper-wrapper">
            @foreach ($sliders->content as $slider)
            <div
                class="swiper-slide {{ $sliders->show_title ? 'my-4' : 'my-8' }} flex content-center items-center justify-center">
                @if ($slider['image_url'])
                <a href="{{ $slider['image_url'] }}">
                    @endif
                    <img alt="{{ $slider['image_alt'] }}"
                        class="{{ $sliders->image_size == 'small' ? 'h-10' : ($sliders->image_size == 'medium' ? 'h-14' : ($sliders->image_size == 'large' ? 'h-16' : ($sliders->image_size == 'extra-large' ? 'h-20' : 'h-12'))) }} {{ $sliders->is_invert ? 'filter  dark:invert dark:opacity-70' : 'filter-none' }}"
                        src="{{ asset('storage/' . $slider['image_path']) }}" />
                    @if ($slider['image_url'])
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</x-core.layout>
@endif
@endif

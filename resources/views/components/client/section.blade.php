{{--

Core Component: Customer Section
----------------------------------------------------------------
This component is responsible for rendering the customer section of the website.
-------------------------------------------------------------------
Data:
App\View\Components\Customer\Section.php

--}}

@props([
    'customers' => null,
    'sliders' => null,
    'module' => null,
    'button_header' => null,
    'button_url' => null,
    'with_padding' => true,
    'is_filled' => $data->customer['section_fill'] ?? false,
    'is_section_filled_inverted' => $data->customer['is_section_filled_inverted'] ?? false,
    'is_heading_visible' => $data->customer['is_heading_visible'] ?? true,
])

@if ($module->clients ?? false)

    <x-core.layout :$is_section_filled_inverted :$with_padding :$is_filled :$button_header :$button_url
        :module_name="'customers'">

        @if($is_heading_visible ?? false)
            @if ($data->customer['section_title'] ?? false)
                <x-slot name="module_title">
                    {!! $data->customer['section_title'] ?? null !!}
                </x-slot>
            @endif
            @if ($data->customer['section_subtitle'] ?? false)
                <x-slot name="module_subtitle">
                    {!! $data->customer['section_subtitle'] ?? null !!}
                </x-slot>
            @endif
        @endif

        <section id="customer-wrapper" class="my-12 flex flex-wrap content-center items-center justify-items-center justify-center transition-all duration-300 gap-8">
            @foreach ($customers as $client)
                <div
                    class="{{ !$is_section_filled_inverted ? 'dark:border-secondary-700 hover:opacity-100 dark:bg-secondary-50 dark:opacity-80 bg-white opacity-50 dark:hover:opacity-100' :
                     'border-secondary-700 dark:border-white hover:opacity-100 dark:hover:opacity-100 bg-secondary-50 dark:bg-white opacity-80 dark:opacity-50' }}
                     flex min-h-24 w-1/4 items-center rounded-md border transition-all duration-300  md:w-1/4 lg:w-1/6 hover:grayscale-0 grayscale">
                    <x-curator-glider :media="$client->logo" class="mx-auto max-w-24 object-contain object-center p-1" />
                </div>
            @endforeach
        </section>
        <x-hero.slider :$sliders />
        @if ($customers->isEmpty() && $sliders == null)
            <x-ui.empty-section :auth="__('Go to your Dashboard and create a New Client.')" />
        @endif

    </x-core.layout>
@endif

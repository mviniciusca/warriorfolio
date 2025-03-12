@props([
'button_header' => null,
'button_url' => null,
'with_padding' => true,
'is_filled' => $data->customer['section_fill'] ?? false,
])

@if ($module->clients)
<x-core.layout :$with_padding :$is_filled :$button_header :$button_url :module_name="'customers'">

    @if ($data->customer['section_title'])
    <x-slot name="module_title">
        {!! $data->customer['section_title'] !!}
    </x-slot>
    @endif

    @if ($data->customer['section_subtitle'])
    <x-slot name="module_subtitle">
        {!! $data->customer['section_subtitle'] !!}
    </x-slot>
    @endif

    <section id="clients" class="flex pb-12 flex-wrap content-center items-center justify-center gap-8">
        @foreach ($customers as $client)
        <div
            class="flex min-h-24 w-1/4 items-center rounded-md border bg-white opacity-50 grayscale transition-all duration-100 hover:opacity-100 hover:grayscale-0 dark:bg-secondary-900 dark:border-secondary-700 dark:opacity-60 dark:hover:opacity-100 md:w-1/4 lg:w-1/6">
            <x-curator-glider :media="$client->logo"
                class="mx-auto dark:invert invert-0 max-w-24 object-contain object-center p-1" />
        </div>
        @endforeach
    </section>

    <x-hero.slider :$sliders />

    @if ($customers->isEmpty() && $sliders == null)
    <x-ui.empty-section :auth="__('Go to your Dashboard and create a New Client.')" />
    @endif

</x-core.layout>
@endif

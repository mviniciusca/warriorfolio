@props([
'customers' => null,
'sliders' => null,
])

@if ($is_active)
<x-core.layout :$is_filled :$with_padding :$module_name :$button_header :$button_url :$is_centered :$title :$subtitle
    :$is_section_filled_inverted :$is_heading_visible :$button_icon :$module_slug>
    <section
        class="my-12 flex flex-wrap content-center items-center justify-center justify-items-center gap-8 transition-all duration-300"
        id="customer-wrapper">
        @foreach ($customers as $client)
        <div
            class="{{ !$is_section_filled_inverted
                        ? 'dark:border-secondary-700 hover:opacity-100 dark:bg-secondary-50 dark:opacity-80 bg-white opacity-50 dark:hover:opacity-100'
                        : 'border-secondary-700 dark:border-white hover:opacity-100 dark:hover:opacity-100 bg-secondary-50 dark:bg-white opacity-80 dark:opacity-50' }} flex min-h-24 w-1/4 items-center rounded-md border grayscale transition-all duration-300 hover:grayscale-0 md:w-1/4 lg:w-1/6">
            <x-curator-glider :media="$client->logo" class="mx-auto max-w-24 object-contain object-center p-1" />
        </div>
        @endforeach
    </section>
    @if ($customers->isEmpty() && $sliders == null)
    <x-ui.empty-section :auth="__('Go to your Dashboard and create a New Client.')" />
    @endif
</x-core.layout>
@endif

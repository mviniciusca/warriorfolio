@if($module->clients)
<x-core.layout class="{{ data_get($data, 'customer.section_fill') ? 'bg-secondary-100 dark:bg-secondary-950' : null }}"
    id="clients">

    @if($data->customer['section_title'])
    <x-slot name="module_title">
        {!! $data->customer['section_title'] !!}
    </x-slot>
    @endif

    @if($data->customer['section_subtitle'])
    <x-slot name="module_subtitle">
        {!! $data->customer['section_subtitle'] !!}
    </x-slot>
    @endif

    <section id="clients" class="mt-12 flex flex-wrap content-center items-center justify-center gap-8">
        @foreach ($customers as $client)
        <div
            class="flex min-h-24 w-1/4 items-center rounded-md border bg-white opacity-50 grayscale transition-all duration-100 hover:opacity-100 hover:grayscale-0 dark:border-secondary-700 dark:opacity-20 dark:hover:opacity-80 md:w-1/4 lg:w-1/6">
            <x-curator-glider :media="$client->logo" class="mx-auto h-28 w-full object-contain object-center p-1" />
        </div>
        @endforeach
    </section>

    <x-hero.slider :$sliders />

    @if($customers->isEmpty() && $sliders == null)
    <x-ui.empty-section :auth="__('Go to your Dashboard and create a New Client.')" />
    @endif

</x-core.layout>
@endif
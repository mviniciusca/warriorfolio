@if($module->clients)
<x-core.layout class="{{ $info->clients_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}" id="clients">

    @if($info->clients_section_title)
    <x-slot name="module_title">
        {!! $info->clients_section_title !!}
    </x-slot>
    @endif

    @if($info->clients_section_subtitle_text)
    <x-slot name="module_subtitle">
        {!! $info->clients_section_subtitle_text !!}
    </x-slot>
    @endif

    <section id="clients" class="mt-20 flex flex-wrap content-center items-center justify-center gap-8">
        @foreach ($clients as $client)
        <div
            class="flex min-h-24 w-1/4 items-center rounded-md border bg-secondary-200 opacity-70 transition-all duration-100 hover:opacity-100 dark:border-secondary-700 dark:bg-secondary-800 md:w-1/4 lg:w-1/6">
            <img class="mx-auto max-h-14 px-4 text-center grayscale filter dark:invert"
                src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" alt="{{ $client->name }}"
                class="h-full w-full rounded-lg">
        </div>
        @endforeach
    </section>

    <x-hero.slider :$sliders />

    @if($clients->count() === 0 && $sliders->count() === 0)
    <x-ui.empty-section :auth="'Go to your Dashboard and create a New Client.'" />
    @endif

</x-core.layout>
@endif

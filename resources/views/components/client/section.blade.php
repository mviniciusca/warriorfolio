@if($module->clients)
<x-core.layout class="{{ $info->clients_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}" id="clients">
    <section>
        @if($info->clients_section_title)
        <div class="header-title">
            {!! $info->clients_section_title !!}
        </div>
        @endif
        @if($info->clients_section_subtitle_text)
        <div class="subtitle mt-2 text-center text-xl">
            {!! $info->clients_section_subtitle_text !!}
        </div>
        @endif
        <div class="flex flex-wrap content-center items-center justify-center gap-8">
            @foreach ($clients as $client)
            <div
                class="flex min-h-24 w-1/4 items-center rounded-md border bg-secondary-200 opacity-70 transition-all duration-100 hover:opacity-100 dark:border-secondary-700 dark:bg-secondary-800 md:w-1/4 lg:w-1/6">
                <img class="mx-auto max-h-14 px-4 text-center grayscale filter dark:invert"
                    src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" alt="{{ $client->name }}"
                    class="h-full w-full rounded-lg">
            </div>
            @endforeach
        </div>
    </section>
</x-core.layout>
@endif

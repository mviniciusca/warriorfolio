@aware(['page'])
<x-core.layout>
    <div class="header-title">
        {!! $info->clients_section_title !!}
    </div>
    <div class="subtitle text-xl text-center mt-2">
        {!! $info->clients_section_subtitle_text !!}
    </div>
    <div class="flex flex-wrap gap-8 items-center justify-around">
        @foreach ($clients as $client)
        <div
            class="w-1/4 md:w-1/4 lg:w-1/5 min-h-24 items-center flex bg-secondary-950 rounded-md opacity-40 hover:opacity-100 transition-all duration-100">
            <img class="max-h-14 px-4 text-center mx-auto filter invert grayscale"
                src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                class="w-full h-full rounded-lg">
        </div>
        @endforeach
    </div>
</x-core.layout>

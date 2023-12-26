@aware(['page'])
<x-core.layout>
    <div class="header-title">{!! $info->clients_section_text !!}</div>
    <div class="subtitle text-xl text-center mt-2">{!! $info->clients_section_subtitle_text !!}</div>
    <div class="flex flex-wrap gap-8 items-center justify-between mt-24">
        @foreach ($clients as $client)
        <div
            class="w-1/4 md:w-1/4 lg:w-1/6 bg-secondary-800 rounded-lg p-4 opacity-80 hover:opacity-100 transition-all duration-100">
            <img class="h-12 text-center mx-auto p-1" src="{{ asset('storage/' . $client->logo) }}"
                alt="{{ $client->name }}" class="w-full h-full rounded-lg">
        </div>
        @endforeach
    </div>
</x-core.layout>
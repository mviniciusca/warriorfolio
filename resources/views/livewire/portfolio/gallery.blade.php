@props(['is_section_filled_inverted'])

<div id="portfolio-wrapper">
    <div class="mx-auto">

        <div class="mb-16 mt-8 flex flex-wrap justify-start" id="portfolio-navigation" wire:ignore>
            <x-ui.button :$is_section_filled_inverted :icon="'bookmark'" class="mr-1" style="filled" wire:click='clear'>
                {{ __('All') }}
            </x-ui.button>
            @foreach ($categories as $category)
                <div wire:ignore wire:key='{{ $category->id }}'>
                    <x-ui.button :$is_section_filled_inverted :icon="$category->icon ?? 'bookmark'" class="mr-1" style="filled"
                        wire:click='filterCategoryById({{ $category->id }})' wire:key='{{ $category->id }}'
                        wire:key='{{ $category->id }}'>
                        {{ ucfirst($category->name) }}
                    </x-ui.button>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($data as $item)
                <a href="/{{ $item->slug }}">
                    <div class="relative transform transition duration-300 hover:scale-105" wire:ignore
                        wire:key='{{ $item->id }}'>
                        <div class="{{ $item->project->category->color ? '' : 'bg-secondary-950' }} absolute z-30 ml-2 mt-2 flex flex-wrap items-center gap-1 rounded-md px-3 py-1 text-xs font-bold text-white"
                            style="background-color: {{ $item->project->category->hex_color }}">
                            @if ($item->project->category->icon)
                                <x-ui.ionicon :icon="$item->project->category->icon" />
                            @else
                                <x-ui.ionicon :icon="'bookmark-sharp'" />
                            @endif
                            {{ $item->project->category->name }}
                        </div>
                        <img alt="{{ $item->title }}"
                            class="h-64 w-full rounded-lg border border-black/10 bg-white/80 object-cover p-1 shadow-md dark:border-white/10 dark:bg-white/20"
                            src="{{ asset('storage/' . $item->project->image_cover) }}">
                        <div class="py-4">
                            <h3 class="text-sm font-semibold">{{ $item->title }}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

</div>

<div>
    <div class="mx-auto">

        <div class="mb-16 flex flex-wrap justify-end" id="portfolio-navigation" wire:ignore>
            <x-ui.button :icon="'bookmark-sharp'" class="mr-1" style="outlined" wire:click='clear'>
                {{ __('All') }}
            </x-ui.button>
            @foreach ($categories as $category)
                <div wire:ignore wire:key='{{ $category->id }}'>
                    <x-ui.button :icon="$category->icon" class="mr-1" style="outlined"
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
                    <div class="relative" wire:ignore wire:key='{{ $item->id }}'>
                        <img alt="{{ $item->title }}" class="h-64 w-full rounded-lg object-cover shadow-md"
                            src="{{ asset('storage/' . $item->project->image_cover) }}">
                        <div class="py-4">
                            <h3 class="text-sm font-semibold">{{ $item->title }}</h3>
                            <p class="text-xs">{{ __('View Full Project') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

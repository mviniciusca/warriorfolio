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
            @foreach ($projects as $project)
                <div class="relative" wire:ignore wire:key='{{ $project->id }}'>
                    <img alt="{{ $project->name }}" class="h-64 w-full rounded-lg object-cover shadow-md"
                        src="{{ asset('img/core/profile-picture.png') }}">
                    <div class="py-4">
                        <h3 class="text-sm font-semibold">{{ $project->name }}</h3>
                        <p class="text-xs">{{ __('View Full Project') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

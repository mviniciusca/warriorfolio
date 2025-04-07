<div class="mb-8 mt-8 flex flex-wrap justify-start" id="portfolio-navigation" wire:ignore>
    @if ($categories->count() >= 2 ?? false)
        <x-ui.button :$is_section_filled_inverted :icon="'bookmark'" :style="'outlined'" class="mr-1" iconBefore
            wire:click='clear'>
            {{ __('All') }}
        </x-ui.button>
    @endif
    @foreach ($categories as $category)
        <div wire:ignore wire:key='{{ $category->id }}'>
            <x-ui.button :$is_section_filled_inverted :icon="$category->icon ?? 'bookmark'" class="mr-1" iconBefore style="outlined"
                wire:click='filterCategoryById({{ $category->id }})' wire:key='{{ $category->id }}'
                wire:key='{{ $category->id }}'>
                {{ ucfirst($category->name) }}
            </x-ui.button>
        </div>
    @endforeach
</div>

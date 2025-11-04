<div class="relative">
    <form wire:submit.prevent="submit" class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none">
            @if(!$searchActive)
            <x-ui.ionicon icon="search-outline" class="h-3.5 w-3.5 text-secondary-400 dark:text-secondary-500" />
            @else
            <x-ui.ionicon icon="search" class="h-3.5 w-3.5 text-secondary-500 dark:text-secondary-400" />
            @endif
        </div>
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="{{ __('Search projects...') }}"
            class="w-full rounded-lg border border-secondary-200 bg-white pl-8 pr-8 py-1.5 text-xs text-secondary-900 transition-all duration-200 placeholder:text-secondary-400 focus:border-secondary-500 focus:ring-2 focus:ring-secondary-500/20 dark:border-secondary-700 dark:bg-secondary-800 dark:text-white dark:placeholder:text-secondary-500 dark:focus:border-secondary-400 dark:focus:ring-secondary-400/20"
            :class="{'border-secondary-500 dark:border-secondary-400': $wire.searchActive}">

        <button type="button" wire:click="clearSearch"
            class="absolute inset-y-0 right-0 flex items-center pr-2.5 text-secondary-400 hover:text-secondary-700 dark:hover:text-secondary-300 transition-opacity duration-200 click-effect"
            @if(strlen($search)> 0 || $searchActive) style="display: flex;" @else style="display: none;" @endif>
            <x-ui.ionicon icon="close-outline" class="h-3.5 w-3.5" />
        </button>

        <button type="submit"
            class="absolute inset-y-0 right-8 flex items-center pr-1 text-secondary-400 hover:text-secondary-700 dark:hover:text-secondary-300 transition-opacity duration-200 click-effect"
            @if(strlen($search)>= 5 && !$searchActive) style="display: flex;" @else style="display: none;" @endif>
            <x-ui.ionicon icon="arrow-forward" class="h-3.5 w-3.5" />
        </button>
    </form>

    @if(strlen($search) > 0 && strlen($search) < 5) <div
        class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">
        {{ __('Type at least 5 characters to search') }}
</div>
@endif

@if($searchActive)
<div class="mt-1 text-xs text-secondary-600 dark:text-secondary-400 flex items-center">
    <x-ui.ionicon icon="filter-outline" class="h-3 w-3 mr-1" />
    {{ __('Search active') }}
</div>
@endif
</div>

<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-4 py-2">
    {{-- Left Side: Search Component --}}
    <div class="w-full sm:w-64">
        <livewire:portfolio.gallery.search />
    </div>

    {{-- Right Side: Controls --}}
    <div class="flex items-center gap-2 overflow-x-auto transition-opacity duration-300">
        {{-- Reset Button --}}
        <button
            x-show="viewMode !== 'normal' || $wire.orderBy !== 'created_at' || $wire.orderDirection !== 'desc' || !grayscale"
            @click.prevent="
                $dispatch('controls-reset');
                resetView();
                grayscale = true;
                $wire.resetControls();
                $el.classList.add('spin-fade')" @mouseenter="$el.classList.add('hover-spin-icon')"
            @mouseleave="$el.classList.remove('hover-spin-icon')"
            class="flex-shrink-0 flex items-center justify-center rounded-lg border border-secondary-200 bg-white w-8 h-8 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 click-effect hover:opacity-100"
            :class="{ 'opacity-100': viewMode !== 'normal' || $wire.orderBy !== 'created_at' || $wire.orderDirection !== 'desc' || !grayscale, 'opacity-60': viewMode === 'normal' && $wire.orderBy === 'created_at' && $wire.orderDirection === 'desc' && grayscale }"
            title="{{ __('Reset') }}">
            <span wire:ignore>
                <x-ui.ionicon :icon="'refresh-outline'" class="h-4 w-4" />
            </span>
        </button>

        {{-- Grayscale Toggle --}}
        <button @click.prevent="
                grayscale = !grayscale;
                document.querySelectorAll('.portfolio-image').forEach(img => img.classList.add('shake-animation'));
                setTimeout(() => {
                    document.querySelectorAll('.portfolio-image').forEach(img => img.classList.remove('shake-animation'));
                }, 400)"
            class="flex-shrink-0 flex items-center justify-center rounded-lg border border-secondary-200 bg-white w-8 h-8 text-xs font-medium transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:hover:bg-secondary-700 text-secondary-600 dark:text-secondary-400 click-effect hover:opacity-100"
            :class="{ 'bg-secondary-100 dark:bg-secondary-700 opacity-100': !grayscale, 'opacity-60': grayscale }"
            :title="grayscale ? '{{ __('Color') }}' : '{{ __('Grayscale') }}'">
            <span wire:ignore>
                <x-ui.ionicon :icon="'color-filter-outline'" class="h-4 w-4" />
            </span>
        </button>

        {{-- View Toggle --}}
        <button wire:ignore @click.prevent="
                let newView = viewMode === 'normal' ? 'large' : (viewMode === 'large' ? 'compact' : 'normal');
                $dispatch('view-mode-changed', { viewMode: newView });
                viewMode = newView;
                $el.classList.add('pop-scale')"
            class="flex-shrink-0 flex items-center justify-center rounded-lg border border-secondary-200 bg-white w-8 h-8 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 click-effect hover:opacity-100"
            :class="{ 'opacity-100': viewMode !== 'normal', 'opacity-60': viewMode === 'normal' }"
            :title="viewMode === 'normal' ? '{{ __('Large View') }}' : (viewMode === 'large' ? '{{ __('Compact View') }}' : '{{ __('Normal View') }}')">
            <span wire:ignore x-show="viewMode === 'normal'">
                <x-ui.ionicon :icon="'grid-outline'" class="h-4 w-4" />
            </span>
            <span wire:ignore x-show="viewMode === 'large'">
                <x-ui.ionicon :icon="'apps-outline'" class="h-4 w-4" />
            </span>
            <span wire:ignore x-show="viewMode === 'compact'">
                <x-ui.ionicon :icon="'list-outline'" class="h-4 w-4" />
            </span>
        </button>

        {{-- Sort Controls (Minimalist Version) --}}
        <div class="flex-shrink-0 flex items-center gap-2">
            <button wire:click.prevent="toggleOrderBy" @click="$el.classList.add('pop-scale')"
                class="flex-shrink-0 flex items-center justify-center rounded-lg border border-secondary-200 bg-white w-8 h-8 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 click-effect hover:opacity-100"
                :class="{ 'bg-secondary-100 dark:bg-secondary-700 opacity-100': $wire.orderBy !== 'created_at', 'opacity-60': $wire.orderBy === 'created_at' }"
                :title="$wire.orderBy === 'created_at' ? '{{ __('Sorting by: Latest') }}' : '{{ __('Sorting by: Title') }}'">
                <span wire:ignore x-show="$wire.orderBy === 'created_at'">
                    <x-ui.ionicon :icon="'time-outline'" class="h-4 w-4" />
                </span>
                <span wire:ignore x-show="$wire.orderBy === 'title'">
                    <x-ui.ionicon :icon="'text-outline'" class="h-4 w-4" />
                </span>
            </button>
            <button wire:click.prevent="toggleOrderDirection" @click="$el.classList.add('pop-scale')"
                class="flex-shrink-0 flex items-center justify-center rounded-lg border border-secondary-200 bg-white w-8 h-8 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 click-effect hover:opacity-100"
                :class="{ 'opacity-100': $wire.orderDirection === 'asc', 'opacity-60': $wire.orderDirection === 'desc' }"
                :title="$wire.orderDirection === 'desc' ? '{{ __('Sort: Descending') }}' : '{{ __('Sort: Ascending') }}'">
                <span wire:ignore>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="$wire.orderDirection === 'desc'" d="M12 20L12 4M12 20L6 14M12 20L18 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path x-show="$wire.orderDirection === 'asc'" d="M12 4L12 20M12 4L6 10M12 4L18 10"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</div>

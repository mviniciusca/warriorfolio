<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-4 py-2">
    {{-- Left Side: Search Component --}}
    <div class="w-full sm:w-64">
        <livewire:portfolio.gallery.search />
    </div>

    {{-- Right Side: Controls --}}
    <div class="flex items-center gap-2 overflow-x-auto">
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
            class="flex-shrink-0 flex items-center gap-1 rounded-lg border border-secondary-200 bg-white px-2.5 py-1 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 click-effect">
            <span wire:ignore>
                <x-ui.ionicon :icon="'refresh-outline'" class="h-3.5 w-3.5" />
            </span>
            <span>{{ __('Reset') }}</span>
        </button>

        {{-- Grayscale Toggle --}}
        <button @click.prevent="
                grayscale = !grayscale;
                document.querySelectorAll('.portfolio-image').forEach(img => img.classList.add('shake-animation'));
                setTimeout(() => {
                    document.querySelectorAll('.portfolio-image').forEach(img => img.classList.remove('shake-animation'));
                }, 400)"
            class="flex-shrink-0 flex items-center gap-1 rounded-lg border border-secondary-200 bg-white px-2.5 py-1 text-xs font-medium transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:hover:bg-secondary-700 text-secondary-600 dark:text-secondary-400 click-effect"
            :class="{ 'bg-secondary-100 dark:bg-secondary-700': grayscale }">
            <span wire:ignore>
                <x-ui.ionicon :icon="'color-filter-outline'" class="h-3.5 w-3.5" />
            </span>
            <span x-text="grayscale ? '{{ __('Color') }}' : '{{ __('Grayscale') }}'"></span>
        </button>

        {{-- View Toggle --}}
        <button wire:ignore @click.prevent="
                let newView = viewMode === 'normal' ? 'large' : (viewMode === 'large' ? 'compact' : 'normal');
                $dispatch('view-mode-changed', { viewMode: newView });
                viewMode = newView;
                $el.classList.add('pop-scale')"
            class="flex-shrink-0 flex items-center gap-1 rounded-lg border border-secondary-200 bg-white px-2.5 py-1 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700 click-effect">
            <span wire:ignore>
                <x-ui.ionicon :icon="'grid-outline'" class="h-3.5 w-3.5" />
            </span>
            <span
                x-text="viewMode === 'normal' ? '{{ __('Large View') }}' : (viewMode === 'large' ? '{{ __('Compact View') }}' : '{{ __('Normal View') }}')"></span>
        </button>

        {{-- Sort Controls --}}
        <div class="flex-shrink-0 flex items-center gap-2">
            <span class="text-xs font-medium text-secondary-600 dark:text-secondary-400">{{ __('Sort by:') }}</span>
            <div
                class="flex divide-x divide-secondary-200 dark:divide-secondary-700 rounded-lg border border-secondary-200 dark:border-secondary-700 bg-white dark:bg-secondary-800">
                <button wire:click.prevent="setOrderBy('created_at')" @click="$el.classList.add('glow-pulse')"
                    class="flex items-center px-2.5 py-1.5 text-xs rounded-l-lg click-effect"
                    :class="{ 'bg-secondary-100 text-secondary-900 dark:bg-secondary-700 dark:text-white font-medium': $wire.orderBy === 'created_at', 'text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-200': $wire.orderBy !== 'created_at' }">
                    {{ __('Latest') }}
                    @if($orderBy === 'created_at')
                    <svg class="w-3.5 h-3.5 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        @if($orderDirection === 'desc')
                        <path d="M12 20L12 4M12 20L6 14M12 20L18 14" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        @else
                        <path d="M12 4L12 20M12 4L6 10M12 4L18 10" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        @endif
                    </svg>
                    @endif
                </button>
                <button wire:click.prevent="setOrderBy('title')" @click="$el.classList.add('glow-pulse')"
                    class="flex items-center px-2.5 py-1.5 text-xs rounded-r-lg click-effect"
                    :class="{ 'bg-secondary-100 text-secondary-900 dark:bg-secondary-700 dark:text-white font-medium': $wire.orderBy === 'title', 'text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-200': $wire.orderBy !== 'title' }">
                    {{ __('Title') }}
                    @if($orderBy === 'title')
                    <svg class="w-3.5 h-3.5 ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        @if($orderDirection === 'desc')
                        <path d="M12 20L12 4M12 20L6 14M12 20L18 14" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        @else
                        <path d="M12 4L12 20M12 4L6 10M12 4L18 10" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        @endif
                    </svg>
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>

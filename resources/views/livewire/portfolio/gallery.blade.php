@props(['is_section_filled_inverted'])

<div id="portfolio" x-data="{
    activeCategory: null,
    viewMode: $persist('normal').as('portfolioViewMode'),
    transition: false,
    init() {
        this.activeCategory = null;
        this.$watch('activeCategory', () => {
            this.transition = true;
            setTimeout(() => this.transition = false, 300);
        });

        this.$el.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const currentScroll = window.scrollY;
                setTimeout(() => window.scrollTo(0, currentScroll), 0);
            });
        });
    },
    cycleViewMode() {
        if (this.viewMode === 'normal') {
            this.viewMode = 'large';
        } else if (this.viewMode === 'large') {
            this.viewMode = 'compact';
        } else {
            this.viewMode = 'normal';
        }
    },
    resetView() {
        this.viewMode = 'normal';
        this.activeCategory = null;
        this.transition = true;
        setTimeout(() => this.transition = false, 300);
    }
}">
    <div class="mx-auto">
        {{-- Controls Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-end mb-6">
            <div class="flex items-center gap-2 order-2 sm:order-none overflow-x-auto">
                {{-- Reset Button --}}
                <button @click.prevent="resetView"
                    class="flex-shrink-0 flex items-center gap-1 rounded-lg border border-secondary-200 bg-white px-2.5 py-1 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700">
                    <span wire:ignore>
                        <x-ui.ionicon :icon="'refresh-outline'" class="h-3.5 w-3.5" />
                    </span>
                    <span>{{ __('Reset') }}</span>
                </button>

                {{-- View Toggle --}}
                <button @click.prevent="cycleViewMode"
                    class="flex-shrink-0 flex items-center gap-1 rounded-lg border border-secondary-200 bg-white px-2.5 py-1 text-xs font-medium text-secondary-600 transition-all hover:bg-secondary-50 dark:border-secondary-700 dark:bg-secondary-800 dark:text-secondary-400 dark:hover:bg-secondary-700">
                    <span wire:ignore>
                        <x-ui.ionicon :icon="'grid-outline'" class="h-3.5 w-3.5" />
                    </span>
                    <span
                        x-text="viewMode === 'normal' ? '{{ __('Large View') }}' : (viewMode === 'large' ? '{{ __('Compact View') }}' : '{{ __('Normal View') }}')"></span>
                </button>

                {{-- Sort Controls --}}
                <div class="flex-shrink-0 flex items-center gap-2">
                    <span class="text-xs font-medium text-secondary-600 dark:text-secondary-400">{{ __('Sort by:')
                        }}</span>
                    <div
                        class="flex divide-x divide-secondary-200 dark:divide-secondary-700 rounded-lg border border-secondary-200 dark:border-secondary-700 bg-white dark:bg-secondary-800">
                        <button wire:click.prevent="setOrderBy('created_at')"
                            class="flex items-center px-2.5 py-1.5 text-xs {{ $orderBy === 'created_at' ? 'bg-secondary-100 text-secondary-900 dark:bg-secondary-700 dark:text-white font-medium' : 'text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-200' }} rounded-l-lg">
                            {{ __('Latest') }}
                            @if($orderBy === 'created_at')
                            <svg class="w-3.5 h-3.5 ml-1" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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
                        <button wire:click.prevent="setOrderBy('title')"
                            class="flex items-center px-2.5 py-1.5 text-xs {{ $orderBy === 'title' ? 'bg-secondary-100 text-secondary-900 dark:bg-secondary-700 dark:text-white font-medium' : 'text-secondary-600 hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-200' }} rounded-r-lg">
                            {{ __('Title') }}
                            @if($orderBy === 'title')
                            <svg class="w-3.5 h-3.5 ml-1" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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

        {{-- Categories Menu --}}
        <nav class="flex gap-1 pb-2 mb-4 -mx-2 px-4 overflow-x-auto border-b border-secondary-200 dark:border-secondary-700 scrollbar-none"
            aria-label="Categories">
            @if ($categories->count() >= 2 ?? false)
            <button @click.prevent="activeCategory = null" wire:click.prevent="clear"
                class="flex-shrink-0 flex items-center gap-1 px-3 py-2 text-xs font-medium transition-all duration-200 hover:text-secondary-900 dark:hover:text-secondary-100 border-b-2 -mb-[9px]"
                :class="{ 'border-secondary-500 text-secondary-900 dark:text-secondary-100': activeCategory === null, 'border-transparent text-secondary-500 dark:text-secondary-400': activeCategory !== null }">
                <span wire:ignore>
                    <x-ui.ionicon :icon="'apps-outline'" class="h-3.5 w-3.5" />
                </span>
                {{ __('All Work') }}
            </button>
            @endif

            @foreach ($categories as $category)
            <button @click.prevent="activeCategory = {{ $category->id }}"
                wire:click.prevent="filterCategoryById({{ $category->id }})"
                class="flex-shrink-0 flex items-center gap-1 px-3 py-2 text-xs font-medium transition-all duration-200 border-b-2 border-r-0 -mb-[9px]"
                :class="{ 'text-secondary-900 dark:text-secondary-100': activeCategory === {{ $category->id }}, 'border-transparent text-secondary-500 dark:text-secondary-400': activeCategory !== {{ $category->id }} }"
                :style="activeCategory === {{ $category->id }} ? {
                    borderColor: '{{ $category->hex_color }}'
                } : {}">
                <span wire:ignore>
                    <x-ui.ionicon :icon="$category->icon ?? 'bookmark'" class="h-3.5 w-3.5" />
                </span>
                {{ ucfirst($category->name) }}
            </button>
            @endforeach
        </nav>

        {{-- Empty State --}}
        @if($data->isEmpty())
        <x-ui.empty-section :message="'No projects available'" :auth="'Create a new project'"
            :icon="'rocket-outline'" />
        @endif

        {{-- Gallery Grid with Transition --}}
        <div class="grid gap-4 sm:gap-6 mt-8 sm:mt-12 transition-all duration-300" :class="{
                'opacity-50 transition-opacity duration-300': transition,
                'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4': viewMode === 'normal',
                'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3': viewMode === 'large',
                'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5': viewMode === 'compact'
            }">
            @foreach ($data as $item)
            <div class="group relative" wire:key='{{ $item->id }}'>
                <a href="/{{ $item->slug }}" class="block">
                    {{-- Image Container with Hover Effect --}}
                    <div class="relative overflow-hidden rounded-lg bg-secondary-900/5 dark:bg-secondary-900/20">
                        {{-- Category Badge --}}
                        <div class="{{ $item->project->category->color ? '' : 'bg-secondary-900' }} absolute z-30 left-3 top-3 flex items-center gap-1 rounded-lg px-2 py-0.5 text-[10px] font-medium text-white bg-opacity-75 border"
                            x-show="viewMode !== 'compact'"
                            style="background-color: {{ $item->project->category->hex_color }}; border-color: {{ $item->project->category->hex_color }}">
                            <span wire:ignore>
                                @if ($item->project->category->icon)
                                <x-ui.ionicon :icon="$item->project->category->icon" class="h-3 w-3" />
                                @else
                                <x-ui.ionicon :icon="'bookmark-sharp'" class="h-3 w-3" />
                                @endif
                            </span>
                            {{ ucfirst($item->project->category->name) }}
                        </div>

                        {{-- Main Image --}}
                        <div class="overflow-hidden transition-all duration-300" :class="{
                                'aspect-[4/3]': viewMode === 'normal',
                                'aspect-[16/9]': viewMode === 'large',
                                'aspect-square': viewMode === 'compact'
                            }">
                            <img alt="{{ $item->title }}" class="h-full w-full object-cover transition-all duration-300"
                                :class="{
                                    'group-hover:scale-105': viewMode !== 'compact',
                                    'group-hover:scale-110 group-hover:rotate-2': viewMode === 'compact'
                                }" src="{{ asset('storage/' . $item->project->image_cover) }}">
                        </div>

                        {{-- Hover Overlay with Gradient --}}
                        <div class="absolute inset-0 transition-all duration-300" :class="{
                                'bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100': viewMode !== 'compact',
                                'bg-gradient-to-t from-black to-black/60 opacity-0 group-hover:opacity-90': viewMode === 'compact'
                            }">
                            {{-- Project Info (Only visible on hover) --}}
                            <div class="absolute bottom-0 left-0 right-0 p-4"
                                :class="{ 'flex flex-col items-center justify-center inset-0 p-2 text-center': viewMode === 'compact' }">
                                <h3 class="font-medium text-white transition-all duration-300" :class="{
                                        'text-sm translate-y-2 group-hover:translate-y-0': viewMode === 'normal',
                                        'text-base translate-y-2 group-hover:translate-y-0': viewMode === 'large',
                                        'text-xs opacity-0 group-hover:opacity-100 mb-1': viewMode === 'compact'
                                    }">
                                    {{ $item->title }}
                                </h3>
                                @if($item->project->client)
                                <p class="text-white/80 transition-all duration-300" :class="{
                                        'mt-1 text-xs translate-y-2 group-hover:translate-y-0': viewMode === 'normal',
                                        'mt-1 text-sm translate-y-2 group-hover:translate-y-0': viewMode === 'large',
                                        'text-[10px] opacity-0 group-hover:opacity-100': viewMode === 'compact'
                                    }">
                                    {{ $item->project->client }}
                                </p>
                                @endif
                                <div x-show="viewMode === 'compact'"
                                    class="mt-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <span
                                        class="rounded-full border border-white/20 px-2 py-0.5 text-[10px] text-white/90">
                                        {{ ucfirst($item->project->category->name) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $data->links() }}
        </div>
    </div>
</div>

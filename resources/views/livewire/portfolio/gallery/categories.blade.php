<nav class="flex gap-2 py-2 -mx-2 px-4 md:overflow-visible overflow-x-auto border-b border-secondary-200 dark:border-secondary-700 scrollbar-none mb-6"
    aria-label="Categories">
    @if ($categories->count() >= 2)
    <button type="button" @click.prevent="activeCategory = null; $el.classList.add('pop-scale')"
        wire:click.prevent="resetCategory"
        class="flex-shrink-0 flex items-center gap-1 px-3 py-2 text-xs font-medium transition-all duration-300 hover:text-secondary-900 dark:hover:text-secondary-100 border-b-2 -mb-[9px] click-effect hover:opacity-100"
        :class="{ 'border-secondary-500 text-secondary-900 dark:text-secondary-100': activeCategory === null, 'border-transparent text-secondary-500 dark:text-secondary-400 opacity-60': activeCategory !== null }">
        <span wire:ignore>
            <x-ui.ionicon :icon="'apps-outline'" class="h-3.5 w-3.5" />
        </span>
        {{ __('All Work') }}
        <span class="ml-1 rounded-full bg-secondary-100 dark:bg-secondary-700 px-1.5 py-0.5 text-[10px]">
            {{ $totalProjects }}
        </span>
    </button>
    @endif

    @foreach ($categories as $category)
    <button type="button" @click.prevent.stop="
            $event.preventDefault();
            $event.stopPropagation();
            activeCategory = {{ $category->id }};
            $el.classList.add('glow-pulse');
            setTimeout(() => $el.classList.remove('glow-pulse'), 800);"
        wire:click.prevent="filterCategory({{ $category->id }})"
        class="flex-shrink-0 flex items-center gap-1 px-3 py-2 text-xs font-medium transition-all duration-300 border-b-2 border-r-0 -mb-[9px] click-effect hover:opacity-100 hover:text-secondary-900 dark:hover:text-secondary-100"
        :class="{ 'text-secondary-900 dark:text-secondary-100': activeCategory === {{ $category->id }}, 'border-transparent text-secondary-500 dark:text-secondary-400 opacity-60': activeCategory !== {{ $category->id }} }"
        :style="activeCategory === {{ $category->id }} ? {
            borderColor: '{{ $category->hex_color }}'
        } : {}">
        <span wire:ignore>
            <x-ui.ionicon :icon="$category->icon ?? 'bookmark'" class="h-3.5 w-3.5" />
        </span>
        {{ __(ucfirst($category->name)) }}
        @if($category->project_count > 2)
        <span class="ml-1 rounded-full bg-secondary-100 dark:bg-secondary-700 px-1.5 py-0.5 text-[10px]">
            {{ $category->project_count }}
        </span>
        @endif
    </button>
    @endforeach
</nav>

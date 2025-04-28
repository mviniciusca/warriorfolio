<div wire:loading.class="opacity-50">
    {{-- Empty State --}}
    @if($data->isEmpty())
    <x-ui.empty-section class="mt-24" message="{{ __('No projects available') }}"
        auth="{{ __('Create a new project') }}" icon="rocket-outline" />
    @endif

    {{-- Gallery Grid with Transition --}}
    <div class="grid gap-4 sm:gap-6 mt-8 sm:mt-12 transition-all duration-300" :class="{
            'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4': viewMode === 'normal',
            'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3': viewMode === 'large',
            'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5': viewMode === 'compact'
        }">
        @foreach ($data as $item)
        <div class="group relative" wire:key='{{ $item->id }}'>
            {{-- Quick View Button --}}
            <button type="button" @click.prevent="$dispatch('open-quick-view', {
                    id: {{ $item->id }},
                    title: '{{ $item->title }}',
                    slug: '{{ $item->slug }}',
                    image_cover: '{{ $item->project->image_cover }}',
                    short_description: '{{ addslashes($item->project->short_description) }}',
                    external_link: '{{ $item->project->external_link }}',
                    tags: {{ json_encode($item->project->tags) }},
                    category: {
                        name: '{{ __(ucfirst($item->project->category->name)) }}',
                        icon: '{{ $item->project->category->icon }}',
                        hex_color: '{{ $item->project->category->hex_color }}'
                    }
                })"
                class="absolute right-3 top-3 z-40 flex h-7 w-7 items-center justify-center rounded-lg bg-white/90 opacity-0 transition-all duration-300 hover:bg-white group-hover:opacity-100 dark:bg-secondary-900/90 dark:hover:bg-secondary-900">
                <x-ui.ionicon icon="eye-outline" class="h-3.5 w-3.5 text-secondary-700 dark:text-secondary-300" />
            </button>

            <a href="{{ config('app.url') }}/{{ $item->slug }}" class="block">
                {{-- Image Container with Hover Effect --}}
                <div class="relative">
                    {{-- Category Badge --}}
                    <div class="absolute z-30 left-3 top-3 flex items-center gap-1 rounded-lg px-2 py-0.5 text-[10px] font-medium border transition-colors duration-300"
                        x-show="viewMode !== 'compact'" x-transition :class="{
                            'bg-black text-white border-secondary-700': grayscale,
                            '{{ $item->project->category->color ? '' : 'bg-secondary-900' }} text-white bg-opacity-75 border-transparent': !grayscale
                        }" :style="!grayscale ? {
                            backgroundColor: '{{ $item->project->category->hex_color }}',
                            borderColor: '{{ $item->project->category->hex_color }}'
                        } : {}">
                        <span wire:ignore>
                            @if ($item->project->category->icon)
                            <x-ui.ionicon :icon="$item->project->category->icon" class="h-3 w-3" />
                            @else
                            <x-ui.ionicon :icon="'bookmark-sharp'" class="h-3 w-3" />
                            @endif
                        </span>
                        {{ __(ucfirst($item->project->category->name)) }}
                    </div>

                    {{-- Main Image --}}
                    <div class="overflow-hidden transition-all duration-300 rounded-xl" :class="{
                            'aspect-[4/3]': viewMode === 'normal',
                            'aspect-[16/9]': viewMode === 'large',
                            'aspect-square': viewMode === 'compact'
                        }">
                        <img class="portfolio-image h-full w-full object-cover transition-all duration-300 rounded-xl"
                            :class="{
                                'group-hover:scale-105': viewMode !== 'compact',
                                'group-hover:scale-110 group-hover:rotate-2': viewMode === 'compact',
                                'grayscale opacity-60': grayscale,
                                'filter-none opacity-100': !grayscale
                            }" src="{{ asset('storage/' . $item->project->image_cover) }}">
                    </div>

                    {{-- Hover Overlay with Gradient --}}
                    <div class="absolute inset-0 rounded-xl transition-all duration-300" :class="{
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
                            <div x-show="viewMode === 'compact'" x-transition
                                class="mt-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <span class="rounded-full border border-white/20 px-2 py-0.5 text-[10px] text-white/90">
                                    {{ __(ucfirst($item->project->category->name)) }}
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
    <div class="mt-6" wire:loading.class="opacity-50">
        {{ $data->links() }}
    </div>

    {{-- Quick View Modal Component --}}
    <livewire:portfolio.gallery.quick-view />
</div>

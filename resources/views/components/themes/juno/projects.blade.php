@props(['data'])

<div>
    <x-themes.juno.partials.header subtitle="Showcasing my latest work and creative projects"
        title="Portfolio Projects" />

    {{-- Categories Tabs --}}
    <div class="mb-6 flex items-center gap-2 overflow-x-auto pb-2">
        @php
            $categories = $data->pluck('project.category')->unique();
        @endphp

        <button
            :class="{
                'border-primary-500 bg-primary-50 text-primary-700 dark:border-primary-500 dark:bg-primary-900/20 dark:text-primary-400': $store
                    .selectedCategory === 0
            }"
            @click="$dispatch('filter-category', { id: 0 })"
            class="whitespace-nowrap rounded-full border border-secondary-200/50 bg-white px-3 py-1 text-xs font-medium text-secondary-700 transition-colors hover:border-secondary-300 hover:bg-secondary-50 dark:border-secondary-800 dark:bg-secondary-900/50 dark:text-secondary-300 dark:hover:border-secondary-700 dark:hover:bg-secondary-800/50"
            x-data>
            <div class="flex items-center gap-1.5">
                <i class="text-base text-secondary-600 dark:text-secondary-400">
                    <ion-icon name="apps-outline"></ion-icon>
                </i>
                <span>All Projects</span>
            </div>
        </button>

        @foreach ($categories as $category)
            <button
                :class="{
                    'border-primary-500 bg-primary-50 text-primary-700 dark:border-primary-500 dark:bg-primary-900/20 dark:text-primary-400': $store
                        .selectedCategory === {{ $category->id }}
                }"
                @click="$dispatch('filter-category', { id: {{ $category->id }} })"
                class="whitespace-nowrap rounded-full border border-secondary-200/50 bg-white px-3 py-1 text-xs font-medium text-secondary-700 transition-colors hover:border-secondary-300 hover:bg-secondary-50 dark:border-secondary-800 dark:bg-secondary-900/50 dark:text-secondary-300 dark:hover:border-secondary-700 dark:hover:bg-secondary-800/50"
                x-data>
                <div class="flex items-center gap-1.5">
                    <i class="text-base" style="color: {{ $category->hex_color ?? '#6b7280' }}">
                        <ion-icon name="{{ $category->icon ?? 'folder-outline' }}"></ion-icon>
                    </i>
                    <span>{{ $category->name }}</span>
                </div>
            </button>
        @endforeach
    </div>

    {{-- Projects Grid --}}
    <div @filter-category.window="$store.selectedCategory = $event.detail.id"
        class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3" x-data="{
            selectedCategory: 0,
            items: [],
            init() {
                this.items = [...this.$el.children];
                this.$store.selectedCategory = 0;

                this.$watch('$store.selectedCategory', (value) => {
                    this.filterProjects(value);
                });
            },
            filterProjects(categoryId) {
                this.items.forEach(item => {
                    const itemCategory = parseInt(item.dataset.category);
                    if (categoryId === 0 || itemCategory === categoryId) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        }">
        @foreach ($data as $item)
            <div class="group relative" data-category="{{ $item->project->category->id }}">
                {{-- Project Card --}}
                <div
                    class="relative overflow-hidden rounded-lg border border-secondary-200/50 bg-white shadow-sm transition-all duration-300 hover:shadow-lg dark:border-secondary-800/50 dark:bg-secondary-900/50">
                    {{-- Category Badge --}}
                    <div class="absolute left-3 top-3 z-10">
                        <div class="flex items-center gap-1.5 rounded-full border border-white/10 px-2.5 py-0.5 backdrop-blur-sm"
                            style="background-color: {{ $item->project->category->hex_color ? $item->project->category->hex_color . 'CC' : '#27272ACC' }};">
                            <i class="text-base"
                                style="color: {{ $item->project->category->hex_color ? '#ffffff' : '#ffffff' }}">
                                <ion-icon name="{{ $item->project->category->icon ?? 'folder-outline' }}"></ion-icon>
                            </i>
                            <span class="text-xs font-medium text-white">
                                {{ ucfirst($item->project->category->name) }}
                            </span>
                        </div>
                    </div>

                    {{-- Project Image --}}
                    <div class="aspect-[4/3] overflow-hidden">
                        <img alt="{{ $item->title }}"
                            class="h-full w-full object-cover transition-all duration-500 group-hover:scale-105"
                            src="{{ asset('storage/' . $item->project->image_cover) }}">
                    </div>

                    {{-- Project Info --}}
                    <div
                        class="relative space-y-2 border-t border-secondary-100 bg-white/80 p-4 backdrop-blur-sm dark:border-secondary-800 dark:bg-secondary-900/80">
                        <h3 class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                            {{ $item->title }}
                        </h3>

                        <a class="inline-flex items-center gap-0.5 text-xs font-medium text-secondary-700 transition-colors hover:text-secondary-900 dark:text-secondary-300 dark:hover:text-secondary-100"
                            href="{{ config('app.url') . '/' . $item->slug }}">
                            View details
                            <ion-icon class="text-base" name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@props(['item' => null])

<article wire:key="{{ $item->id }}" class="group">
    <a class="block" href="{{ config('app.url', env('APP_URL')) . '/' . $item->slug }}">
        <div
            class="flex gap-6 border-b border-gray-100 py-8 transition-all duration-200 hover:bg-gray-50/50 dark:border-gray-800 dark:hover:bg-gray-900/20">
            <div class="flex-1 space-y-3">
                <!-- Author and category info -->
                <div class="flex items-center gap-2 text-sm">
                    <span
                        class="saturn-badge px-2 py-1 text-xs font-medium border saturn-border-accent saturn-bg-accent">
                        {{ $item->post->category->name }}
                    </span>
                    <span class="text-gray-400 dark:text-gray-600">·</span>
                    <time class="text-gray-500 dark:text-gray-400" datetime="{{ $item->created_at }}">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                    </time>
                </div>

                <!-- Title -->
                <h2
                    class="saturn-h3 font-bold leading-tight text-gray-900 transition-colors duration-200 group-hover:text-gray-700 dark:text-gray-100 dark:group-hover:text-gray-300">
                    {{ Str::words($item->title, 12, '...') }}
                </h2>

                <!-- Excerpt -->
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ Str::words(strip_tags(preg_replace('#<figure\b[^>]*>.*?</figure>#is', '', $item->post?->content
                        ?? '')), 20, '...') }}
                </p>

                <!-- Reading time and engagement -->
                <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                    <span class="flex items-center gap-1">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ ceil(str_word_count(strip_tags($item->post?->content ?? '')) / 200) }} min read
                    </span>
                </div>
            </div>

            <!-- Image -->
            <div class="flex-shrink-0">
                <div
                    class="h-24 w-24 overflow-hidden rounded-md saturn-bg-accent transition-transform duration-200 group-hover:scale-105  sm:h-28 sm:w-28">
                    @if ($item->post->img_cover)
                    <x-curator-glider class="h-full w-full object-cover" :media="$item->post->img_cover" />
                    @else
                    <div class="flex h-full w-full items-center justify-center">
                        <svg class="h-8 w-8 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </a>
</article>

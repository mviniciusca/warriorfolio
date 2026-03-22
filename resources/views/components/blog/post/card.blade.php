@props(['item' => null])

@php
    $postUrl = rtrim(config('app.url', url('/')), '/') . '/' . ltrim($item->slug, '/');
    $excerptSource = preg_replace('#<figure\b[^>]*>.*?</figure>#is', '', $item->post?->content ?? '');
    $hasCover = (bool) $item->post?->img_cover;
@endphp

<article wire:key="{{ $item->id }}"
    class="group border-b saturn-border py-8 first:pt-0 sm:py-10 md:py-12 lg:py-16">
    <div
        class="{{ $hasCover ? 'flex flex-row items-start gap-3 sm:gap-5 md:gap-8' : 'flex flex-col' }}">
        @if ($hasCover)
            <a href="{{ $postUrl }}"
                class="relative block w-[5.25rem] shrink-0 overflow-hidden rounded-lg outline-none ring-purple-500/30 focus-visible:ring-2 sm:w-28 md:w-40 lg:w-48 xl:w-52">
                @if ($item->post?->is_featured)
                    <span
                        class="pointer-events-none absolute left-2 top-2 z-10 rounded-md border saturn-border-accent px-1.5 py-0.5 text-[9px] font-semibold uppercase tracking-wider shadow-sm saturn-bg saturn-text">
                        {{ __('Featured') }}
                    </span>
                @endif
                <x-blog.post.cover-image :media="$item->post->img_cover" :alt="strip_tags($item->title)"
                    class="aspect-square h-[4.5rem] w-full object-cover sm:h-24 md:h-36 lg:h-40 xl:h-44" />
            </a>
        @endif

        <div class="flex min-w-0 flex-1 flex-col">
            <a href="{{ $postUrl }}" class="block outline-none ring-purple-500/30 focus-visible:ring-2">
                <div class="max-w-3xl space-y-2 sm:space-y-3">
                    <div
                        class="flex flex-wrap items-center gap-x-1.5 gap-y-0.5 text-xs saturn-text-accent sm:gap-x-2 sm:gap-y-1 sm:text-sm">
                        @if ($item->post?->category)
                            <span class="font-medium saturn-text">{{ $item->post->category->name }}</span>
                            <span class="opacity-40" aria-hidden="true">·</span>
                        @endif
                        <time datetime="{{ $item->created_at->toIso8601String() }}">
                            {{ $item->created_at->format('M j, Y') }}
                        </time>
                    </div>

                    <h2
                        class="text-lg font-semibold leading-snug tracking-tight saturn-text transition-colors group-hover:opacity-90 sm:text-xl md:text-2xl md:leading-snug">
                        {{ Str::words($item->title, 16, '…') }}
                    </h2>

                    <p class="text-sm leading-relaxed saturn-text-accent line-clamp-2 sm:line-clamp-3 sm:text-base md:line-clamp-4">
                        {{ Str::words(strip_tags($excerptSource), 36, '…') }}
                    </p>

                    <div
                        class="flex flex-wrap items-center gap-x-3 gap-y-1 pt-0.5 text-xs saturn-text-accent sm:gap-x-5 sm:pt-1 sm:text-sm">
                        <span class="inline-flex items-center gap-1.5">
                            <svg class="h-4 w-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ max(1, (int) ceil(str_word_count(strip_tags($item->post?->content ?? '')) / 200)) }}
                            {{ __('min read') }}
                        </span>
                    </div>
                </div>
            </a>

            <div
                class="mt-3 flex max-w-3xl flex-col gap-2 text-xs saturn-text-accent sm:mt-5 sm:flex-row sm:flex-wrap sm:items-center sm:justify-between sm:gap-4 sm:text-sm">
                <a href="{{ $postUrl }}#post-comments-heading"
                    class="inline-flex items-center gap-1.5 underline-offset-2 transition hover:saturn-text hover:underline">
                    <x-ui.ionicon icon="chatbubble-ellipses-outline" class="text-sm opacity-80 sm:text-base" />
                    <span>{{ $item->approvedCommentsCount() }} {{ __('comments') }}</span>
                </a>
                <x-ui.share :url="$postUrl" />
            </div>
        </div>
    </div>
</article>

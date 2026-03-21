@props(['item' => null])

@php
    $postUrl = rtrim(config('app.url', url('/')), '/') . '/' . ltrim($item->slug, '/');
    $excerptSource = preg_replace('#<figure\b[^>]*>.*?</figure>#is', '', $item->post?->content ?? '');
    $hasCover = (bool) $item->post?->img_cover;
@endphp

<article wire:key="{{ $item->id }}" class="group border-b saturn-border py-12 first:pt-0 md:py-16">
    <div
        class="{{ $hasCover ? 'flex flex-row items-start gap-4 sm:gap-6 md:gap-8' : 'flex flex-col' }}">
        @if ($hasCover)
            <a href="{{ $postUrl }}"
                class="relative block w-28 shrink-0 overflow-hidden rounded-lg sm:w-40 md:w-48 lg:w-52 outline-none ring-purple-500/30 focus-visible:ring-2">
                @if ($item->post?->is_featured)
                    <span
                        class="pointer-events-none absolute left-2 top-2 z-10 rounded-md border saturn-border-accent px-1.5 py-0.5 text-[9px] font-semibold uppercase tracking-wider shadow-sm saturn-bg saturn-text">
                        {{ __('Featured') }}
                    </span>
                @endif
                <x-blog.post.cover-image :media="$item->post->img_cover" :alt="strip_tags($item->title)"
                    class="aspect-square h-24 w-full object-cover sm:h-36 md:h-40 lg:h-44" />
            </a>
        @endif

        <div class="flex min-w-0 flex-1 flex-col">
            <a href="{{ $postUrl }}" class="block outline-none ring-purple-500/30 focus-visible:ring-2">
                <div class="max-w-3xl space-y-3">
                    <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm saturn-text-accent">
                        @if ($item->post?->category)
                            <span class="font-medium saturn-text">{{ $item->post->category->name }}</span>
                            <span class="opacity-40" aria-hidden="true">·</span>
                        @endif
                        <time datetime="{{ $item->created_at->toIso8601String() }}">
                            {{ $item->created_at->format('M j, Y') }}
                        </time>
                    </div>

                    <h2
                        class="text-xl font-semibold leading-snug tracking-tight saturn-text transition-colors md:text-2xl md:leading-snug group-hover:opacity-90">
                        {{ Str::words($item->title, 16, '…') }}
                    </h2>

                    <p class="text-base leading-relaxed saturn-text-accent line-clamp-3 md:line-clamp-4">
                        {{ Str::words(strip_tags($excerptSource), 36, '…') }}
                    </p>

                    <div class="flex flex-wrap items-center gap-x-5 gap-y-1 pt-1 text-sm saturn-text-accent">
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

            <div class="mt-5 flex max-w-3xl flex-wrap items-center justify-between gap-4 text-sm saturn-text-accent">
                <a href="{{ $postUrl }}#post-comments-heading"
                    class="inline-flex items-center gap-1.5 underline-offset-2 transition hover:saturn-text hover:underline">
                    <x-ui.ionicon icon="chatbubble-ellipses-outline" class="text-base opacity-80" />
                    <span>{{ $item->approvedCommentsCount() }} {{ __('comments') }}</span>
                </a>
                <x-ui.share :url="$postUrl" />
            </div>
        </div>
    </div>
</article>

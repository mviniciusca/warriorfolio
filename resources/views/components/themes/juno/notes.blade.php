{{-- Título, subtítulo e CTA: Section "blog" + fallbacks de Setting (Notes Section no admin) --}}
{{-- Listagem minimalista: até 5 posts; link "Ver tudo" → blog (warriorfolio.app_blog_basepath) --}}

@if ($is_active && ($module_blog ?? false))
    @if ($heading_visible ?? true)
        <x-themes.juno.partials.header
            :title="$header_title"
            :subtitle="$header_subtitle"
            :button="$show_cta ? $cta_label : null"
            :buttonUrl="$show_cta ? $cta_url : null"
            :buttonIcon="$cta_icon"
        />
    @endif

    @php
        $baseUrl = rtrim(config('app.url', url('/')), '/') . '/';
    @endphp

    <div class="border-t border-secondary-200 dark:border-secondary-800">
        @forelse ($posts as $post)
            @php
                $hasCover = filled($post->post?->img_cover);
                $postUrl = $baseUrl . ltrim($post->slug, '/');
                $excerptSource = preg_replace('#<figure\b[^>]*>.*?</figure>#is', '', $post->post?->content ?? '');
                $excerptPlain = Str::words(strip_tags($excerptSource), 24, '…');
                if (trim($excerptPlain) === '' && filled($post->post?->resume)) {
                    $excerptPlain = Str::limit(strip_tags($post->post->resume), 160);
                }
                $wordCount = count(array_filter(preg_split('/\s+/u', strip_tags($post->post?->content ?? ''), -1, PREG_SPLIT_NO_EMPTY)));
                $readMins = max(1, (int) ceil($wordCount / 200));
            @endphp

            <article class="border-b border-secondary-200 py-4 last:border-b-0 dark:border-secondary-800 md:py-5">
                <a href="{{ $postUrl }}" class="group block outline-none ring-offset-2 ring-offset-white focus-visible:ring-2 focus-visible:ring-secondary-400 dark:ring-offset-secondary-950">
                    <div class="{{ $hasCover ? 'flex flex-row items-start gap-3 sm:gap-4' : 'flex flex-col' }}">
                        @if ($hasCover)
                            <div
                                class="h-16 w-16 shrink-0 overflow-hidden rounded-md border border-secondary-200 dark:border-secondary-700 sm:h-20 sm:w-20">
                                <x-blog.post.cover-image :media="$post->post->img_cover" :alt="strip_tags($post->title)"
                                    class="h-full w-full object-cover transition-opacity duration-200 group-hover:opacity-90" />
                            </div>
                        @endif

                        <div class="min-w-0 flex-1 space-y-1.5">
                            <div
                                class="flex flex-wrap items-center gap-x-1.5 gap-y-0.5 text-[10px] text-secondary-500 dark:text-secondary-400 md:text-[11px]">
                                @if ($post->post?->category)
                                    <span class="font-medium text-secondary-700 dark:text-secondary-300">
                                        {{ $post->post->category->name }}
                                    </span>
                                    <span class="opacity-50" aria-hidden="true">·</span>
                                @endif
                                @if ($post->post?->is_featured)
                                    <span class="text-secondary-400 dark:text-secondary-500">{{ __('Featured') }}</span>
                                    <span class="opacity-50" aria-hidden="true">·</span>
                                @endif
                                <time datetime="{{ $post->created_at->toIso8601String() }}">
                                    {{ $post->created_at->format('M j, Y') }}
                                </time>
                            </div>

                            <h3
                                class="text-sm font-medium leading-snug tracking-tight text-secondary-900 transition-colors group-hover:text-secondary-600 dark:text-secondary-100 dark:group-hover:text-secondary-300 md:text-base">
                                {{ Str::words(strip_tags($post->title), 14, '…') }}
                            </h3>

                            @if (filled($excerptPlain))
                                <p class="text-xs leading-relaxed text-secondary-600 line-clamp-2 dark:text-secondary-400 md:text-sm md:line-clamp-3">
                                    {{ $excerptPlain }}
                                </p>
                            @endif

                            <div
                                class="flex flex-wrap items-center gap-x-2 gap-y-0.5 text-[10px] text-secondary-500 dark:text-secondary-400 md:text-[11px]">
                                <span>{{ $readMins }} {{ __('min read') }}</span>
                                <span class="opacity-40" aria-hidden="true">·</span>
                                <span>{{ $post->approvedCommentsCount() }} {{ __('comments') }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        @empty
            <div class="py-10 text-center text-sm text-secondary-500 dark:text-secondary-400">
                {{ __('No articles published yet.') }}
            </div>
        @endforelse
    </div>

    @if ($posts->isNotEmpty())
        <div
            class="mt-5 flex justify-center border-t border-secondary-200 pt-5 dark:border-secondary-800">
            <a href="{{ $blog_index_url }}" class="saturn-btn-outlined text-xs">
                <x-ui.ionicon icon="newspaper-outline" />
                <span>{{ __('View All') }}</span>
            </a>
        </div>
    @endif
@endif

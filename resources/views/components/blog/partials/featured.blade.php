@props(['featuredPosts'])

@if ($featuredPosts->isNotEmpty())
    @php
        $featuredCount = $featuredPosts->count();
        $postBase = rtrim(config('app.url', url('/')), '/');
        $featuredHeading = settings('blog.featured_carousel_title') ?: __('Featured');
        $featuredIcon = trim((string) settings('blog.featured_carousel_icon', 'sparkles-outline')) ?: 'sparkles-outline';
    @endphp

    <div class="relative mb-10 md:mb-12" data-blog-featured data-featured-count="{{ $featuredCount }}">
        <div class="mb-5 flex flex-col gap-4 sm:mb-6 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="saturn-h3 flex items-center gap-2.5 font-semibold tracking-tight saturn-text md:text-2xl">
                <x-ui.ionicon :icon="$featuredIcon" class="h-6 w-6 shrink-0 opacity-80" />
                <span>{!! $featuredHeading !!}</span>
            </h2>
            @if ($featuredCount > 1)
                <div
                    class="inline-flex w-fit shrink-0 items-stretch self-start overflow-hidden rounded-lg border saturn-border bg-black/[0.02] text-sm font-medium saturn-text shadow-none sm:self-auto dark:bg-white/[0.02]"
                    role="group" aria-label="{{ __('Featured posts navigation') }}">
                    <button type="button"
                        class="blog-featured-prev flex items-center justify-center px-2.5 py-2 transition hover:bg-black/[0.05] dark:hover:bg-white/[0.06]"
                        aria-label="{{ __('Previous featured post') }}">
                        <x-ui.ionicon icon="chevron-back-outline" class="h-5 w-5" />
                    </button>
                    <span class="w-px shrink-0 bg-current opacity-[0.12] dark:opacity-20" aria-hidden="true"></span>
                    <button type="button"
                        class="blog-featured-next flex items-center justify-center px-2.5 py-2 transition hover:bg-black/[0.05] dark:hover:bg-white/[0.06]"
                        aria-label="{{ __('Next featured post') }}">
                        <x-ui.ionicon icon="chevron-forward-outline" class="h-5 w-5" />
                    </button>
                </div>
            @endif
        </div>

        <div class="swiper blog-featured-swiper saturn-text overflow-hidden">
            <div class="swiper-wrapper">
                @foreach ($featuredPosts as $featuredPost)
                    @php
                        $titlePlain = strip_tags($featuredPost->title);
                        $hasCover = filled($featuredPost->post?->img_cover);
                        $excerptRaw =
                            $featuredPost->post?->resume
                            ?: $featuredPost->post?->content
                            ?: '';
                    @endphp
                    <div class="swiper-slide box-border w-full min-w-0 shrink-0">
                        <a href="{{ $postBase . '/' . ltrim($featuredPost->slug, '/') }}"
                            class="block rounded-xl outline-none ring-purple-500/30 transition hover:opacity-[0.98] focus-visible:ring-2">
                            <article class="flex flex-col gap-6 md:flex-row md:items-stretch md:gap-10">
                                <div
                                    class="relative w-full flex-shrink-0 overflow-hidden rounded-xl bg-black/[0.03] md:w-[44%] dark:bg-white/[0.04]">
                                    @if ($hasCover)
                                        <x-blog.post.cover-image :media="$featuredPost->post->img_cover"
                                            :alt="$titlePlain"
                                            class="aspect-[16/10] w-full object-cover md:aspect-[4/3] md:min-h-[220px]" />
                                    @else
                                        <div
                                            class="flex aspect-[16/10] w-full items-center justify-center bg-gradient-to-b from-black/[0.04] to-black/[0.07] md:aspect-[4/3] md:min-h-[220px] dark:from-white/[0.05] dark:to-white/[0.09]">
                                            <div class="animate-pulse" aria-hidden="true">
                                                <x-ui.ionicon icon="image-outline"
                                                    class="h-14 w-14 opacity-35 saturn-text-accent" />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex min-w-0 flex-1 flex-col justify-center space-y-3 md:py-1">
                                    @if ($featuredPost->post?->category)
                                        <span
                                            class="inline-flex w-fit rounded-lg border saturn-border bg-black/[0.02] px-2.5 py-1 text-xs font-medium saturn-text-accent dark:bg-white/[0.03]">
                                            {{ $featuredPost->post->category->name }}
                                        </span>
                                    @endif
                                    <h2
                                        class="blog-featured-title break-words text-xl font-semibold leading-snug tracking-tight saturn-text md:text-2xl">
                                        {{ $featuredPost->title }}
                                    </h2>
                                    <p class="blog-featured-excerpt text-base leading-relaxed saturn-text-accent">
                                        {{ strip_tags($excerptRaw) }}
                                    </p>
                                    <span class="text-sm saturn-text-accent">
                                        {{ $featuredPost->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
            </div>
            @if ($featuredCount > 1)
                <div class="blog-featured-pagination mt-6 flex justify-center"></div>
            @endif
        </div>
    </div>

    <style>
        .blog-featured-title {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            word-break: break-word;
        }

        .blog-featured-excerpt {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
            word-break: break-word;
        }

        .blog-featured-swiper .swiper-slide {
            width: 100%;
        }

        .blog-featured-swiper .swiper-pagination-bullet {
            width: 6px;
            height: 6px;
            opacity: 0.35;
            background: currentColor;
        }

        .blog-featured-swiper .swiper-pagination-bullet-active {
            opacity: 1;
        }
    </style>

    <script>
        function initBlogFeaturedCarousel() {
            if (typeof Swiper === 'undefined') {
                return;
            }

            document.querySelectorAll('[data-blog-featured]').forEach(function(root) {
                const count = parseInt(root.getAttribute('data-featured-count') || '0', 10);
                if (count < 1) {
                    return;
                }

                const el = root.querySelector('.blog-featured-swiper');
                if (!el) {
                    return;
                }

                if (el.swiper) {
                    el.swiper.destroy(true, true);
                }

                const options = {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    speed: 450,
                    watchOverflow: true,
                    rewind: count > 1,
                    observer: true,
                    observeParents: true,
                    resizeObserver: true,
                };

                if (count > 1) {
                    options.navigation = {
                        nextEl: root.querySelector('.blog-featured-next'),
                        prevEl: root.querySelector('.blog-featured-prev'),
                    };
                    options.pagination = {
                        el: root.querySelector('.blog-featured-pagination'),
                        clickable: true,
                    };
                }

                new Swiper(el, options);
            });
        }

        document.addEventListener('DOMContentLoaded', initBlogFeaturedCarousel);
        window.addEventListener('load', function() {
            document.querySelectorAll('.blog-featured-swiper').forEach(function(el) {
                if (el.swiper) {
                    el.swiper.update();
                }
            });
        });
    </script>
@endif

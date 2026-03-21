@props(['posts' => [], 'url' => config('app.url').'/', 'cols' => 1])

<x-ui.card-grid :cols="$cols" gap="16">
    @foreach ($posts as $post)
        <x-ui.card :is_border="false" :no_padding="true">
            @if ($cols == 1)
                @php $hasCover = (bool) $post->post?->img_cover; @endphp
                <div class="border-b saturn-border pb-14 pt-2 last:border-0 last:pb-2 md:pb-16">
                    <div
                        class="{{ $hasCover ? 'flex flex-row items-start gap-4 sm:gap-6 md:gap-8' : 'flex flex-col' }}">
                        @if ($hasCover)
                            <a href="{{ $url . $post->slug }}"
                                class="relative block w-28 shrink-0 overflow-hidden rounded-lg sm:w-40 md:w-48 lg:w-52 outline-none ring-purple-500/30 focus-visible:ring-2">
                                @if ($post->post?->is_featured)
                                    <span
                                        class="pointer-events-none absolute left-2 top-2 z-10 rounded-md border saturn-border-accent px-1.5 py-0.5 text-[9px] font-semibold uppercase tracking-wider shadow-sm saturn-bg saturn-text">
                                        {{ __('Featured') }}
                                    </span>
                                @endif
                                <x-blog.post.cover-image :media="$post->post->img_cover" :alt="strip_tags($post->title)"
                                    class="aspect-square h-24 w-full object-cover transition duration-300 hover:opacity-[0.96] sm:h-36 md:h-40 lg:h-44" />
                            </a>
                        @endif

                        <div class="flex min-w-0 flex-1 flex-col">
                            <a class="block outline-none ring-purple-500/30 focus-visible:ring-2"
                                href="{{ $url . $post->slug }}">
                                <div class="max-w-3xl space-y-3">
                                    <div
                                        class="flex flex-wrap items-center gap-x-2 gap-y-1 text-sm opacity-80 saturn-text">
                                        @if ($post->post?->category)
                                            <span class="font-medium opacity-100">{{ $post->post->category->name }}</span>
                                            <span class="opacity-40" aria-hidden="true">·</span>
                                        @endif
                                        <time datetime="{{ $post->created_at->toIso8601String() }}">
                                            {{ $post->created_at->format('M j, Y') }}
                                        </time>
                                    </div>

                                    <h3 class="text-xl font-semibold leading-snug tracking-tight saturn-text md:text-2xl">
                                        {{ Str::limit(strip_tags($post->title), 120) }}
                                    </h3>

                                    <p
                                        class="text-base leading-relaxed opacity-75 saturn-text line-clamp-3 md:line-clamp-4">
                                        {{ Str::limit(strip_tags($post->post->content), 220) }}
                                    </p>
                                </div>
                            </a>

                            <div
                                class="mt-5 flex max-w-3xl flex-wrap items-center justify-between gap-4 text-xs opacity-70 saturn-text">
                                <div class="flex flex-wrap items-center gap-3">
                                    <span>{{ $post->user->name ?? __('Author') }}</span>
                                    <span class="opacity-40" aria-hidden="true">·</span>
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                    <span class="opacity-40" aria-hidden="true">·</span>
                                    <x-ui.reading-time :content="$post->post->content" style="default" size="sm" />
                                </div>
                                <div class="flex items-center gap-4">
                                    <a href="{{ $url . $post->slug }}#post-comments-heading"
                                        class="inline-flex items-center gap-1 underline-offset-2 hover:underline">
                                        <x-ui.ionicon icon="chatbubble-ellipses-outline" class="text-sm" />
                                        <span>{{ $post->approvedCommentsCount() }} {{ __('comments') }}</span>
                                    </a>
                                    <x-ui.share :url="$url . $post->slug" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <a class="block duration-200 hover:opacity-60" href="{{ $url . $post->slug }}">
                    <div class="space-y-4">
                        @if ($post->post?->img_cover)
                            <div class="overflow-hidden rounded-lg saturn-border">
                                <x-blog.post.cover-image :media="$post->post->img_cover" :alt="strip_tags($post->title)"
                                    class="aspect-[16/9] w-full object-cover" />
                            </div>
                        @endif
                        <div class="space-y-3">
                            <h3 class="min-h-8 text-base font-semibold leading-tight saturn-text">
                                {{ Str::limit(strip_tags($post->title), 150) }}
                            </h3>
                            <p class="text-sm leading-relaxed opacity-70 saturn-text">
                                {{ Str::limit(strip_tags($post->post->content), 70) }}
                            </p>
                        </div>
                    </div>
                </a>
                <x-slot:footer>
                    <div class="flex items-center justify-between pt-3 text-xs opacity-70">
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <x-ui.share :url="$url . $post->slug" />
                    </div>
                </x-slot:footer>
            @endif
        </x-ui.card>
    @endforeach
</x-ui.card-grid>

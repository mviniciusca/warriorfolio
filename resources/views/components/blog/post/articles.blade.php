@props(['articles', 'setting'])


<div>
    <aside aria-label="Related articles" class="py-4 lg:py-12">
        <div class="mx-auto max-w-screen-xl">

            <h2
                class="mb-8 flex items-center justify-between border-t border-t-secondary-200/50 pt-8 text-2xl dark:border-t-secondary-800/50">
                <span class="flex items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <p class="header-title dg">{{ ($setting['more_articles_title'] ?? null) ?? __('More Stories') }}
                    </p>
                </span>
                <span>
                    <a href="{{ config('app.url') . '/' . config('warriorfolio.app_blog_basepath', 'blog/') }}">
                        <x-ui.button class="text-xs font-semibold" :style="'outlined'" :icon="'arrow-forward-sharp'">
                            {{ ($setting['more_articles_btn_title'] ?? null) ?? __('View All') }}
                        </x-ui.button>
                    </a>
                </span>
            </h2>
            <div class="w-full">
                @foreach ($articles as $item)
                    @if ($item->style === 'blog' && $item->post->is_active)
                        <x-blog.post.card :$item />
                    @endif
                @endforeach
            </div>
        </div>
    </aside>

</div>

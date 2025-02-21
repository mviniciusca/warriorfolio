@props(['current' => 'laravel-cloud-is-here', 'page' => null])
<div>
    <aside aria-label="Related articles" class="py-4 lg:py-12">
        <div class="mx-auto max-w-screen-xl">
            <h2
                class="mb-8 flex items-center justify-between border-b border-b-secondary-100 pb-4 text-xl dark:border-b-secondary-800">
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    <p>{{ __('Latest Stories') }}</p>
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

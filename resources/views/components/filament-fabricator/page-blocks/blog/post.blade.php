@aware(['page'])
@props(['title' => $page->title])

@if ($page->is_active)
    <main class="p-8 antialiased">
        <div class="mx-auto flex max-w-screen-xl justify-between">
            <article
                class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-3xl">
                <x-blog.header.breadcrumb :$title />
                <header class="not-format">
                    <h1 class="leading-tighter mt-5 text-3xl font-extrabold tracking-tighter lg:mb-4 lg:text-4xl">
                        {{ $page->title }}
                    </h1>
                    <h2 class="pb-8 text-xl leading-tight tracking-tight text-secondary-400 dark:text-secondary-500">
                        {{ $page->resume }}
                    </h2>
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>

                            {{ __('Published in ') . $page->category->name }}</span>
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            {{ \Carbon\Carbon::parse($page->created_at)->format('M d, Y ') }}
                        </span>
                    </div>
                </header>
                <x-blog.profile :$page />
                <div class="pb-12 pt-4">
                    {!! $page->content !!}
                </div>
                <x-blog.post.articles :page="$page" />
            </article>
        </div>
    </main>
@else
    <x-blog.post.not-found />
@endif

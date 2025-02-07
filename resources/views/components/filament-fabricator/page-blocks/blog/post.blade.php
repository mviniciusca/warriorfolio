@aware(['page'])
<x-core.layout>
    @if ($page->is_active)
        <x-blog.header :title='$page->title' />

        <main class="antialiased">
            <div class="mx-auto flex max-w-screen-xl justify-between px-4">
                <article
                    class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-3xl">
                    <x-blog.profile :published_at='$page->created_at' />
                    <header class="not-format mb-4 lg:mb-6">
                        <h1 class="leading-tighter mb-4 text-3xl font-extrabold tracking-tighter lg:mb-6 lg:text-4xl">
                            {{ $page->title }}</h1>
                        <p>{{ \Carbon\Carbon::parse($page->created_at)->format('d/m/Y H:i') }}</p>
                    </header>
                    <p class="lead">
                        {!! $page->content !!}
                    </p>
                </article>
            </div>
        </main>
        <x-blog.post.articles :page="$page" />
    @else
        <x-blog.post.not-found />
    @endif
</x-core.layout>

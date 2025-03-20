@aware(['page'])
@props(['title' => $page->title ?? null])

<x-core.layout :with_padding="false">
    @if ($page->post->is_active)
        <main class="antialiased my-16">
            <div class="mx-auto flex max-w-screen-xl justify-between">
                <article
                    class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-3xl">
                    <x-blog.header.breadcrumb :$title />
                    <section class="not-format">
                        <p class="py-2 font-mono text-xs uppercase">
                            {{ \Carbon\Carbon::parse($page->created_at)->format('F d, Y ') . __('in ') .
            $page->post->category->name }}
                        </p>
                        <h1
                            class="mt-2 text-3xl font-bold leading-snug tracking-tighter dark:text-white/90 lg:mb-4 lg:text-3xl">
                            {{ $page->title }}
                        </h1>
                        <h2 class="text-sm pb-4 leading-tight tracking-tight">
                            {{ $page->post->resume }}
                        </h2>
                    </section>
                    <x-blog.profile :$page />
                    <div class="content font-serif text-base leading-relaxed">
                        {!! $page->post->content !!}
                    </div>
                    <x-blog.post.share class="mt-8" />
                    <x-blog.post.articles :page="$page" />
                </article>
            </div>
        </main>
        {{-- Not Found --}}
    @else
        <x-blog.post.not-found />
    @endif
</x-core.layout>

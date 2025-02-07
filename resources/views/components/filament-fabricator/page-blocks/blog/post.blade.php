@aware(['page'])
<x-core.layout>
<x-blog.header :title='$page->title' />

<main class="antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
        <article class="mx-auto w-full max-w-3xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <x-blog.profile :published_at='$page->created_at' />
                <header class="mb-4 lg:mb-6 not-format">
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight  lg:mb-6 lg:text-4xl ">{{ $page->title }}</h1>
                </header>
                <p class="lead">
                    {!! $page->content !!}
                </p>
            </article>
        </div>
</main>
<x-blog.post.articles :page="$page"/>
</x-core.layout>

@aware(['page'])
<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <x-blog.profile :published_at='$page->created_at' />
                <h1 class="mb-4 text-3xl font-extrabold leading-tight  lg:mb-6 lg:text-4xl ">{{ $page->title }}</h1>
            </header>
            <p class="lead">
                {!! $page->content !!}
            </p>
        </article>
    </div>
</main>


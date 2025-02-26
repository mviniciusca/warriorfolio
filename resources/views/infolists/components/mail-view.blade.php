<div {{ $attributes }}>
    {{ $getChildComponentContainer() }}
    <main class="mx-auto max-w-3xl rounded-lg pb-16 pt-8 antialiased lg:pb-24 lg:pt-16">
        <div class="mx-auto flex max-w-screen-xl justify-between px-4">
            <article
                class="format format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-2xl">
                <header class="not-format mb-4 lg:mb-6">
                    <address class="mb-6 flex items-center not-italic">
                        <div class="mr-3 inline-flex items-center text-sm text-gray-900 dark:text-white">
                            <div>
                                <p class="text-base font-bold text-gray-800 dark:text-white">
                                    {{ $getRecord()->name }}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $getRecord()->email }}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    <time pubdate datetime="{{ $getRecord()->created_at }}"
                                        title="date">{{ $getRecord()->created_at }}
                                    </time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-600 dark:text-gray-200 lg:mb-6 lg:text-3xl">
                        {!! $getRecord()->subject ?? null !!}</h1>
                </header>
                <div class="body-message leading-relaxed">{!! $getRecord()->body !!}</div>
        </div>
    </main>
</div>
<script>
    document.querySelectorAll('.body-message p').forEach(p => p.classList.add('mt-4'));
</script>

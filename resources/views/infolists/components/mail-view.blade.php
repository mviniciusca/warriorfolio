<div {{ $attributes }} class="flex justify-center px-4">
    {{ $getChildComponentContainer() }}

    <main class="w-full max-w-3xl rounded-xl bg-white p-6 shadow-md dark:bg-gray-900 dark:shadow-lg">
        <header class="relative border-b border-gray-200 pb-6 dark:border-gray-800">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <p class="flex items-center gap-2 text-lg text-gray-800 dark:text-white">
                        <span class="font-bold">
                            {{ $getRecord()->name }}
                        </span>
                        <span class="text-sm font-normal italic text-gray-600 dark:text-gray-400">
                            {{ $getRecord()->email }}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ \Carbon\Carbon::parse($getRecord()->created_at)->format('F d, Y') }}
                    </p>
                </div>
                <div class="absolute right-2 top-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                        class="{{ $getRecord()->is_important ? '' : 'hidden' }} h-6 w-6 text-yellow-500">
                        <path
                            d="M12 17.75l-5.623 3.382 1.074-6.26L2.9 9.868l6.285-.914L12 3l2.814 5.954 6.285.914-4.55 4.004 1.074 6.26z" />
                    </svg>
                    @if ($getRecord()->is_sent)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    @endif
                </div>
            </div>
        </header>
        <article class="mt-6">
            <h1 class="text-xl font-bold lg:text-2xl">
                {!! $getRecord()->subject ?? __('No Subject') !!}
            </h1>
            <div class="body-message mt-4 space-y-4 leading-relaxed text-gray-800 dark:text-gray-300">
                {!! $getRecord()->body !!}
            </div>
        </article>
    </main>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll('.body-message p').forEach(p => p.classList.add('mt-2'));
    });
</script>

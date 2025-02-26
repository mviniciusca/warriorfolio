<div {{ $attributes }} class="flex justify-center px-4">
    {{ $getChildComponentContainer() }}

    <main class="w-full max-w-3xl rounded-xl bg-white p-6 shadow-lg dark:bg-gray-900">
        <header class="border-b border-gray-200 pb-4 dark:border-gray-800">
            <div class="flex items-center gap-4">
                <div class="flex flex-col">
                    <p class="text-lg font-semibold text-gray-800 dark:text-white">
                        {{ $getRecord()->name }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $getRecord()->email }}
                    </p>
                    <p class="mt-1 text-xs text-gray-500">
                        <time datetime="{{ $getRecord()->created_at }}">
                            {{ __('Received in: ') . \Carbon\Carbon::parse($getRecord()->created_at)->format('F d, Y ') }}
                        </time>
                    </p>
                </div>
            </div>
        </header>

        <article class="mt-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {!! $getRecord()->subject ?? __('No Subject') !!}
            </h1>

            <div class="body-message mt-4 space-y-4 leading-relaxed text-gray-700 dark:text-gray-300">
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

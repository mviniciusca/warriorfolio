<x-filament-widgets::widget>
    <div
        class="rounded-lg border border-neutral-200 px-3 py-2.5 text-sm dark:border-neutral-800 sm:px-4"
    >
        <div class="flex flex-wrap items-center gap-x-2 gap-y-1 text-neutral-600 dark:text-neutral-400">
            @if ($unreadMailCount > 0)
                <a
                    wire:navigate
                    href="{{ $mailIndexUrl }}"
                    class="font-medium text-neutral-950 underline decoration-neutral-300 underline-offset-2 transition hover:decoration-neutral-500 dark:text-white dark:decoration-neutral-600 dark:hover:decoration-neutral-400"
                >
                    {{ trans_choice(':count unread message|:count unread messages', $unreadMailCount, ['count' => $unreadMailCount]) }}
                </a>
            @endif

            @if ($pendingCommentsCount > 0)
                @if ($unreadMailCount > 0)
                    <span class="text-neutral-300 dark:text-neutral-600" aria-hidden="true">&middot;</span>
                @endif
                <a
                    wire:navigate
                    href="{{ $commentsIndexUrl }}"
                    class="font-medium text-neutral-950 underline decoration-neutral-300 underline-offset-2 transition hover:decoration-neutral-500 dark:text-white dark:decoration-neutral-600 dark:hover:decoration-neutral-400"
                >
                    {{ trans_choice(':count pending comment|:count pending comments', $pendingCommentsCount, ['count' => $pendingCommentsCount]) }}
                </a>
            @endif

            @if ($unreadMailCount === 0 && $pendingCommentsCount === 0)
                <span class="text-neutral-500 dark:text-neutral-500">
                    {{ __('Inbox and comments are up to date.') }}
                </span>
            @endif

            <span class="text-neutral-300 dark:text-neutral-600" aria-hidden="true">&middot;</span>

            <a
                wire:navigate
                href="{{ $checksTabUrl }}"
                class="font-medium text-neutral-700 underline decoration-neutral-300 underline-offset-2 transition hover:decoration-neutral-500 dark:text-neutral-300 dark:decoration-neutral-600 dark:hover:decoration-neutral-400"
            >
                {{ __('System checks') }}
            </a>
        </div>
    </div>
</x-filament-widgets::widget>

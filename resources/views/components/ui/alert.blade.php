@props(['icon' => null, 'close' => false, 'id' => null])

<div id="{{ $id }}"
    class="items-center justify-center border-b border-b-secondary-200 bg-secondary-50 text-sm font-light dark:border-b-secondary-800 dark:bg-secondary-900">
    <div class="px-4 py-4 md:py-6">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-2">
            <p class="flex flex-wrap items-center gap-1">
                @if($icon)
                <ion-icon class="text-xl" name="{{ $icon }}"></ion-icon>
                @endif
                {{ $slot }}
            </p>
            <p>
                @if($close)
                <button id="setCookieButton" data-collapse-toggle="{{ $id }}" type="button"
                    class="flex items-center rounded-lg p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                @endif
            </p>
        </div>
    </div>
</div>

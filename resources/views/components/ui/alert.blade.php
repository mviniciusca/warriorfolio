@props(['icon' => null])

<div
    class="border-b border-b-secondary-200 bg-secondary-50 text-sm font-light dark:border-b-secondary-800 dark:bg-secondary-900">
    <div class="py-6">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-wrap items-center gap-2">

                @if($icon)
                <ion-icon class="text-xl" name="{{ $icon }}"></ion-icon>
                @endif

                <div class="flex flex-wrap items-center gap-2">{{ $slot }}</div>

            </div>
        </div>
    </div>
</div>

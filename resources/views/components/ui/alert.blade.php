@props(['icon' => null])

<div {{ $attributes->merge(['class' => 'z-50 text-sm mx-auto w-full border border-secondary-200
    dark:border-secondary-800
    bg-secondary-100
    dark:bg-secondary-950']) }}
    >
    <div class="py-5">
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
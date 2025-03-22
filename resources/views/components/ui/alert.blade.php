{{--

This alert component is responsible for rendering the alert section of the website.
Used to display important messages to the user, like success messages, error messages, etc.

--}}

@props(['icon' => null])

<div {{ $attributes->merge([
    'class' => 'z-50 text-sm bg-black dark:text-black text-white mx-auto w-full dark:bg-white',
]) }}>
    <div class="py-4">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-wrap items-center gap-2">
                @if ($icon)
                    <ion-icon class="animate-pulse text-xl" name="{{ $icon }}"></ion-icon>
                @endif
                <div class="flex flex-wrap items-center gap-2">{{ $slot }}</div>
            </div>
        </div>
    </div>
</div>

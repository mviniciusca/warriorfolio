@props([
'id' => null,
'icon' => null,
'style' =>'default',
'button_text' => null,
'is_dismissible' => false,
])

{{-- <div {{ $attributes->merge([
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
</div> --}}

{{-- Default Style: --}}
@if($style === 'default')
<div tabindex="-1" wire:ignore id="wrapper-{{ $id }}"
    class="saturn-alert saturn-bg saturn-text fixed bottom-0 w-full border-t saturn-border-accent animate__fadeInUp">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
@endif

{{-- Bumper Style --}}
@if($style === 'bumper')
<div class="saturn-alert saturn-bg border-b saturn-border-accent animate__fadeInDown saturn-text fixed top-0 w-full"
    id="wrapper-{{ $id }}" tabindex="-1">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
</div>
@endif

{{-- Banner Style --}}

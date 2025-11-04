@props([
'id' => null,
'icon' => null,
'style' => null,
'button_text' => null,
'is_dismissible' => false,
])

{{-- Alert --}}
@if($style === null)
<div {{ $attributes->merge([
    'class' => 'saturn-alert saturn-bg saturn-text border-b saturn-border-accent',
    ]) }}>
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
@endif

{{-- Default Style --}}
@if($style === 'default')
<div wire:key="$id" tabindex="-1" wire:ignore id="wrapper-{{ $id }}"
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
<div wire:key="$id"
    class="saturn-alert saturn-bg border-b saturn-border-accent animate__fadeInDown saturn-text fixed top-0 w-full"
    id="wrapper-{{ $id }}" tabindex="-1">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
@endif

{{-- Banner Style --}}
@if($style === 'banner')
<div wire:key='$id' class="saturn-alert saturn-bg saturn-text top-0 w-full border-b saturn-border-accent"
    id="wrapper-{{ $id }}" tabindex="-1">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
@endif

{{-- Toast Style --}}
@if($style === 'toast')
<div wire:key="$id"
    class="saturn-alert rounded-lg saturn-bg saturn-text fixed bottom-5 left-5 mx-auto max-w-xl border saturn-border-accent animate__fadeInUp"
    id="wrapper-{{ $id }}" tabindex="-1">
    <div class="grid gap-2 py-4 px-5 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2 text-xs leading-relaxed">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <span class="m-2">
            <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
        </span>
    </div>
</div>
@endif

{{-- Modal Style --}}
@if($style === 'modal')
<x-ui.modal tabindex="-1" wire:key="$id" id="wrapper-{{ $id }}" :autoOpen="true" :title="null" :closable="true"
    :overlay="true" size="xl" class="saturn-bg saturn-text border saturn-border-accent">
    <div class="p-6">
        <div class="flex items-center gap-2">
            <span class="text-sm">{!! $slot !!}</span>
        </div>
    </div>
    <x-slot name="footer">
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </x-slot>
</x-ui.modal>
@endif

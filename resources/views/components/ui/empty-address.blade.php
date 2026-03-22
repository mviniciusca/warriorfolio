@props(['data'])

@php
    $showEmptyHint = empty(array_filter([
        data_get($data, 'google_map'),
        data_get($data, 'address'),
        data_get($data, 'phone'),
        data_get($data, 'email'),
    ]));
@endphp

<div {{ $attributes->class(['flex w-full flex-col items-center text-center']) }}>
    <div class="flex w-full justify-center">
        <x-ui.contact-icon />
    </div>
    @if ($showEmptyHint)
        <div class="mt-6 w-full max-w-sm">
            <x-ui.empty-section :auth="__('Update your Contact Section.')" />
        </div>
    @endif
</div>

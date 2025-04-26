@props(['items' => null, 'justify' => 'center', 'size' => null])

{{-- Social Network Component --}}
@php
    $linkedinUrl = null;
    if ($items ?? false) {
        foreach ($items as $social) {
            if (
                ($social['is_active'] ?? false) &&
                strtolower($social['social_network']) === 'linkedin' &&
                !empty($social['profile_link'])
            ) {
                $linkedinUrl = 'https://' . $social['profile_link'];
                break;
            }
        }
    }
@endphp

<div {{ $attributes->class([
    'flex flex-wrap gap-4',
    $justify === 'center'
        ? 'justify-center items-center'
        : ($justify === 'start'
            ? 'justify-start items-start'
            : 'justify-end items-end'),
]) }}
    data-linkedin="{{ $linkedinUrl }}">
    @if ($items ?? false)
        @foreach ($items as $social)
            @if ($social['is_active'] ?? false)
                <x-ui.icon :$size :href="'https://' . $social['profile_link']" :name="$social['social_network']" />
            @endif
        @endforeach
    @endif
    {{-- Empty Section --}}
    @if ($items == null)
        <x-ui.empty-section :auth="__('Update your Social Network.')" />
    @endif
</div>

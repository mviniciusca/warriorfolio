@props([
    'media' => null,
    'alt' => '',
])

@php
    $raw = $media;
    $isCuratorMedia =
        $raw !== null
        && $raw !== ''
        && (is_int($raw)
            || is_object($raw)
            || (is_string($raw) && ctype_digit($raw)));
    $curatorRef = $isCuratorMedia && is_string($raw) && ctype_digit($raw) ? (int) $raw : $raw;
@endphp

@if ($isCuratorMedia)
    <x-curator-glider {{ $attributes }} :media="$curatorRef" />
@elseif (is_string($raw) && $raw !== '')
    <img src="{{ \Illuminate\Support\Str::startsWith($raw, ['http://', 'https://', '//']) ? $raw : asset('storage/' . ltrim($raw, '/')) }}"
        alt="{{ $alt }}" {{ $attributes }} />
@endif

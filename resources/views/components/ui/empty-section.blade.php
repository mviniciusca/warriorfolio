@props(['message' => false, 'auth' => null, 'info' => [], 'icon' => null, 'class' => ''])

@isset($info['empty_section'])
@if ($info['empty_section'])
@if ($message || ($auth && auth()->check()))
<div class="mx-auto text-center text-xs {{ $class }}">
    @if ($icon)
    <x-ui.ionicon :$icon class="mx-auto" />
    @else
    <x-ui.ionicon icon="information-circle-outline" class="mx-auto" />
    @endif
    <p class="mt-2">
        @if ($message)
        {!! __($message) !!}
        @endif
        @if ($auth && auth()->check())
        <span class="block mt-1 opacity-60">{!! __($auth) !!}</span>
        @endif
    </p>
</div>
@endif
@endif
@endisset

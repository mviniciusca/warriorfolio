@props(['message' => false, 'auth' => null, 'info' => [], 'icon' => null])

@isset($info['empty_section'])
@if ($info['empty_section'])
@if ($message || ($auth && auth()->check()))
<div class="mx-auto text-center text-xs">
    @if ($icon)
    <x-ui.ionicon wire:ignore :icon="$icon" class="mx-auto h-6 w-6 text-secondary-500" />
    @else
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="mx-auto size-6 text-secondary-500">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776" />
    </svg>
    @endif
    <p class="mt-2 text-secondary-500">
        @if ($message)
        {!! __($message) !!}
        @endif
        @if ($auth && auth()->check())
        <span class="block mt-1 text-primary-500">{!! __($auth) !!}</span>
        @endif
    </p>
</div>
@endif
@endif
@endisset

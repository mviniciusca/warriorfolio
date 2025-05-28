@props([
'bumper_icon',
'bumper_title',
'bumper_tag',
'bumper_role',
'bumper_link',
'bumper_target' => '_self',
'is_active' => false,
'is_center' => true,
'is_animated' => true
])

{{-- Info Bumper Component --}}
@if ($is_active)
<div class="{{ $is_center ? 'text-center' : 'text-left' }} my-2 mx-auto">
    @if ($bumper_link)
    <a target="{{ $bumper_target }}" href="{{ $bumper_link }}" class="inline-block">
        @endif

        <div id="info-bumper"
            class="mb-2 inline-flex items-center justify-between border saturn-border rounded-full saturn-bg p-1 pr-4 text-xs transition-all duration-300 hover:shadow-md {{ $is_animated ? 'animate__animated animate__fadeInUp animate__delay-1s' : '' }}"
            role="banner">

            <span
                class="mr-2 rounded-full px-2 py-1 text-white text-xs font-medium {{ $is_animated ? 'animate-pulse' : '' }} {{ $bumper_role === 'danger' ? 'bg-red-600' : ($bumper_role === 'info' ? 'bg-blue-600' : ($bumper_role === 'success' ? 'bg-green-600' : ($bumper_role === 'warning' ? 'bg-yellow-600' : 'saturn-bg-inverse saturn-text-inverse'))) }}">
                {!! $bumper_tag !!}
            </span>

            <span class="text-xs font-medium flex-1 text-left">
                {!! $bumper_title !!}
            </span>

            @if ($bumper_icon)
            <x-ui.ionicon :icon="$bumper_icon" class="ml-3 w-4 h-4" />
            @endif
        </div>

        @if ($bumper_link)
    </a>
    @endif
</div>
@endif

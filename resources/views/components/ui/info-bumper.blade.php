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
<div class="{{ $is_center ? 'text-center' : 'text-left' }} my-4 mx-auto">
    @if ($bumper_link && $bumper_target)
    <a target="{{ $bumper_target }}" href="{{ $bumper_link ?? '#' }}">
        @endif
        <div id="info-bumper"
            class="{{ $is_animated ? 'animate__animated animate__fadeInUp animate__delay-1s' : 'animate-none' }} mb-2 inline-flex items-center justify-between border saturn-border rounded-full saturn-bg px-1 py-1 pr-4 text-xs"
            role="{{ $bumper_role }}">
            <span
                class="{{ $is_animated ? 'animate-pulse' : 'animate-none' }}
                {{ $bumper_role === 'danger' ? 'bg-danger-600' : ($bumper_role === 'info' ? 'bg-info-600' : 'saturn-bg-inverse saturn-text-inverse') }} mr-2 rounded-full px-2 py-1 text-white text-xs">
                {!! $bumper_tag !!}
            </span>
            <span class="text-xs">{!! $bumper_title !!}</span>
            <x-ui.ionicon :icon="$bumper_icon" class="ml-3" />
        </div>
        @if ($bumper_link && $bumper_target)
    </a>
    @endif
</div>
@endif

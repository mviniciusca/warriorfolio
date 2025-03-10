{{-- Info Bumper Component --}}

@props([
    'bumper_target' => null ?? '_self',
    'bumper_link' => null,
    'bumper_role' => null,
    'bumper_tag' => null,
    'bumper_title' => null,
    'bumper_icon' => null,
    'is_active' => null,
    'is_center' => null,
    'is_animated' => null,
])

@if ($is_active)
    <div class="{{ $is_center ? 'text-center' : 'text-left' }} mx-auto">
        @if ($bumper_link && $bumper_target)
            <a target="{{ $bumper_target }}" href="{{ $bumper_link ?? '#' }}">
        @endif
        <div class="{{ $is_animated ? 'animate__animated animate__fadeInUp animate__delay-1s' : 'animate-none' }} mb-2 inline-flex items-center justify-between rounded-full bg-secondary-50 px-1 py-1 pr-4 text-sm shadow-lg hover:bg-secondary-100 dark:bg-secondary-950 dark:hover:bg-secondary-900"
            role="{{ $bumper_role }}">
            <span
                class="{{ $is_animated ? 'animate-pulse' : 'animate-none' }} {{ $bumper_role === 'danger' ? 'bg-danger-700' : ($bumper_role === 'info' ? 'bg-info-500' : 'bg-primary-500') }} mr-3 rounded-full px-4 py-1.5 text-xs text-white">
                {!! $bumper_tag !!}
            </span>
            <span class="text-sm font-medium">{!! $bumper_title !!}</span>
            <x-ui.ionicon :icon="$bumper_icon" class="ml-3" />
        </div>
        @if ($bumper_link && $bumper_target)
            </a>
        @endif
    </div>
@endif

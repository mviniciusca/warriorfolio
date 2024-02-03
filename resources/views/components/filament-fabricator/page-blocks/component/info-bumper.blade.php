@aware(['page'])
@props(['bumper_target' => null, 'bumper_link' => null, 'bumper_role' => null, 'bumper_tag' => null, 'bumper_title'
=> null, 'bumper_icon' => null, 'is_active' => null , 'is_center' => null, 'is_animated' => null])

@if($is_active)
<div class="py-2 max-w-7xl mx-auto {{ $is_center ? 'text-center' : 'text-left' }}">

    @if($bumper_link && $bumper_target)
    <a target="{{ $bumper_target }}" href="{{ $bumper_link ?? '#' }}">
        @endif

        <div class="{{ $is_animated ? 'animate__animated animate__fadeInUp animate__delay-1s' : 'animate-none' }} mb-2 inline-flex items-center justify-between rounded-full bg-secondary-100 px-1 py-1 pr-4 text-sm text-secondary-700 hover:bg-secondary-200 dark:bg-secondary-800 dark:text-white dark:hover:bg-secondary-700"
            role="{{ $bumper_role }}">
            <span class="mr-3 {{ $is_animated ? 'animate-pulse' : 'animate-none' }} rounded-full px-4 py-1.5 text-xs text-white {{ $bumper_role == 'danger' ? 'bg-red-700' :
             ($bumper_role == 'info' ? 'bg-indigo-500' : 'bg-primary-700') }}">
                {!! $bumper_tag !!}
            </span>
            <span class="text-sm font-medium">{!! $bumper_title !!}</span>
            <x-ui.ionicon :icon="$bumper_icon" class="ml-3" />
        </div>

        @if($bumper_link && $bumper_target)
    </a>
    @endif

</div>
@endif

@aware(['page'])
@props([
    'module_title' => null,
    'module_subtitle' => null,
    'button_url' => null,
    'button_header' => null,
    'with_padding' => true,
    'is_filled' => null,
    'icon' => 'arrow-forward-sharp',
    'is_center' => true,
])

<div class="{{ $with_padding ? 'py-12 md:py-16 lg:py-20' : 'py-4' }} {{ $is_filled ? 'section-filled' : '' }} px-4">
    <div class="mx-auto max-w-7xl">
        @if ($module_title)
            <div class="{{ $button_header ? 'flex justify-between flex-initial' : '' }}py-4">
                <p class="dg header-title {{ $is_center ? 'text-center' : 'text-left' }}">{{ $module_title }}</p>
                @if ($button_header)
                    @if ($button_url)
                        <a href="{{ $button_url }}">
                    @endif
                    <x-ui.button-alt :$icon>
                        {!! $button_header !!}
                    </x-ui.button-alt>
                @endif
                @if ($button_url)
                    </a>
                @endif
            </div>
        @endif
        @if ($module_subtitle)
            <div class="subtitle {{ $is_center ? 'text-center' : 'text-left' }} subtitle">
                {{ $module_subtitle }}
            </div>
        @endif
        <div class="{{ $with_padding ? 'mt-4 md:mt-8 lg:mt-16' : 'mt-4' }}">
            {!! $slot !!}
        </div>
    </div>
</div>

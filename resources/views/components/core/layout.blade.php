@aware(['page'])
@props([
    'module_title' => null,
    'module_subtitle' => null,
    'button_url' => null,
    'button_header' => null,
    'with_padding' => true,
    'is_filled' => null,
    'icon' => 'arrow-forward-sharp',
])

<div class="{{ $with_padding ? 'md:py-8 lg:py-16' : 'py-2' }} {{ $is_filled ? 'section-filled' : '' }} px-4">
    <div class="mx-auto max-w-7xl">
        @if ($module_title)
            <div class="{{ $button_header ? 'flex justify-between flex-initial' : '' }}py-4">
                <p class="header-title">{{ $module_title }}</p>
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
            <div class="subtitle mx-auto mt-2 max-w-3xl text-center text-lg">
                {{ $module_subtitle }}
            </div>
        @endif
        <div class="{{ $with_padding ? 'mt-4 md:mt-8 lg:mt-16' : 'mt-4' }}">
            {!! $slot !!}
        </div>
    </div>
</div>

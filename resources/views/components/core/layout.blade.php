{{--

Core > View: Default Layout
----------------------------------------------------------------
This is the default layout component for the website. Used for website and components.
-------------------------------------------------------------------

--}}

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
    'module_name' => null,
    'is_section_filled_inverted' => false,
    'px_padding' => true,
    'container' => settings('design.container_width', 'max-w-7xl'),
])

<div class="{{ $with_padding ? 'py-12 md:py-16 lg:py-20' : 'py-0' }} {{ $is_section_filled_inverted ? 'bg-secondary-950 text-secondary-300 dark:bg-secondary-50 dark:text-secondary-900' : '' }} {{ $is_filled ? 'section-filled duration-300 transition-all' : '' }} {{ $px_padding ? 'px-4' : '' }}"
    id="{{ $module_name ?? 'app-' . rand(1, 10) }}">

    <div class="{{ $container }} mx-auto">
        @if ($module_title)
            <div class="{{ $button_header ? 'flex justify-between flex-initial' : '' }} py-4">
                <p class="dg header-title {{ $is_center ? 'text-center' : 'text-left' }}">{{ $module_title }}</p>
                @if ($button_header)
                    @if ($button_url)
                        <a href="{{ $button_url }}">
                    @endif
                    <x-ui.button :$icon :style="'outlined'">
                        {!! $button_header !!}
                    </x-ui.button>
                @endif
                @if ($button_url)
                    </a>
                @endif
            </div>
        @endif
        @if ($module_subtitle)
            <div
                class="subtitle {{ $is_center ? 'text-center max-w-4xl' : 'text-left w-full' }} subtitle mb-12 text-sm">
                {{ $module_subtitle }}
            </div>
        @endif
        <div id="app-container-{{ rand(1, 10) }}">
            {!! $slot !!}
        </div>
    </div>
</div>

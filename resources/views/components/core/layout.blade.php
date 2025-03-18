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
])

<div id="{{ $module_name ?? 'app-' . rand(1, 10) }}"
    class="{{ $with_padding ? 'py-12 md:py-16 lg:py-20' : 'py-4' }}
    {{ $is_section_filled_inverted ? 'bg-black text-white dark:bg-white dark:text-black' : '' }}
     {{ $is_filled ? 'section-filled duration-300 transition-all' : '' }}

     px-4">
    <div class="mx-auto max-w-7xl">
        @if ($module_title)
            <div class="{{ $button_header ? 'flex justify-between flex-initial' : '' }}py-4">
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
            <div class="subtitle {{ $is_center ? 'text-center max-w-4xl' : 'text-left w-full' }} text-sm subtitle">
                {{ $module_subtitle }}
            </div>
        @endif
        <div class="my-4">
            {!! $slot !!}
        </div>
    </div>
</div>

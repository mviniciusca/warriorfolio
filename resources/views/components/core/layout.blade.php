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
        <div id="app-container-{{ rand(1, 10) }}">
            {!! $slot !!}
        </div>
    </div>
</div>

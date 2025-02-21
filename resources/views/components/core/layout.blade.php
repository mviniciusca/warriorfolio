@aware(['page'])
@props(['module_title' => null, 'module_subtitle' => null])

<section {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="{{ $module_title ? 'py-16' : 'py-8' }} mx-auto max-w-7xl px-8 md:px-12 lg:px-16">

        @if ($module_title)
            <div class="header-title py-2">{{ $module_title }}</div>
        @endif

        @if ($module_subtitle)
            <div class="subtitle mx-auto mt-4 max-w-3xl text-center text-lg">{{ $module_subtitle }}</div>
        @endif
        <div class="section-container" id="app-container">
            {{ $slot }}
        </div>
    </div>
</section>

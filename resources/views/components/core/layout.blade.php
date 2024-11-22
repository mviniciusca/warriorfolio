@aware(['page'])
@props(['module_title' => null, 'module_subtitle' => null])

<section {{ $attributes->merge(['class' => 'w-full ']) }}>
    <div class="mx-auto px-8 md:px-12 lg:px-16 max-w-7xl {{ $module_title ? 'py-8' : 'py-4' }}">

        @if($module_title)
        <div class="header-title py-2">{{ $module_title }}</div>
        @endif

        @if($module_subtitle)
        <div class="subtitle mx-auto mt-4 max-w-5xl text-center">{{ $module_subtitle }}</div>
        @endif
        <div class="section-container" id="app-container">
            {{ $slot }}
        </div>
    </div>
</section>
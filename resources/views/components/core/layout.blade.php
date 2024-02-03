@aware(['page'])
@props(['module_title' => null, 'module_subtitle' => null])

<main {{ $attributes->merge(['class' => 'w-full mt-12']) }}>
    <div class="px-4 py-4 md:py-8">
        <div class="mx-auto max-w-7xl">
            <div class="header-title py-2">{{ $module_title }}</div>
            <div class="subtitle mt-2 text-center text-xl">{{ $module_subtitle }}</div>
            {{ $slot }}
        </div>
    </div>
</main>

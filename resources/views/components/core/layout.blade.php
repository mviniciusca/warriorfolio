@aware(['page'])
@props(['module_title' => null, 'module_subtitle' => null])

<main {{ $attributes->merge(['class' => 'w-full ']) }}>
    <div class="px-16 bg-yellow-200 py-8 md:py-4">
        <div class="mx-auto max-w-7xl">
            <div class="header-title py-2">{{ $module_title }}</div>
            <div class="subtitle mx-auto mt-2 max-w-5xl text-center">{{ $module_subtitle }}</div>
            {{ $slot }}
        </div>
    </div>
</main>
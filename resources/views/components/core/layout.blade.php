@aware(['page'])
@props([
    'module_title' => null,
    'module_subtitle' => null,
    'button_header' => null,
    'icon' => 'arrow-forward-sharp',
])

<section {{ $attributes->merge(['class' => 'w-full antialiased']) }}>
    <div id="module-app-container" class="app-module mw-full mx-auto max-w-7xl px-4 py-6 sm:px-8 lg:px-12 lg:py-16">
        @if ($module_title)
            <div class="{{ $button_header ? 'flex justify-between items-center flex-initial' : '' }}">
                <p id="module-header-title" class="header-title py-4 sm:py-6 lg:py-8">{{ $module_title }}</p>
                <span>
                    @if ($button_header)
                        <x-ui.button-alt :$icon>
                            {{ $button_header }}
                        </x-ui.button-alt>
                    @endif
                </span>
            </div>
        @endif
        @if ($module_subtitle)
            <div id="module-subtitle" class="subtitle mx-auto text-center text-lg">
                {{ $module_subtitle }}
            </div>
        @endif
        <div id="module-main-content">
            {{ $slot }}
        </div>
    </div>
</section>

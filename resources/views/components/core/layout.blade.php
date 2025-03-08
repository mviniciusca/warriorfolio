@aware(['page'])
@props([
    'with_padding' => true,
    'module_title' => null,
    'module_subtitle' => null,
    'button_header' => null,
    'icon' => 'arrow-forward-sharp',
])

<section {{ $attributes->merge(['class' => 'w-full antialiased']) }}>
    <div class="{{ $with_padding ? 'py-16' : 'py-4' }} mx-auto max-w-7xl px-8">

        @if ($module_title)
            <div class="{{ $button_header ? 'flex justify-between flex-initial' : '' }}py-4">
                <p class="header-title">{{ $module_title }}</p>
                @if ($button_header)
                    <x-ui.button-alt :$icon>
                        {{ $button_header }}
                    </x-ui.button-alt>
                @endif
            </div>
        @endif
        @if ($module_subtitle)
            <div class="subtitle mx-auto mt-2 max-w-3xl text-center text-lg">
                {{ $module_subtitle }}
            </div>
        @endif


        <div class="section-container {{ $with_padding ? 'py-8' : '' }}" id="app-container">
            {{ $slot }}
        </div>


    </div>
</section>

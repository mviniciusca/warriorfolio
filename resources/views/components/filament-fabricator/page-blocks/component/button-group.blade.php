@aware(['page'])
@props(['type' => 'button', 'button_title' => null, 'button_url' => null, 'button_icon' => null,
'button_target' => null, 'button_size' => null, 'button_title_secondary' => null, 'button_url_secondary' => null,
'button_url_secondary' => null, 'button_icon_secondary' => null, 'button_target_secondary' => null,
'button_size_secondary' => null, 'is_active' => null, 'is_active_secondary' => null])

<div>
    <div class="mx-auto max-w-7xl">
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-x-4 sm:space-y-0 lg:mb-4">

            @if($is_active)
            @if($button_title && $button_url)
            <a href="{{ $button_target }}" target="{{ $button_url }}">
                <x-ui.button class="{{ $button_size }} text-sm" :icon="$button_icon">
                    {{ $button_title }}
                </x-ui.button>
            </a>
            @endif
            @endif

            @if($is_active_secondary)
            @if($button_title_secondary && $button_url_secondary)
            <a href="{{ $button_url_secondary }}" target="{{ $button_target_secondary }}">
                <x-ui.button-alt class="{{ $button_size_secondary }} text-sm" :icon="$button_icon_secondary">
                    {{ $button_title_secondary }}
                </x-ui.button-alt>
            </a>
            @endif
            @endif

        </div>
    </div>
</div>

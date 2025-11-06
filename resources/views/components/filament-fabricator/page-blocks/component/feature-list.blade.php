@aware(['page'])
@props([
'columns' => 3,
'features' => [],
'title' => $module_title ?? null,
'is_active' => null,
'role' => null,
'is_border' => null,
'is_filled' => null,
'button_url' => null,
'is_animated' => null,
'with_padding' => true,
'is_light_fx' => null,
'is_color_icon' => null,
'button_header' => null,
'button_icon' => null,
'subtitle' => $module_subtitle ?? null,
'module_title' => null,
'is_card_filled' => null,
'module_subtitle' => null,
'is_content_center' => null,
'is_heading_active' => true,
'is_centered' => $is_heading_centered ?? false,
'is_heading_visible' => $is_heading_active ?? null,
'is_section_filled_inverted' => false,
])

@if($is_active)
<x-core.layout :$is_filled :$with_padding :$is_centered :$is_section_filled_inverted :$title :$subtitle
    :$is_heading_visible :$button_header :$button_url :$button_icon>
    <x-ui.card-grid :cols="$columns">
        @foreach ($features as $item)
        @if(!isset($item['is_card_hidden']) || empty($item['is_card_hidden']))
        @if(!empty($item['link']))
        <a class="pointer hover:opacity-80 active:opacity-70 transition-all duration-100" href="{{ $item['link'] }}"
            @if(!empty($item['is_new_window'])) target="_blank" rel="noopener noreferrer" @endif>
            <x-ui.card :role="$item['role'] ?? null" :$is_filled :$is_color_icon :$is_content_center
                :$is_section_filled_inverted :$is_border :$is_card_filled>
                <x-slot:header>
                    <div class="flex items-center gap-2">
                        <x-ui.ionicon :icon="$item['icon'] ?? null"
                            class="h-7 w-7 {{ $is_color_icon ? 'text-primary-500' : '' }}" />
                        <span>{!! $item['title'] ?? null !!}</span>
                    </div>
                </x-slot:header>
                {!! $item['description'] ?? null !!}
            </x-ui.card>
        </a>
        @else
        <x-ui.card :role="$item['role'] ?? null" :$is_filled :$is_color_icon :$is_content_center
            :$is_section_filled_inverted :$is_border :$is_card_filled>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <x-ui.ionicon :icon="$item['icon'] ?? null"
                        class="h-7 w-7 {{ $is_color_icon ? 'text-primary-500' : '' }}" />
                    <span>{!! $item['title'] ?? null !!}</span>
                </div>
            </x-slot:header>
            {!! $item['description'] ?? null !!}
        </x-ui.card>
        @endif
        @endif
        @endforeach
    </x-ui.card-grid>
</x-core.layout>
@endif

@aware(['page'])
@props([
'is_active' => null,
'is_animated' => null,
'is_border' => null,
'is_color_icon' => null,
'is_content_center' => null,
'is_filled' => null,
'is_light_fx' => null,
'button_header' => null,
'button_url' => null,
'columns' => 3,
'features' => [],
'module_subtitle' => null,
'module_title' => null,
'with_padding' => true,
'is_heading_active' => true,
'is_card_filled' => null,
'is_section_filled_inverted' => false,
'title' => $module_title ?? null,
'subtitle' => $module_subtitle ?? null,
'is_heading_visible' => $is_heading_active ?? null,
'is_centered' => $is_heading_centered ?? false,
])


<x-core.layout :$is_section_filled_inverted :$title :$subtitle :$is_heading_visible>
    <x-ui.card-grid :cols="$columns">
        @foreach ($features as $item)
        <x-ui.card>
            <x-slot:header>
                <div class="flex items-center gap-2">
                    <x-ui.ionicon :icon="$item['icon'] ?? null" class="h-6 w-6" />
                    <span>{!! $item['title'] ?? null !!}</span>
                </div>
            </x-slot:header>
            {!! $item['description'] ?? null !!}
        </x-ui.card>
        @endforeach
    </x-ui.card-grid>
</x-core.layout>


{{-- <x-core.layout :$is_centered :$is_heading_visible :$title :$subtitle :$is_filled :$is_section_filled_inverted
    :$button_header :$button_url>
    <div class="mx-auto {{ $with_padding ? 'py-8' : 'py-12' }}">
        <div @class([ 'grid gap-4' , 'text-center'=> $is_content_center,
            'text-left' => !$is_content_center,
            'grid-cols-1' => true,
            'md:grid-cols-2' => $columns == 2,
            'sm:grid-cols-2 md:grid-cols-3' => $columns == 3,
            'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4' => $columns == 4,
            ])>
            @foreach ($features as $item)
            @if(!isset($item['is_card_hidden']) || empty($item['is_card_hidden']))
            <x-filament-fabricator.page-blocks.component.feature-card :$item :$columns :$is_content_center :$is_animated
                :$is_color_icon :$is_card_filled :$is_section_filled_inverted :$is_border :$is_light_fx />
            @endif
            @endforeach
        </div>
    </div>
</x-core.layout> --}}

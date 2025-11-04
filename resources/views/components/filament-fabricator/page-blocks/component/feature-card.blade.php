@props([
'item' => [],
'columns' => 3,
'is_content_center' => false,
'is_animated' => false,
'is_color_icon' => false,
'is_card_filled' => false,
'is_section_filled_inverted' => false,
'is_border' => false,
'is_light_fx' => false
])

@if ($item['link'] ?? false)
<a class="block w-full h-full group" target="{{ $item['is_new_window'] ? '_blank' : '_self' }}"
    href="{{ $item['link'] ?? '#' }}">
    @else
    <div class="block w-full h-full group">
        @endif
        <div @class([ 'flex flex-col justify-between w-full h-full p-4 rounded-lg overflow-hidden bg-contain bg-top bg-no-repeat relative'
            , $item['link'] ? 'cursor-pointer transform transition-all duration-700 ease-in-out hover:scale-[1.02]' : ''
            , 'min-h-24'=> $columns != 1,
            'min-h-10' => $columns == 1,
            'border-[1.5px] border-secondary-900/[0.04] dark:border-secondary-100/[0.08]
            group-hover:border-secondary-900/[0.08] dark:group-hover:border-secondary-100/[0.16] transition-colors
            duration-700' => $is_border && !$is_section_filled_inverted,
            'border-[1.5px] border-secondary-100/[0.08] dark:border-secondary-900/[0.08]
            group-hover:border-secondary-100/[0.16] dark:group-hover:border-secondary-900/[0.16] transition-colors
            duration-700' => $is_border && $is_section_filled_inverted,
            ])>
            <div @class([ 'absolute inset-0 transition-all duration-700 ease-in-out'
                , 'bg-gradient-to-tr from-secondary-900/[0.01] via-secondary-900/[0.02] to-secondary-900/[0.04] group-hover:from-secondary-900/[0.02] group-hover:via-secondary-900/[0.04] group-hover:to-secondary-900/[0.08] dark:from-secondary-100/[0.02] dark:via-secondary-100/[0.04] dark:to-secondary-100/[0.08] dark:group-hover:from-secondary-100/[0.04] dark:group-hover:via-secondary-100/[0.08] dark:group-hover:to-secondary-100/[0.16]'=>
                $is_card_filled && !$is_section_filled_inverted,
                'bg-gradient-to-tr from-secondary-100/[0.01] via-secondary-100/[0.02] to-secondary-100/[0.04]
                group-hover:from-secondary-100/[0.02] group-hover:via-secondary-100/[0.04]
                group-hover:to-secondary-100/[0.08] dark:from-secondary-900/[0.02] dark:via-secondary-900/[0.04]
                dark:to-secondary-900/[0.08] dark:group-hover:from-secondary-900/[0.04]
                dark:group-hover:via-secondary-900/[0.08] dark:group-hover:to-secondary-900/[0.16]' => $is_card_filled
                && $is_section_filled_inverted,
                ])></div>

            <div @class([ 'relative z-10' , $item['link']
                ? 'transition-transform duration-700 ease-in-out group-hover:translate-y-[-2px]' : '' ])>
                @if ($is_light_fx)
                <div class="-mt-4 h-4 animate-pulse bg-contain bg-top bg-no-repeat"
                    style="background-image: url({{ asset('img/core/core-ui-elements/beams/blur-beam.png') }})">
                </div>
                @endif

                <div @class(['flex mb-2', 'justify-center'=> $is_content_center, 'justify-start' =>
                    !$is_content_center])>
                    <ion-icon @class([ 'h-7 w-7 rounded-full p-1 transition-all duration-700' , 'animate-pulse'=>
                        $is_animated,
                        'text-primary-500 dark:text-primary-600' => $is_color_icon,
                        'group-hover:scale-110' => $is_color_icon && $item['link']
                        ]) name="{{ $item['icon'] }}" />
                </div>

                <div class="flex flex-col flex-grow">
                    <h4 @class([ 'my-1 text-sm font-medium' , $item['link']
                        ? 'transition-colors duration-700 group-hover:text-primary-500 dark:group-hover:text-primary-400'
                        : '' ])>{!! $item['title'] !!}</h4>
                    <p @class([ 'text-xs opacity-60 leading-relaxed' , $item['link']
                        ? 'transition-opacity duration-700 group-hover:opacity-80' : '' , 'py-2'=> $columns != 1,
                        'pb-2' => $columns == 1
                        ])>{!! $item['description'] !!}</p>
                </div>
            </div>
        </div>
        @if ($item['link'] ?? false)
</a>
@else
</div>
@endif

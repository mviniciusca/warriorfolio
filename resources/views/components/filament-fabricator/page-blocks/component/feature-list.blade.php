@aware(['page'])
@props(['features'=> null, 'is_active' => null, 'is_center' => null, 'link' => null, 'is_new_window' => null,
'is_filled' => null, 'is_animated' => null, 'is_border' => null])

@if($is_active)
<x-core.layout>
    <section>
        <div class="mx-auto pb-8">
            <div class="{{ $is_center ? 'text-center' : 'text-left' }} grid md:grid-cols-3 lg:grid-cols-3 gap-5">
                @foreach ($features as $key => $item)
                @if($link)
                <a target="{{ $is_new_window ? '_blank' : '_self' }}" href="{{ $link }}">
                    @endif
                    <div
                        class="icon-card p-4 rounded-lg min-h-60 opacity-90 hover:opacity-100 transition-all duration-50 
                        {{ $is_animated ? 'hover:-mt-5 hover:z-10' : '' }}
                        {{ $is_filled ? ' dark:bg-secondary-950/50 hover:dark:bg-secondary-950 bg-secondary-50/50 hover:bg-secondary-100' : '' }} 
                        {{ $is_border ? 'border hover:border-secondary-400 dark:hover:border-secondary-700 dark:border-secondary-800 border-secondary-200' : '' }}">
                        <div class="mx-auto mb-2 flex 
                        {{ $is_center ? 'items-center justify-center' : 'items-start justify-normal' }}
                       ">
                            <ion-icon class="h-10 w-10 lg:h-11 lg:w-11" name="{{ $item['icon'] }}"></ion-icon>
                        </div>
                        <h3 class="mb-2 text-base leading-tight">{!! $item['title'] !!}</h3>
                        <p class="text-sm opacity-80">
                            {!! $item['description'] !!}
                        </p>
                    </div>
                    @if($link)
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </section>
</x-core.layout>
@endif
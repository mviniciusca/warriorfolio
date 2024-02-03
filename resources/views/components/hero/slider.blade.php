@props(['sliders' => null])

@if($sliders != null)

@if($sliders->is_active)
<div class="swiper mx-auto {{ $sliders->slider_size }}">

    @if($sliders->show_title)
    <h1 class="slider-title text-md pb-2 pt-8 text-center font-semibold">
        {{ $sliders->title }}
    </h1>
    @endif


    <div class="swiper-wrapper">

        @foreach($sliders->content as $slider)
        <div class="swiper-slide {{ $sliders->show_title ? 'my-8' : 'my-16' }}
             flex content-center items-center justify-center">

            @if($slider['image_url'])
            <a href="{{ $slider['image_url'] }}">
                @endif

                <img class="
                {{ $sliders->image_size == 'small' ? 'h-10' :($sliders->image_size == 'medium' ? 'h-14' : ($sliders->image_size == 'large' ? 'h-16' : ($sliders->image_size == 'extra-large' ? 'h-20' : 'h-12' )))}}
                {{ $sliders->is_invert ? 'filter  dark:invert dark:opacity-70' : 'filter-none' }}"
                    src="{{ asset('storage/' . $slider['image_path'] ) }}" alt="{{ $slider['image_alt'] }}" />

                @if($slider['image_url'])
            </a>
            @endif

        </div>
        @endforeach

    </div>
</div>
@endif
@endif

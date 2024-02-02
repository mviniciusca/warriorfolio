@aware(['page'])
@props(['slides'=> null,'is_active' => false,'title' => null])

@if($is_active)
<div class="mx-auto max-w-7xl py-4">
    <div class="mx-auto">
        @if($title)
        <h2 class="mx-auto py-1 text-center font-bold">
            {{ $title }}
        </h2>
        @endif
        <div class="swiper">
            <div class="swiper-wrapper flex w-full content-center items-center">
                @foreach ($slides as $item )
                <div class="swiper-slide flex content-center items-center justify-around text-center">
                    <img class="h-10 justify-center opacity-60 filter dark:invert"
                        src="{{ asset('storage/' . $item['image'])}}" alt="slider-image">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

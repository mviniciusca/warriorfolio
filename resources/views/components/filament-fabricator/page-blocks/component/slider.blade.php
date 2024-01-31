@aware(['page'])
@props(['slides'=> null, 'is_active'])

@if($is_active)
<div class="px-2 py-2 md:py-2">
    <div class="mx-auto max-w-7xl">
        <h2 id="slider-title my-2" class="mx-auto text-center font-bold">Believe in Us</h2>
        <div class="swiper mr-auto mt-5 max-w-5xl">
            <div class="swiper-wrapper flex w-full content-center items-center">
                @foreach ($slides as $item )
                <div class="swiper-slide flex content-center items-center justify-around text-center">
                    <img class="h-11 justify-center opacity-80 filter dark:invert"
                        src="{{ asset('storage/' . $item['image'])}}" alt="slider-image">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

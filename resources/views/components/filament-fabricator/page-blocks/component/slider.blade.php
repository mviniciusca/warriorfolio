@aware(['page'])
@props(['slides'=> null])
<div class="px-2 py-2 md:py-2">
    <div class="mx-auto max-w-7xl">
        @if(count($slides) > 0)
        <div class="swiper mr-auto mt-12 max-w-7xl">
            <h1 class="text-md mb-8 text-center font-semibold">

            </h1>
            <div class="swiper-wrapper flex w-full">
                @foreach ($slides as $item )
                <div class="swiper-slide flex content-center items-center justify-around text-center">
                    <img class="h-11 justify-center filter dark:invert" src="{{ asset('storage/' . $item['image'])}}"
                        alt="slider-image">
                </div>
                @endforeach
            </div>
            <script>
                var swiper = new Swiper(".swiper", {
                          slidesPerView: 5,
                          loop: true,
                          centerInsufficientSlides: true,
                          centeredSlidesBounds: true,
                          speed:500,
                          autoplay:true,
                          centeredSlides: true,
                                });
            </script>
        </div>
        @endif
    </div>
</div>

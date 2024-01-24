@if(count($slides) > 0)
<div class="swiper max-w-4xl mt-12 mr-auto">
    <h1 class="text-xl text-center mb-16">
        @foreach ($slides as $slide )
        @if($slide['show_title']) {{ $slide->title }} @endif
        @endforeach
    </h1>
    <div class="swiper-wrapper flex w-full">
        @foreach ($slides as $slide)
        @if(is_array($slide['content']))
        @foreach ($slide['content'] as $content)
        <div class="swiper-slide flex text-center items-center content-center justify-around" class="h-16 w-16">
            <img class="h-10 justify-center" src="{{ asset('storage/' . $content['image_path'] ) }}"
                alt="{{ $content['image_alt'] }}" title="{{ $content['image_title'] }}">
        </div>
        @endforeach
        @endif
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

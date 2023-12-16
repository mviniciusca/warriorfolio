@if(count($slides) > 0)
<div class="swiper max-w-4xl">
    <h1 class="text-2xl text-center mb-12 lowercase">
        @foreach ($slides as $slide )
        {{ $slide->title }}
        @endforeach
    </h1>
    <div class="swiper-wrapper w-full">
        @foreach ($slides as $slide)
        @if(is_array($slide['content']))
        @foreach ($slide['content'] as $content)
        <div class="swiper-slide" class="h-16 w-16">
            <img class="h-12" src="{{ asset('storage/' . $content['image_path'] ) }}" alt="{{ $content['image_alt'] }}"
                title="{{ $content['image_title'] }}">
        </div>
        @endforeach
        @endif
        @endforeach
    </div>
    <script>
        var swiper = new Swiper(".swiper", {
                  slidesPerView: 5,
                  loop: true,
                  autoplay:true,
                  centeredSlides: true,
                  spaceBetween: 70,
                });
    </script>
</div>
@endif

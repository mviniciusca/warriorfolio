@if(count($slides) > 0)
<div class="swiper mr-auto mt-12 max-w-4xl">
    <h1 class="text-md mb-8 text-center font-semibold">
        @foreach ($slides as $slide )
        @if($slide['show_title']) {{ $slide->title }} @endif
        @endforeach
    </h1>
    <div class="swiper-wrapper flex w-full">
        @foreach ($slides as $slide)
        @if(is_array($slide['content']))
        @foreach ($slide['content'] as $content)
        <div class="swiper-slide flex content-center items-center justify-around text-center" class="h-16 w-16">
            <img class="h-10 justify-center" src="{{ asset('storage/' . $content['image_path'] ) }}"
                alt="{{ $content['image_alt'] }}" title="{{ $content['image_title'] }}">
        </div>
        @endforeach
        @endif
        @endforeach
    </div>

</div>
@endif

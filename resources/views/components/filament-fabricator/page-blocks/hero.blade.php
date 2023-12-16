<div class="bg-hero animate__animated animate__fadeIn animate__delay-1s absolute w-full h-full -z-10 bg-cover bg-center"
    style="background-image: url('{{ asset('storage/' .  $hero['background_image'] ) }}')">
</div>
@aware(['page'])
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <section>
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-48">
                    <h1
                        class="title-font dark:text-white animate__animated animate__fadeInUp animate__delay-3s text-9xl font-bold tracking-tighter leading-tighter mb-8">
                        {!! $info['hero_section_title'] !!}
                    </h1>
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-4s mb-8 text-3xl dark:text-white shadow-current tracking-tight leading-tight">
                        {!!html_entity_decode($info['hero_section_subtitle_text'])!!}
                    </p>
                    <div class="flex justify-center animate__animated animate__fadeInUp animate__delay-5s">
                        <button
                            class="inline-flex text-secondary-50 dark:bg-primary-500 border-0 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider main container -->
        <div class="swiper w-full">
            <!-- Additional required wrapper -->

            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($slides as $slide)
                @if(is_array($slide['content']))
                @foreach ($slide['content'] as $content)
                <div class="swiper-slide" class="h-16 w-16">
                    <img class="h-12" src="{{ asset('storage/' . $content['image_path'] ) }}"
                        alt="{{ $content['image_alt'] }}" title="{{ $content['image_title'] }}">
                </div>
                @endforeach
                @endif
                @endforeach
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper(".swiper", {
          slidesPerView: 5,
          loop: true,
          autoplay:true,
          centeredSlides: true,
          spaceBetween: 20,
          pagination: false,
          navigation: false,
        });
        var appendNumber = 4;
        var prependNumber = 1;
        document
          .querySelector(".prepend-2-slides")
          .addEventListener("click", function (e) {
            e.preventDefault();
            swiper.prependSlide([
              '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
              '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
            ]);
          });
        document
          .querySelector(".prepend-slide")
          .addEventListener("click", function (e) {
            e.preventDefault();
            swiper.prependSlide(
              '<div class="swiper-slide">Slide ' + --prependNumber + "</div>"
            );
          });
        document
          .querySelector(".append-slide")
          .addEventListener("click", function (e) {
            e.preventDefault();
            swiper.appendSlide(
              '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>"
            );
          });
        document
          .querySelector(".append-2-slides")
          .addEventListener("click", function (e) {
            e.preventDefault();
            swiper.appendSlide([
              '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
              '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
            ]);
          });
    </script>
</div>

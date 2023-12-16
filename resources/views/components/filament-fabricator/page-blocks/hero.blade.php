<div class="bg-hero absolute w-full h-full -z-10 bg-cover bg-center"
    style="background-image: url('{{ asset('storage/' .  $hero['background_image'] ) }}')">
</div>
@aware(['page'])
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <section>
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-48">
                    <h1
                        class="title-font animate__animated animate__fadeInUp animate__delay-1s text-8xl mb-4 font-bold dark:text-white tracking-tighter leading-tighter">
                        {!! $info['hero_section_title'] !!}
                    </h1>
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-2s mb-8 text-3xl dark:text-white shadow-current tracking-tighter leading-tight">
                        {!! $info['hero_section_subtitle_text'] !!}
                    </p>
                    <div class="flex justify-center animate__animated animate__fadeInUp animate__delay-3s">
                        <button
                            class="inline-flex text-secondary-50 dark:bg-primary-500 border-0 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Slider main container -->

        <div class="swiper w-full h-48">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">Slidesas 1</div>
                <div class="swiper-slide">Slideasasa 2</div>
                <div class="swiper-slide">Slideasas 3</div>
                <div class="swiper-slide">Slideasas 3</div>
                <div class="swiper-slide">Slideasas 3</div>
                <div class="swiper-slide">Slideasas 3</div>
                <div class="swiper-slide">Slideasas 3</div>
                ...
            </div>


            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <script>
        var swiper = new Swiper(".swiper", {
          slidesPerView: 5,
          autoplay:true,
          centeredSlides: false,
          spaceBetween: 30,
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

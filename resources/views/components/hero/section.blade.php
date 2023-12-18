{{-- Hero Background --}}
<div class="-mt-36 bg-hero animate__animated animate__fadeIn animate__delay-1s
absolute w-full h-full -z-10 bg-cover bg-no-repeat bg-center"
    style="background-image: url('{{ asset('storage/' .  $background->background_image ) }}')">
</div>
{{-- Hero Section --}}
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <section>
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-8">
                    <h1
                        class="hero-section-title dark:text-white animate__animated animate__fadeInUp animate__delay-1s">
                        {!! $hero->hero_section_title !!}
                    </h1>
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-1s mb-8 text-3xl dark:text-white shadow-current tracking-tight leading-tight">
                        {!! $hero->hero_section_subtitle_text !!}
                    </p>
                    <div class="flex justify-center animate__animated animate__fadeInUp animate__delay-2s">
                        <button
                            class="inline-flex items-center align-middle text-secondary-50 dark:bg-primary-500 border-0 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </button>
                    </div>
                </div>
                <div id="app-image-showcase">
                    <img class="rounded-t-xl mt-8 shadow-md animate__animated animate__fadeInUp animate__delay-2s"
                        src="{{ asset('img/core/app.png') }}" alt="app image">
                </div>
            </div>
            {{-- Hero Section Slider --}}
            <x-hero.slider />
    </div>
    </section>
</div>

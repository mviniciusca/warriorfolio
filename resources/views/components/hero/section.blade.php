{{-- Hero Background --}}
<div class="-mt-36 m-auto left-0 right-0 bg-hero animate__animated animate__fadeIn animate__delay-1s
 w-full h-[900px] absolute -z-20 bg-cover bg-no-repeat bg-center"
    style="background-image: url('{{ $background->background_image ? asset('storage/' .  $background->background_image) : asset('img/core/footer-bg.png') }}')">

</div>
<div class="-mt-36 bg-hero
 w-full h-[900px] absolute -z-10 m-auto left-0 right-0 bg-cover bg-no-repeat bg-center"
    style="background-image: url('{{ asset('img/core/smoother.png') }}')">
</div>
{{-- Hero Section --}}
<section>
    <div class="px-4 py-4 md:py-8">
        <div class="max-w-7xl mx-auto">
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-8">
                    <h1
                        class="hero-section-title dark:text-white animate__animated animate__fadeInUp animate__delay-1s">
                        {!! $hero->hero_section_title !!}
                    </h1>
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-1s mb-8 text-2xl dark:text-white shadow-current tracking-tight leading-tight">
                        {!! $hero->hero_section_subtitle_text !!}
                    </p>
                    <div class="flex gap-4 justify-center animate__animated animate__fadeInUp animate__delay-2s">
                        <button
                            class="inline-flex items-center align-middle text-secondary-50 dark:bg-primary-500 border-0 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                            let's start
                        </button>
                        <button
                            class="inline-flex items-center align-middle text-secondary-50 dark:bg-transparent border border-secondary-600 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                            get in touch
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
    </div>
</section>

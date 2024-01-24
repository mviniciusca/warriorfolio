{{-- Application Background --}}
@if($background->background_image_visibility)
<div class="-mt-36 m-auto left-0 right-0 bg-hero
 animate__animated animate__fadeIn animate__delay-1s
 w-full h-[900px] absolute -z-20
 {{ $background->background_image_size }}
 {{ $background->background_image_position }}
 {{ $background->background_image_repeat }}"
    style="background-image: url('{{ $background->background_image ? asset('storage/' .  $background->background_image) : asset('img/core/bg-default.jpg') }}')">
</div>
<div class="-mt-36 bg-hero
 w-full h-[900px] absolute -z-10 m-auto left-0 right-0 bg-cover bg-no-repeat bg-center" @if(session('theme')=='dark' )
    style="background-image: url('{{ asset('img/core/smoother.png') }}')">
    @else
    style="background-image: url('{{ asset('img/core/smoother-light.png') }}')">
    @endif
</div>
@endif
{{-- Application Background --}}
{{-- Hero Section --}}
<section>
    <div class="px-4 py-4 md:py-8">
        <div class="max-w-7xl mx-auto">
            <div class="container mx-auto flex px-5 py-12 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-8">
                    @if($hero->hero_section_title)
                    <h1 class="hero-section-title animate__animated animate__fadeInUp animate__delay-2s">
                        {!! $hero->hero_section_title !!}
                    </h1>
                    @endif
                    @if($hero->hero_section_subtitle_text)
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-2s mb-8 text-2xl shadow-current tracking-tight leading-tight">
                        {!! $hero->hero_section_subtitle_text !!}
                    </p>
                    @endif
                    {{-- Hero Section: Buttons --}}
                    <div class="flex gap-4 justify-center animate__animated animate__fadeInUp animate__delay-2s">
                        {{-- Hero Section Button --}}
                        @if($hero->hero_section_button_text == true && $hero->hero_section_button_url == true)
                        <a target="{{ $hero->hero_button_link_target }}" href="{{ $hero->hero_section_button_url }}">
                            <button
                                class="inline-flex items-center align-middle text-secondary-50 dark:bg-primary-500 border-0 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                                {{ $hero->hero_section_button_text }}
                            </button>
                        </a>
                        @endif
                        {{-- Hero Section Alternative Button --}}
                        @if($hero->hero_alt_button_text && $hero->hero_alt_button_url)
                        <a target="{{ $hero->hero_alt_button_link_target }}" href="{{ $hero->hero_alt_button_url }}">
                            <button
                                class="inline-flex items-center align-middle text-secondary-50 dark:bg-transparent border border-secondary-600 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                                {{ $hero->hero_alt_button_text }}
                            </button>
                        </a>
                        @endif
                    </div>
                    {{-- End Hero Section: Buttons --}}
                </div>
                {{-- Hero Section: Image --}}
                @if($hero->hero_section_image)
                <div class="mt-12 rounded-xl" id=" hero-featured-image">
                    <img class="animate__animated animate__fadeInUp animate__delay-2s rounded-t-2xl"
                        src="{{ asset('storage/' . $hero->hero_section_image)}}" alt="hero-section-image" />
                    <div class="absolute w-full animate__animated animate__fadeIn animate__delay-2s -left-1 -mt-60 h-[250px] z-10 bg-repeat-x bg-contain "
                        style="background-image: url('{{ asset('img/core/hero-smooter.png') }}')"></div>
                </div>
                @endif
                {{-- End Hero Section: Image --}}
            </div>
            {{-- Hero Section Slider --}}
            <div class="-mt-8 z-10">
                <x-hero.slider />
            </div>
        </div>
    </div>
</section>
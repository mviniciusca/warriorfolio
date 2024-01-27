@if($module->hero)
{{-- Background Module --}}
<x-hero.background :background='$background' />
{{-- Hero Section --}}
<section class="py-12">
    <div class="px-4 py-4 md:py-12">
        <div class="max-w-7xl mx-auto">
            <div class="container mx-auto flex px-5 py-8 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-2">
                    @if($info->hero_section_title)
                    <h1 class="hero-section-title animate__animated animate__fadeInUp animate__delay-2s">
                        {!! $info->hero_section_title !!}
                    </h1>
                    @endif
                    @if($info->hero_section_subtitle_text)
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-2s mb-8 text-2xl shadow-current tracking-tight leading-tight">
                        {!! $info->hero_section_subtitle_text !!}
                    </p>
                    @endif
                    {{-- Hero Section: Buttons --}}
                    <div class="flex z-10 gap-4 justify-center animate__animated animate__fadeInUp animate__delay-2s">
                        {{-- Hero Section Button --}}
                        @if($info->hero_section_button_text == true && $info->hero_section_button_url == true)
                        <a target="{{ $info->hero_button_link_target }}" href="{{ $info->hero_section_button_url }}">
                            <button
                                class="inline-flex items-center align-middle text-secondary-50 bg-primary-500 py-2 px-6 border border-secondary-600 border-opacity-60 focus:outline-none rounded-md text-lg hover:opacity-80 transition-all duration-100 active:opacity-25">
                                {{ $info->hero_section_button_text }}
                            </button>
                        </a>
                        @endif
                        {{-- Hero Section Alternative Button --}}
                        @if($info->hero_alt_button_text && $info->hero_alt_button_url)
                        <a target="{{ $info->hero_alt_button_link_target }}" href="{{ $info->hero_alt_button_url }}">
                            <button
                                class="inline-flex items-center align-middle text-secondary-700 dark:text-secondary-50 border bg-transparent border-secondary-600 border-opacity-60 py-2 px-6 focus:outline-none dark: hover:bg-primary-500 hover:text-secondary-50 hover:opacity-90 transition-all duration-100 rounded-md text-lg active:opacity-25">
                                {{ $info->hero_alt_button_text }}
                            </button>
                        </a>
                        @endif
                    </div>
                    {{-- End Hero Section: Buttons --}}
                </div>
                {{-- Hero Section: Image --}}
                @if($info->hero_section_image)
                <div class="mt-12 rounded-xl" id=" hero-featured-image">
                    <img class="animate__animated animate__fadeInUp animate__delay-2s rounded-t-2xl"
                        src="{{ asset('storage/' . $info->hero_section_image)}}" alt="hero-section-image" />
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
@endif

{{--

Core Component: Hero Section / Theme / Default Theme
----------------------------------------------------------------
This is the Default Theme for Hero Section
-------------------------------------------------------------------
Data:
App\View\Components\Themes\Hero\Default-Theme.php

--}}

@props(['hero', 'icon' => null])

<section>
    <div class="mx-auto mt-4 grid items-center justify-center text-center">
        <x-hero.heading :$hero />
        {{-- Hero Section: Buttons --}}
        <div class="animate__animated animate__fadeInUp animate__delay-1s z-10 flex justify-center gap-4">
            {{-- Hero Section Button --}}
            @foreach ($hero->hero['buttons'] as $button)
                <x-hero.button-group :title="$button['button_title']" :style="$button['button_style']"
                    :target="$button['button_target']" :url="$button['button_url']" :icon="$button['icon']" />
            @endforeach
        </div>
    </div>
    </div>
    @if ($hero->hero['featured_image_is_active'] ?? false)
        <div class="animate__animated animate__fadeInUp animate__delay-1s hidden lg:col-span-5 lg:mt-0 lg:flex">
            {{-- Hero Section: Image --}}
            @if ($hero->hero['featured_image'] ?? false)
                <div class="mx-auto mt-8" id="hero-featured-image">
                    <img class="mx-auto rounded-2xl" src="{{ asset('storage/' . $hero->hero['featured_image']) }}"
                        alt="hero-section-featured-image" />
            @else
                <img src="{{ asset('img/core/bg/hero-default-bg.png') }}" alt="Default Hero Image"
                    class="h-auto w-full rounded-lg shadow-xl" />
            @endif
            </div>
    @endif
    </div>
    </div>
</section>

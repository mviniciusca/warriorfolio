@props(['hero'])

<section class="bg-background w-full py-12 md:py-12">
    <div class="mx-auto flex max-w-7xl flex-col items-center px-4 text-center md:px-6">
        <h1 class="mb-6 max-w-5xl text-4xl font-bold tracking-tighter md:text-5xl lg:text-5xl">
            {!! $hero->hero['section_title'] !!}
        </h1>

        <p class="text-muted-foreground mb-8 max-w-4xl text-xl">
            {!! $hero->hero['section_subtitle'] !!}
        </p>

        <div class="mb-12 flex flex-col gap-4 sm:flex-row">

            @foreach ($hero->hero['buttons'] as $button)

            <x-hero.button-group :title="$button['button_title']" :style="$button['button_style']"
                :target="$button['button_target']" :url="$button['button_url']" :icon="$button['icon']" />
            @endforeach

        </div>

        <div class="w-full">
            <img src="https://placehold.co/1200x600" alt="Hero Image" class="h-auto w-full rounded-lg shadow-xl" />
        </div>
    </div>
</section>

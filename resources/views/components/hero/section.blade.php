@if($module->hero)

{{-- Background Module --}}
<x-hero.background :hero='$hero' />
{{-- Hero Section --}}
<section class="py-4">
    <div>
        <div class="mx-auto max-w-7xl">
            <div class="container mx-auto flex flex-col items-center justify-center">
                <div class="max-w-7xl text-center">

                    @if($hero->hero['theme'] === 'default')
                    <x-themes.hero.default-theme :$hero />
                    @endif

                    {{-- Hero Section Slider --}}
                    <x-hero.slider :$sliders />

                </div>
            </div>
</section>
@endif
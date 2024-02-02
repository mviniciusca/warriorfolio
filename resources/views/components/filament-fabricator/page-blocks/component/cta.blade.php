@aware(['page'])
@props([
'title' => null,
'content' => null,
'button_text' => null,
'button_url' => null,
'button_icon' => null,
'image' => null
])

<section class="py-4">
    <div class="cta-one mx-auto max-w-screen-xl items-center gap-8 md:grid md:grid-cols-2 xl:gap-16">
        @if($image)
        <img src="{{ asset('storage/' . $image) }}" alt="image-cta">
        @endif

        <div class="mt-4 md:mt-0">

            @if($title)
            <h2 class="mb-4 text-4xl font-bold tracking-tighter">
                {!! $title !!}
            </h2>
            @endif

            @if($content)
            <p class="mb-6 font-light md:text-lg">{!! $content !!}</p>
            @endif

            @if($button_text && $button_url)
            <a href="{{ $button_url ?? '#'}}">
                <x-ui.button type='submit' class="mt-4 px-4 py-3" icon='chevron-forward-outline'>
                    {{ $button_text }}
                </x-ui.button>
            </a>
            @endif

        </div>
    </div>
</section>

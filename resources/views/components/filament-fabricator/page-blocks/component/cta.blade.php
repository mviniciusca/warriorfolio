@aware(['page'])
@props([
'title' => null,
'content' => null,
'button_text' => null,
'button_url' => null,
'button_icon' => null,
'image' => null
])
<x-core.layout>
    <section class="w-full">
        <div
            class="cta-one mx-auto max-w-screen-xl items-center gap-8 px-4 py-8 sm:py-16 md:grid md:grid-cols-2 lg:px-6 xl:gap-16">

            @if($image)
            <img src="{{ asset('storage/' . $image) }}" alt="image">
            @endif

            <div class="mt-4 md:mt-0">

                @if($title)
                <h2 class="mb-4 text-4xl font-extrabold tracking-tighter">
                    {!! $title !!}
                </h2>
                @endif

                @if($content)
                <p class="mb-6 font-light md:text-lg">{!! $content !!}</p>
                @endif

                @if($button_text && $button_url)
                <a href="{{ $button_url ?? '#'}}">
                    <x-ui.button type='submit' icon='chevron-forward-outline'>
                        {{ $button_text }}
                    </x-ui.button>
                </a>
                @endif

            </div>
        </div>
    </section>
</x-core.layout>

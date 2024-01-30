@aware(['page'])
@props([
'title' => null,
'content' => null,
'button_text' => null,
'button_url' => '#',
'button_icon' => null,
'image' => null
])
<x-core.layout>
    <section class="w-full">
        <div
            class="mx-auto max-w-screen-xl items-center gap-8 px-4 py-8 sm:py-16 md:grid md:grid-cols-2 lg:px-6 xl:gap-16">

            @if($image)
            <img src="{{ asset('storage/' . $image) }}" alt="image">
            @endif

            <div class="mt-4 md:mt-0">

                @if($title)
                <h2 class="mb-4 text-4xl font-extrabold tracking-tight">
                    {!! $title !!}
                </h2>
                @endif

                @if($content)
                <p class="mb-6 font-light md:text-lg">{!! $content !!}</p>
                @endif

                @if($button_text)
                <a href="{{ $button_url ?? '#'}}"
                    class="my-4 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    {{ $button_text }}
                    <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @endif

            </div>
        </div>
    </section>
</x-core.layout>

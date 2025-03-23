@aware(['page'])
@props([
    'author' => null,
    'testimonial' => null,
    'author_info' => null,
    'picture' => null,
    'is_active' => null,
    'is_bg_filled' => null,
    'is_filled_inverted' => null,
    'text_size' => null,
    'with_padding' => null ?? false,
])

@if ($is_active)
    <x-core.layout :$with_padding>
        <section class="
        {{ $is_bg_filled & !$is_filled_inverted ? 'section-filled' : ''}}
        {{ $is_filled_inverted ? 'bg-black text-white dark:text-black dark:bg-white' : ''}}
        rounded-xl">
            <div class="mx-auto max-w-screen-xl px-8 py-8 text-center lg:py-16">
                <figure class="mx-auto max-w-screen-xl">
                    <svg class="mx-auto mb-3 h-12" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                            fill="currentColor" />
                    </svg>
                    @if ($testimonial)
                        <blockquote>
                            <p class="font-serif {{ $text_size ?? 'text-lg md:text-xl lg:text-2xl' }} italic leading-tight tracking-tight">
                                " {!! $testimonial !!} "
                            </p>
                        </blockquote>
                    @endif
                    <figcaption class="mt-6 flex items-center justify-center gap-2 space-x-2">
                        @if ($picture)
                            <x-curator-glider :media="$picture" class="h-10 w-10 rounded-full object-cover" />
                        @endif
                        <div class="flex items-center gap-1">
                            @if ($author)
                                <div class="pr-3 font-medium">
                                    {{ $author }}
                                </div>
                            @endif
                            @if ($author_info)
                                <div class="rotate-90">
                                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.1" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </div>
                                <div class="pl-3 text-sm">
                                    {{ $author_info }}
                                </div>
                            @endif
                        </div>
                    </figcaption>
                </figure>
            </div>
        </section>
    </x-core.layout>
@endif

@aware(['page'])
@props(['is_active', 'heading' => null, 'content' => null, 'is_center' => false , 'text_size' => 'text-2xl'])

<div class="px-4 py-4 md:py-8">
    <div class="mx-auto max-w-7xl">
        <section>
            <div class="mx-auto max-w-screen-xl {{ $is_center ? 'text-center':'text-left' }}">
                <div>

                    <h2 class="mb-2 font-bold tracking-tight {{ $text_size }}">
                        {!! $heading!!}
                    </h2>

                    <p class="mb-4 font-light">
                        {!! $content !!}
                    </p>

                </div>
            </div>
        </section>
    </div>
</div>

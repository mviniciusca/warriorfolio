@props([
    'image' => null,
    'is_featured_image_active' => null,
    'heading' => null,
    'content' => null,
    'module_id' => null,
    'is_active' => null,
    'is_center' => null,
    'with_padding' => null,
])

@if ($is_active)
    <section class="px-8">
        <div
            class="{{ $is_center && (!$image || !$is_featured_image_active) ? 'text-center' : 'text-left' }} {{ $image && $is_featured_image_active ? 'md:grid-cols-5' : 'md:grid-cols-1' }} mx-auto max-w-screen-xl items-start justify-between gap-8 py-8 sm:py-16 md:grid xl:gap-16">
            <div class="md:col-span-3">
                <h2
                    class="dg header-title {{ $is_center && (!$image || !$is_featured_image_active) ? 'text-center' : 'text-left' }}">
                    {!! $heading !!}</h2>
                <p
                    class="{{ $is_center && (!$image || !$is_featured_image_active) ? 'text-center' : 'text-left' }} mb-6 mt-4 text-base font-light md:text-lg">
                    {!! $content !!}</p>
            </div>
            @if ($is_featured_image_active && $image)
                <div
                    class="{{ !$image || ($image || !$is_featured_image_active) ? 'hidden' : '' }} mx-auto sm:hidden md:col-span-2 md:block">
                    <img class="max-h-64 w-full" src="{{ asset('storage/' . $image) }}" alt="dashboard image">
                </div>
            @endif
        </div>
    </section>
@endif

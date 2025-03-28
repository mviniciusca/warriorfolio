@props([
    'heading' => null,
    'content' => null,
    'module_id' => null,
    'is_active' => null,
    'is_center' => null,
    'with_padding' => null,
    'featured_image' => null,
    'is_featured_image_active' => null,
    'is_heading_full_width' => false,
    'is_heading_middle' => null,
    'is_filled' => null,
])

@if ($is_active)
    <section class="{{ $is_filled ? 'section-filled' : '' }} mt-12 px-8" id="{{ $module_id }}">
        <div class="{{ $is_center && (!$featured_image || !$is_featured_image_active) ? 'text-center' : 'text-left' }} {{ $is_featured_image_active ? 'md:grid-cols-6' : 'md:grid-cols-1' }} {{ $is_heading_full_width ? 'md:grid-cols-1' : 'md:grid-cols-6' }} {{ $is_heading_middle && $is_featured_image_active ? 'items-center' : 'items-start' }} mx-auto max-w-screen-xl justify-between gap-8 py-8 sm:py-4 md:grid xl:gap-16"
            id="card-{{ rand(1, 2) }}">
            <div class="md:col-span-4">
                <h2
                    class="dg header-title {{ $is_center && (!$featured_image || !$is_featured_image_active) ? 'text-center' : 'text-left' }}">
                    {!! $heading !!}
                </h2>
                <div class="{{ $is_center && (!$featured_image || !$is_featured_image_active) ? 'text-center' : 'text-left' }} my-8 mb-6 text-sm leading-snug"
                    id="heading-description-content">
                    {!! $content !!}
                </div>
            </div>
            @if ($is_featured_image_active)
                <div class="mx-auto hidden md:col-span-2 md:block">
                    <img alt="dashboard image" class="w-full rounded-lg"
                        src="{{ $featured_image ? asset('storage/' . $featured_image) : asset('img/core/rocket-app.png') }}">
                </div>
            @endif
        </div>
    </section>
@endif

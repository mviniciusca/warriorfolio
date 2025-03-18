@props([
'image' => null,
'heading' => null,
'content' => null,
'module_id' => null,
'is_active' => null,
'is_center' => null,
'with_padding' => null,
'is_featured_image_active' => null,
'is_filled' => null,
])

@if ($is_active)
<section id="{{ $module_id }}" class="{{ $is_filled ? 'section-filled' : '' }} px-8">
    <div id="card-{{ rand(1, 2) }}"
        class="{{ $is_center && (!$image || !$is_featured_image_active) ? 'text-center' : 'text-left' }} {{ $is_featured_image_active ? 'md:grid-cols-6' : 'md:grid-cols-1' }} mx-auto max-w-screen-xl items-start justify-between gap-8 py-8 sm:py-16 md:grid xl:gap-16">
        <div class="md:col-span-4">
            <h2
                class="dg header-title {{ $is_center && (!$image || !$is_featured_image_active) ? 'text-center' : 'text-left' }}">
                {!! $heading !!}
            </h2>
            <div
                class="{{ $is_center && (!$image || !$is_featured_image_active) ? 'text-center' : 'text-left' }} mb-6 my-8 text-sm leading-snug">
                {!! $content !!}
            </div>
        </div>
        @if ($is_featured_image_active)
        <div class="mx-auto hidden md:col-span-2 md:block">
            <img class="w-full rounded-lg"
                src="{{ $image ? asset('storage/' . $image) : asset('img/core/rocket-app.png') }}"
                alt="dashboard image">
        </div>
        @endif
    </div>
</section>
@endif

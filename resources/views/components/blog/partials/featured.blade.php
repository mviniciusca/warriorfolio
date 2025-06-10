@props(['featuredPost' => null])


@if($featuredPost)
<article class="flex flex-col md:flex-row gap-4 md:gap-6">
    @if($featuredPost->post->img_cover)
    <div class="flex-shrink-0 w-full md:w-64 lg:w-80">
        <img src="{{ asset('storage/' . $featuredPost->post->img_cover) }}" alt="{{ $featuredPost->title }}"
            class="aspect-[4/3] md:aspect-[3/2] rounded-lg" :animated="true" rounded="rounded-lg" />
    </div>
    @else
    <div class="flex-shrink-0 w-full md:w-64 lg:w-80">
        <x-ui.placeholder.image aspectRatio="aspect-[4/3] md:aspect-[3/2]" :animated="false" rounded="rounded-lg" />
    </div>
    @endif
    <div class="flex-1 space-y-3">
        <h2 class="text-lg font-semibold">
            {{ $featuredPost->title}}
        </h2>
        <p class="text-sm opacity-70 leading-relaxed">
            {{ Str::limit(strip_tags($featuredPost->post->content), 200) }}
        </p>
    </div>
</article>
@endif

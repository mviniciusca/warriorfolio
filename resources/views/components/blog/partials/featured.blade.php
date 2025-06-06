@props(['featuredPost' => null])

@if($featuredPost)
<article class="space-y-6">
    @if($featuredPost->img_cover)
    <div class="aspect-[16/9] bg-muted rounded-lg overflow-hidden">
        <img src="{{ asset('storage/' . $featuredPost->img_cover) }}" alt="{{ $featuredPost->title }}"
            class="w-full h-full object-cover" />
    </div>
    @else
    <x-ui.placeholder.image aspectRatio="aspect-[16/9]" :animated="false" rounded="rounded-lg" />
    @endif


    <div class="space-y-2">
        <h2 class="text-base font-bold">
            {{ $featuredPost->title}}
        </h2>

        <p class="text-sm">
            {{ Str::limit(strip_tags($featuredPost->post->content), 150) }}
        </p>
</article>
@endif

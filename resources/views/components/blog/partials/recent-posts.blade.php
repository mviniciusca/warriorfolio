@props(['posts' => [], 'url' => config('app.url').'/', 'cols' => 1])

<x-ui.card-grid :cols="$cols" gap="8">
    @foreach ($posts as $post )
    <x-ui.card :is_border="false" :no_padding="true">
        <a class="hover:opacity-60 duration-200" href="{{ $url . $post->slug }}">

            @if($cols == 1)
            <div class="flex gap-4">
                @if($post->post->img_cover)
                <div class="flex-shrink-0 w-32 overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/' . $post->post->img_cover) }}" alt="{{ $post->title }}"
                        class="aspect-[4/3] md:aspect-[3/2] rounded-lg" :animated="true" rounded="rounded-lg" />
                </div>
                @endif
                <div class="flex-1 space-y-1">
                    <h3 class="text-base font-medium">
                        {{ Str::limit(strip_tags($post->title), 100) }}
                    </h3>
                    <p class="text-sm opacity-60">
                        {{ Str::limit(strip_tags($post->post->content), 120) }}
                    </p>
                </div>
            </div>
            @else
            <div class="space-y-4">
                <div class="flex-shrink-0">
                    <x-ui.placeholder.image class="aspect-[16/9] rounded-lg" :animated="true" />
                </div>

                <div class="space-y-3">
                    <h3 class="text-base min-h-8 font-semibold leading-tight">
                        {{ Str::limit(strip_tags($post->title), 150) }}
                    </h3>
                    <p class="text-sm opacity-60 leading-relaxed">
                        {{ Str::limit(strip_tags($post->post->content), 70) }}
                    </p>
                </div>
            </div>
            @endif
            <x-slot:footer>
                <div class="flex items-center justify-between pt-1">

                    <div class="flex items-center gap-3 text-xs opacity-70">
                        <span>{{ $post->user->name ?? 'Author' }}</span>
                        <span class="opacity-50">•</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <span class="opacity-50">•</span>
                        <x-ui.reading-time :content="$post->post->content" style="default" size="sm" />
                    </div>
        </a>
        <div class="flex-shrink-0 opa-100">
            <x-ui.share :url="$url . $post->slug" />
        </div>
        </div>
        </x-slot:footer>

    </x-ui.card>

    @endforeach
</x-ui.card-grid>

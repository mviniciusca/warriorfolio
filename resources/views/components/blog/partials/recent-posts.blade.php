@props(['posts' => [], 'url' => config('app.url').'/', 'cols' => 1])

<x-ui.card-grid :cols="$cols" gap="8">
    @foreach ($posts as $post )
    <x-ui.card :is_border="false" :no_padding="true" class="p-4">

        @if($cols == 1)
        <div class="flex gap-4">
            <div class="flex-shrink-0 w-32 overflow-hidden rounded-lg">
                <x-ui.placeholder.image class="aspect-[4/3] w-full h-full object-cover" :animated="true" />
            </div>

            <div class="flex-1 space-y-3">
                <h3 class="text-sm min-h-8 font-medium leading-tight">
                    {{ Str::limit(strip_tags($post->title), 100) }}
                </h3>
                <p class="text-sm leading-relaxed">
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
            <div class="flex items-center justify-between pt-4">

                <div class="flex items-center gap-3 text-xs">
                    <span>{{ $post->user->name ?? 'Author' }}</span>
                    <span class="opacity-50">•</span>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                    <span class="opacity-50">•</span>
                    <x-ui.reading-time :content="$post->post->content" style="default" size="sm" />
                </div>

                <div class="flex-shrink-0">
                    <x-blog.post.share :url="$url . $post->slug" />
                </div>

            </div>
        </x-slot:footer>
    </x-ui.card>
    @endforeach
</x-ui.card-grid>

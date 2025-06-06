@props(['posts' => [], 'url' => config('app.url').'/', 'cols' => '2'])

<x-ui.card-grid :cols="$cols" gap="6">
    @foreach ($posts as $post )
    <x-ui.card :is_border="true" class="group cursor-pointer hover:saturn-bg-accent transition-all duration-300">
        <x-slot:header>
            <div class="flex items-center justify-between">
                <h3
                    class="text-base font-semibold leading-tight group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                    {{ $post->title }}
                </h3>
                <span class="saturn-badge saturn-badge-primary flex-shrink-0">
                    {{ ucfirst($post->post->category->name) ?? 'Notes' }}
                </span>
            </div>
        </x-slot:header>

        <div class="space-y-4">
            <!-- Image Placeholder -->
            <div class="flex-shrink-0">
                <x-ui.placeholder.image class="aspect-[16/9] rounded-lg" :animated="false" />
            </div>

            <!-- Content -->
            <div class="space-y-3">
                <p class="text-sm saturn-text-accent leading-relaxed">
                    {{ Str::limit(strip_tags($post->post->content), 150) }}
                </p>
            </div>
        </div>

        <x-slot:footer>
            <div class="flex items-center justify-between pt-2">
                <div class="flex items-center gap-3 text-xs saturn-text-accent">
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

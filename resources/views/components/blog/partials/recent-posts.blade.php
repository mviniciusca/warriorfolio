@props(['posts' => [], 'url' => config('app.url').'/'])

@foreach ($posts as $post )
<article class="group cursor-pointer p-6 rounded-lg hover:saturn-bg-accent">
    <div class=" flex gap-6">
        <!-- Image Placeholder -->
        <div class="flex-shrink-0">
            <x-ui.placeholder.image width="w-32" height="h-24" :animated="false" />
        </div>
        <!-- Content -->
        <div class="flex-1 space-y-4">

            <h3 class="saturn-h4 font-semibold leading-tight">
                {{ $post->title }}
            </h3>
            <p class="text-sm">
                {{ $post->post->resume }}
            </p>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="text-sm flex items-center gap-3">
                        <span class="text-xs font-medium border saturn-border-accent saturn-badge">
                            {{ ucfirst($post->post->category->name) ?? 'Notes' }} </span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->user->name ?? 'Author' }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $post->created_at->diffForHumans() }}</span>
                        <span class="mx-2">•</span>
                        <span>
                            <x-ui.reading-time :content="$post->post->content" style="default" size="md" />
                        </span>
                    </div>
                </div>
                <x-blog.post.share :url="$url . $post->slug" />
            </div>
        </div>
    </div>
</article>
@endforeach

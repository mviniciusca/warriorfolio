{{-- No props required since we get posts from the component class --}}

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Notes</h2>
        <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Sharing thoughts, tutorials, and insights</p>
    </div>
    <a class="inline-flex items-center gap-2 rounded border border-secondary-300 bg-white px-4 py-1 text-xs font-medium text-secondary-900 transition-colors hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:bg-secondary-900"
        href="/blog">
        <x-ui.ionicon class="h-4 w-4" icon="newspaper-outline" />
        View All
    </a>
</div>

<div class="divide-y divide-secondary-200 dark:divide-secondary-800">
    @forelse ($posts as $post)
        <a class="group block border-b border-secondary-200 py-8 transition-opacity first:pt-0 last:pb-0 hover:opacity-80 dark:border-secondary-800"
            href="{{ $post->slug }}">
            <div class="mb-6 flex items-start space-x-4">
                <div
                    class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-md border border-secondary-300 dark:border-secondary-700">
                    <img alt="{{ $post->title }}" class="h-full w-full object-cover"
                        src="{{ $post->post->cover_image ?? asset('img/core/profile-picture.png') }}">
                </div>
                <div class="flex flex-col justify-between space-y-1">
                    <div class="flex items-center space-x-2 text-xs">
                        <span class="text-secondary-500 dark:text-secondary-400">
                            {{ $post->created_at->format('M d, Y') }}
                        </span>
                        @if ($post->post->category)
                            <span class="text-secondary-400 dark:text-secondary-600">•</span>
                            <span class="text-secondary-600 dark:text-secondary-400">
                                {{ $post->post->category->name }}
                            </span>
                        @endif
                    </div>

                    <h3
                        class="text-sm font-medium text-secondary-900 group-hover:text-secondary-600 dark:text-secondary-100 dark:group-hover:text-secondary-300">
                        {{ $post->title }}
                    </h3>

                    <p class="text-xs leading-snug text-secondary-600 dark:text-secondary-400">
                        {{ Str::limit($post->post->resume, 100) }}
                    </p>
                </div>
            </div>
        </a>
    @empty
        <div class="py-4 text-center text-xs text-secondary-600 dark:text-secondary-400">
            {{ __('No articles published yet.') }}
        </div>
    @endforelse
</div>

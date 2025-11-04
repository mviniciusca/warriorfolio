@aware(['page'])
@props(['page','title' => $page->title ?? null])

@if ($page->post->is_active)
<article class="saturn-container-narrow saturn-y-section">
    <!-- Breadcrumb Navigation -->
    <x-ui.breadcrumb :show-back-button="true"
        :back-url="config('app.url') . '/' . config('warriorfolio.app_blog_basepath', 'blog/')"
        back-text="Back to Blog" />

    <!-- Post Header -->
    <header id="post-header" class="mb-8 md:mb-12">
        <!-- Meta Information -->
        <div id="post-meta" class="saturn-flex-start gap-6 mb-6 text-sm">
            @if($page->post->category)
            <span class="saturn-badge saturn-bg-accent border saturn-border-accent">
                {{ $page->post->category->name }}
            </span>
            @endif
            <time>{{ $page->created_at->format('M d, Y') }}</time>
            <x-ui.reading-time :content="$page->post->content" style="default" size="md" />
        </div>

        <!-- Post Title -->
        <div id="post-title">
            <h3 class="saturn-h2 leading-none tracking-tight my-6">{{ $page->title }}</h3>
        </div>

        <!-- Post Description -->
        @if($page->post->resume)
        <div id="post-description" class="mb-8">
            <p class="saturn-text-large saturn-text-accent">{{ $page->post->resume }}</p>
        </div>
        @endif

        <!-- Author & Social Share -->
        <div id="post-author-share-social-network" class="saturn-flex-between border-y saturn-border py-8">
            <div class="saturn-flex-start gap-3">
                <div class="w-10 h-10 rounded-full saturn-bg-accent saturn-flex-center">
                    <span class="text-sm font-medium saturn-text">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                </div>
                <div>
                    <p class="text-sm font-medium saturn-text">{{ auth()->user()->name ?? 'Author' }}</p>
                    <p class="text-xs saturn-text-accent">{{ $page->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <div class="saturn-flex-end gap-2">
                <x-ui.share />
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <main id="post-content" class="mb-12 md:mb-16">
        <div class="prose prose-lg max-w-none dark:prose-invert saturn-text">
            {!! $page->post->content !!}
        </div>
    </main>

    <!-- Post Footer -->
    <footer id="post-category-and-share-social-network" class="border-t saturn-border pt-8">
        <div class="saturn-flex-between">
            <!-- Category Tags -->
            <div class="saturn-flex-start gap-2">
                @if($page->post->category)
                <span class="saturn-badge saturn-bg-accent border saturn-border-accent">
                    {{ $page->post->category->name }}
                </span>
                @endif
            </div>

            <!-- Social Share -->
            <div class="saturn-flex-end gap-3">
                <x-ui.share />
            </div>
        </div>
    </footer>
</article>
@endif

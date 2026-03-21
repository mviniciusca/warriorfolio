@php
    $maxDepth = 6;
    $pad = min($depth, $maxDepth);
@endphp
<li class="list-none" style="margin-left: {{ $pad * 1.25 }}rem" wire:key="comment-{{ $comment->id }}">
    <article class="flex gap-3 rounded-lg border saturn-border p-4">
        <img src="{{ $comment->avatar_url }}" alt="" width="40" height="40"
            class="h-10 w-10 shrink-0 rounded-full border saturn-border bg-white/5" loading="lazy" decoding="async" />
        <div class="min-w-0 flex-1">
            <header class="mb-1 flex flex-wrap items-baseline gap-x-2 gap-y-1">
                <span class="font-medium saturn-text">{{ $comment->author_name }}</span>
                @if ($comment->is_admin)
                    <span class="rounded border border-purple-500/40 bg-purple-500/10 px-1.5 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-purple-600 dark:text-purple-300">
                        admin
                    </span>
                @endif
                <time class="text-xs saturn-text-accent" datetime="{{ $comment->created_at->toIso8601String() }}">
                    {{ $comment->created_at->diffForHumans() }}
                </time>
            </header>
            <div class="whitespace-pre-wrap text-sm saturn-text">{!! nl2br(e($comment->body)) !!}</div>
            @if ($depth < $maxDepth)
                <button type="button" wire:click="startReply({{ $comment->id }})"
                    @click="$nextTick(() => document.getElementById('post-comment-form')?.scrollIntoView({ behavior: 'smooth', block: 'start' }))"
                    class="mt-3 text-xs font-medium text-purple-600 hover:text-purple-500 dark:text-purple-400 dark:hover:text-purple-300">
                    {{ __('Reply') }}
                </button>
            @endif
        </div>
    </article>
    @if ($comment->thread_children->isNotEmpty())
        <ul class="mt-4 space-y-4 border-l saturn-border pl-4" role="list">
            @foreach ($comment->thread_children as $child)
                @include('livewire.blog.partials.comment-node', ['comment' => $child, 'depth' => $depth + 1])
            @endforeach
        </ul>
    @endif
</li>

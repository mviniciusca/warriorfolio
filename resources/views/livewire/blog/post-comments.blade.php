<section class="saturn-y-section border-t saturn-border pt-12 md:pt-16" aria-labelledby="post-comments-heading">
    <h3 id="post-comments-heading" class="saturn-h3 mb-8">{{ __('Comments') }}</h3>

    @if (session('comment_submitted'))
        <div class="mb-8 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm saturn-text"
            role="status">
            @if ($isAdminUser)
                {{ __('Your reply was posted immediately as admin.') }}
            @else
                {{ __('Thanks! Your comment was sent and will appear after moderation.') }}
            @endif
        </div>
    @endif

    @if ($thread->isEmpty())
        <p class="mb-10 text-sm saturn-text-accent">{{ __('No comments yet. Be the first to join the discussion.') }}</p>
    @else
        <ul class="mb-12 space-y-6" role="list">
            @foreach ($thread as $comment)
                @include('livewire.blog.partials.comment-node', ['comment' => $comment, 'depth' => 0])
            @endforeach
        </ul>
    @endif

    <div id="post-comment-form" class="rounded-xl border saturn-border bg-black/[0.02] p-6 dark:bg-white/[0.02]">
        @if ($parent_id)
            <div
                class="mb-4 flex flex-wrap items-center justify-between gap-2 rounded-lg border border-amber-500/30 bg-amber-500/5 px-3 py-2 text-sm">
                <span class="saturn-text-accent">
                    {{ __('Replying to') }}:
                    <span class="font-medium saturn-text">{{ $replying_to_name ?? __('Comment') }}</span>
                </span>
                <button type="button" wire:click="cancelReply" class="text-sm underline saturn-text-accent hover:saturn-text">
                    {{ __('Cancel') }}
                </button>
            </div>
        @endif

        <form wire:submit="submit" class="space-y-4">
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="comment-author-name" class="mb-1 block text-sm font-medium saturn-text">{{ __('Name') }}</label>
                    <input id="comment-author-name" type="text" wire:model="author_name" autocomplete="name"
                        class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                        minlength="5" maxlength="80"
                        @if($isAdminUser) readonly @endif
                        required />
                    @error('author_name')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="comment-author-email" class="mb-1 block text-sm font-medium saturn-text">{{ __('Email') }}</label>
                    <input id="comment-author-email" type="email" wire:model="author_email" autocomplete="email"
                        class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                        @if($isAdminUser) readonly @endif
                        required />
                    @error('author_email')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="comment-body" class="mb-1 block text-sm font-medium saturn-text">{{ __('Comment') }}</label>
                <textarea id="comment-body" wire:model="body" rows="5"
                    class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                    maxlength="250"
                    required></textarea>
                <p class="mt-1 text-xs saturn-text-accent">{{ __('Min 5 words, max 250 characters.') }}</p>
                @error('body')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            @if (!$isAdminUser)
                <x-recaptcha />
            @endif
            <div class="saturn-flex-between flex-wrap gap-3">
                <p class="text-xs saturn-text-accent">
                    {{ __('Avatars are generated with') }}
                    <a href="https://www.dicebear.com/how-to-use/http-api/" class="underline hover:saturn-text" target="_blank"
                        rel="noopener noreferrer">DiceBear</a>.
                    @if ($isAdminUser)
                        {{ __('As admin, your replies are approved automatically.') }}
                    @else
                        {{ __('Comments are moderated before they appear.') }}
                    @endif
                </p>
                <x-ui.button type="submit" style="primary" class="px-5" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="submit">{{ __('Submit comment') }}</span>
                    <span wire:loading wire:target="submit">{{ __('Sending…') }}</span>
                </x-ui.button>
            </div>
        </form>
    </div>
</section>

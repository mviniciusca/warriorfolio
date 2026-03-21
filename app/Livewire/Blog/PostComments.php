<?php

namespace App\Livewire\Blog;

use App\Models\Page;
use App\Models\PageComment;
use App\Traits\WithRecaptcha;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostComments extends Component
{
    use WithRecaptcha;

    public Page $page;

    public string $author_name = '';

    public string $author_email = '';

    public string $body = '';

    public ?int $parent_id = null;

    public ?string $replying_to_name = null;

    public function mount(Page $page): void
    {
        $this->page = $page;
        $this->initializeWithRecaptcha();

        if (Auth::check()) {
            $this->author_name = (string) (Auth::user()?->name ?? '');
            $this->author_email = (string) (Auth::user()?->email ?? '');
        }
    }

    public function startReply(int $commentId): void
    {
        $this->parent_id = $commentId;
        $this->replying_to_name = PageComment::query()->whereKey($commentId)->value('author_name');
    }

    public function cancelReply(): void
    {
        $this->parent_id = null;
        $this->replying_to_name = null;
    }

    public function submit(): void
    {
        if (! $this->page->areCommentsEnabled()) {
            return;
        }

        if (! Auth::check() && ! $this->verifyRecaptcha()) {
            return;
        }

        $key = 'page-comment:'.request()->ip().':'.$this->page->id;
        if (RateLimiter::tooManyAttempts($key, 8)) {
            $this->addError('body', __('Too many submissions. Please wait a minute and try again.'));

            return;
        }

        $this->validate([
            'author_name' => [
                'required',
                'string',
                'min:5',
                'max:80',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    $words = $this->countWords((string) $value);

                    if (! Auth::check() && $words < 2) {
                        $fail(__('Please enter your first and last name.'));
                    }

                    if ($words > 6) {
                        $fail(__('Name is too long. Use up to 6 words.'));
                    }
                },
            ],
            'author_email' => ['required', 'email', 'max:255'],
            'body' => [
                'required',
                'string',
                'max:250',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if ($this->countWords((string) $value) < 5) {
                        $fail(__('Comment must contain at least 5 words.'));
                    }
                },
            ],
        ]);

        if (Auth::check()) {
            $this->author_name = (string) (Auth::user()?->name ?? $this->author_name);
            $this->author_email = (string) (Auth::user()?->email ?? $this->author_email);
        }

        if ($this->parent_id !== null) {
            $validParent = PageComment::query()
                ->where('page_id', $this->page->id)
                ->whereKey($this->parent_id)
                ->where('status', PageComment::STATUS_APPROVED)
                ->exists();
            if (! $validParent) {
                $this->addError('body', __('Invalid reply target.'));
                $this->parent_id = null;
                $this->replying_to_name = null;

                return;
            }
        }

        $isAdmin = Auth::check();
        $authUserId = Auth::id();

        PageComment::create([
            'page_id' => $this->page->id,
            'parent_id' => $this->parent_id,
            'user_id' => $authUserId,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'body' => strip_tags($this->body),
            'is_admin' => $isAdmin,
            'status' => $isAdmin ? PageComment::STATUS_APPROVED : PageComment::STATUS_PENDING,
            'moderated_at' => $isAdmin ? now() : null,
            'moderated_by' => $isAdmin ? $authUserId : null,
        ]);

        RateLimiter::hit($key, decaySeconds: 60);

        $this->reset('body', 'parent_id', 'replying_to_name', 'recaptchaToken');
        session()->flash('comment_submitted', true);
    }

    #[Computed]
    public function thread(): Collection
    {
        return PageComment::approvedThreadForPage($this->page->id);
    }

    private function countWords(string $value): int
    {
        $parts = preg_split('/\s+/u', trim($value), -1, PREG_SPLIT_NO_EMPTY);

        return is_array($parts) ? count($parts) : 0;
    }

    public function render()
    {
        return view('livewire.blog.post-comments', [
            'thread' => $this->thread(),
            'isAdminUser' => Auth::check(),
        ]);
    }
}

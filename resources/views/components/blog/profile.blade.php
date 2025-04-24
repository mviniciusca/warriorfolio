@props(['page' => null])

{{--  Post Profile Mini Card --}}

<div class="transition-all duration-300">
    <section class="border-b-none flex items-start border-b-secondary-200/50 dark:border-b-secondary-800/50">
        <div class="mr-3 inline-flex items-start py-4 text-sm">
            @if ($page->user->profile->avatar)
                <img class="relative mx-auto my-2 mr-4 h-16 w-16 rounded-full object-cover"
                    src="{{ asset('storage/' . $page->user->profile->avatar) }}" style="object-fit: cover;" />
            @else
                <img class="relative mx-auto my-2 mr-4 max-h-16 max-w-16 rounded-full object-cover invert-0 dark:invert"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p class="my-1 text-sm font-semibold" rel="author">
                    {{ $page->user->name }}
                </p>
                <p class="mb-2 text-xs">
                    {!! $page->user->profile->job_position !!} - {{ $page->user->profile->localization }}
                </p>
                <p> <x-ui.social-network :justify="'start'" /></p>
            </div>
        </div>
    </section>
</div>

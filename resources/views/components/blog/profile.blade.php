@props(['page' => null])

<div class="transition-all duration-300">
    <section class="flex items-start border-b-none border-b-secondary-200/50 dark:border-b-secondary-800/50">
        <div class="mr-3 inline-flex items-start py-4 text-sm">
            @if ($page->user->profile->avatar)
                <x-curator-glider class="relative mx-auto my-2 mr-4 max-h-14 max-w-14 rounded-full object-cover"
                    :media="$page->user->profile->avatar" />
            @else
                <img class="relative mx-auto my-2 mr-4 max-h-16 max-w-16 rounded-full object-cover invert-0 dark:invert"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p rel="author" class="my-1 text-sm font-semibold">
                    {{ $page->user->name }}
                </p>
                <p class="mb-2 text-xs">
                    {!! $page->user->profile->job_position !!} - {{ $page->user->profile->localization }}
                </p>
                <p> <x-ui.social-network /></p>
            </div>
        </div>
    </section>
</div>

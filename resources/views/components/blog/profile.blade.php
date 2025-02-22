@props(['page' => null])

<div>
    <section class="my-3 flex items-start border-b border-b-secondary-200 not-italic dark:border-b-secondary-800">
        <div class="mr-3 inline-flex items-start py-4 text-sm">
            @if ($page->user->profile->avatar)
                <x-curator-glider class="relative mx-auto my-2 mr-4 max-h-14 max-w-14 rounded-md object-cover"
                    :media="$page->user->profile->avatar" />
            @else
                <img class="relative mx-auto my-2 mr-4 max-h-16 max-w-16 rounded-md object-cover invert-0 dark:invert"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p rel="author" class="mt-1 font-mono text-base font-semibold uppercase">
                    {{ $page->user->name }}
                </p>
                <p class="-mt-1 pb-1 font-mono text-xs uppercase">{!! $page->user->profile->job_position !!} -
                    {{ $page->user->profile->localization }}</p>
                <p> <x-ui.social-network /></p>
            </div>
        </div>
    </section>
</div>

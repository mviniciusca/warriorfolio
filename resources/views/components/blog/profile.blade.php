@props(['page' => null])

<div>
    <section class="my-3 flex items-start border-b border-b-secondary-200 not-italic dark:border-b-secondary-800">
        <div class="mr-3 inline-flex items-start py-4 text-sm">
            @if ($user->profile->avatar)
                <x-curator-glider class="relative mx-auto my-2 mr-4 max-h-16 max-w-14 rounded-full object-cover"
                    :media="$user->profile->avatar" />
            @else
                <img class="relative mx-auto my-2 mr-4 max-h-16 max-w-16 rounded-full object-cover invert-0 dark:invert"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p href="#" rel="author" class="font-mono text-base uppercase">{{ $user->name }}</p>
                <p class="pb-2 font-mono text-xs uppercase">{{ $user->profile->job_position }} -
                    {{ $user->profile->localization }}</p>
                <p> <x-ui.social-network /></p>
            </div>
        </div>
    </section>
</div>

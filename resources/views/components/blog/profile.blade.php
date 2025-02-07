@props([
    'published_at' => null,
])
<div>
    <section class="mb-6 flex items-center pb-8 not-italic">
        <div class="mr-3 inline-flex items-center text-sm">
            @if ($user->profile->avatar)
                <x-curator-glider
                    class="relative mx-auto my-2 mr-4 max-h-32 max-w-32 rounded-full bg-secondary-300 bg-gradient-to-tl from-primary-500 to-tertiary-500 object-cover p-1 dark:bg-secondary-700 lg:my-8"
                    :media="$user->profile->avatar" />
            @else
                <img class="relative mx-auto my-2 mr-4 max-h-32 max-w-32 rounded-full bg-secondary-300 bg-gradient-to-tl from-primary-500 to-tertiary-500 object-cover p-1 dark:bg-secondary-700 lg:my-8"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p href="#" rel="author" class="-mt-4 text-xl font-bold">{{ $user->name }}</p>
                <p class="pb-2 text-base">{{ $user->profile->job_position }} • {{ $user->profile->localization }}</p>
                <p> <x-ui.social-network /></p>
            </div>
        </div>
    </section>
</div>

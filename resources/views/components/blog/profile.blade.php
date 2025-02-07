@props([
    'published_at' => null,
])
<div>
    <section class="flex py-8 items-center mb-6 not-italic">
        <div class="inline-flex items-center mr-3 text-sm ">
            @if($user->profile->avatar)
            <x-curator-glider
                class="relative mx-auto my-2 mr-4 max-h-28 max-w-28 rounded-full bg-secondary-300 bg-gradient-to-tl from-primary-500 to-tertiary-500 object-cover p-1 dark:bg-secondary-700 lg:my-8"
                :media="$user->profile->avatar" />
            @else
            <img class="relative mx-auto my-2 max-h-40 max-w-40 rounded-full bg-secondary-300 bg-gradient-to-tl from-primary-500 to-tertiary-500 object-cover p-1 dark:bg-secondary-700 lg:my-8"
                src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p href="#" rel="author" class="text-xl font-bold ">{{ $user->name }}</p>
                <p class="text-base">{{ $user->profile->job_position }} • {{ $user->profile->localization }}</p>
                <p class="text-base"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $published_at }}</time></p>
                <x-ui.social-network />
            </div>
        </div>
    </section>
</div>

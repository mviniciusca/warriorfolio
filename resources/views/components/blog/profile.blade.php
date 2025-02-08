<div>
    <section class="flex items-center border-b border-b-secondary-200 py-8 not-italic dark:border-b-secondary-800">
        <div class="mr-3 inline-flex items-center text-sm">
            @if ($user->profile->avatar)
                <x-curator-glider class="relative mx-auto my-2 mr-4 max-h-16 max-w-16 rounded-full object-cover"
                    :media="$user->profile->avatar" />
            @else
                <img class="relative mx-auto my-2 mr-4 max-h-16 max-w-16 rounded-full object-cover"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            <div>
                <p href="#" rel="author" class="text-base font-bold">{{ $user->name }}</p>
                <p class="pb-2 text-base">{{ $user->profile->job_position }} • {{ $user->profile->localization }}</p>
                <p> <x-ui.social-network /></p>
            </div>
        </div>
    </section>
</div>

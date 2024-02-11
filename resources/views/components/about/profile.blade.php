<div
    class="flex flex-wrap items-center justify-between gap-2 rounded-lg border border-secondary-300 bg-secondary-300 bg-opacity-20 px-4 py-2 dark:border dark:border-secondary-800 dark:bg-secondary-800 dark:bg-opacity-40 lg:inline-block lg:items-start lg:justify-normal lg:border-none lg:bg-transparent dark:lg:bg-transparent">

    <section id="profile-section-one" class="mx-auto">

        <div id="profile-avatar">

            @if($profile->avatar)
            <x-curator-glider
                class="relative mx-auto my-2 max-h-40 max-w-40 rounded-full bg-secondary-300 bg-gradient-to-tl from-primary-500 to-tertiary-500 object-cover p-1 dark:bg-secondary-700 lg:my-8"
                :media="$profile->avatar" />
            @else
            <img class="relative mx-auto my-2 max-h-40 max-w-40 rounded-full bg-secondary-300 bg-gradient-to-tl from-primary-500 to-tertiary-500 object-cover p-1 dark:bg-secondary-700 lg:my-8"
                src="{{ asset('img/core/profile-picture.png') }}" />
            @endif

            @if($profile->count() === 0)
            <x-ui.empty-section :auth="'Go to your Dashboard and create a New Profile.'" />
            @endif
            @if($profile->is_open_to_work)
            @if($profile->linkedin)
            <a href="{{'https://' . $profile->linkedin }}" target="_blank">
                @endif
                <div
                    class="absolute -ml-12 -mt-10 inline-block w-auto rounded-sm bg-gradient-to-tl from-primary-500 to-indigo-500 p-1 text-xs text-white lg:-mt-16">
                    <span class="flex items-center gap-1 font-semibold">
                        <ion-icon class="h-3 w-3" name="logo-linkedin"></ion-icon>
                        {{ __('Open to Work') }}
                    </span>
                </div>
                @if($profile->linkedin)
            </a>
            @endif
            @endif
        </div>

        @if($profile->user->name)
        <div class="mb-4 text-xl font-semibold tracking-tight">
            <span>{{ $profile->user->name }}</span>
        </div>
        @endif

    </section>

    <section id="profile-section-two" class="mx-auto">

        <div class="flex flex-wrap items-center justify-center gap-4 md:justify-between lg:inline-block">
            @if($profile->job_position || $profile->localization)
            <div class="mb-4 tracking-tight">
                @if($profile->job_position)
                <span class="text-sm font-semibold">{{ $profile->job_position }} </span>
                @endif
                @if($profile->localization)
                <span class="mt-2 flex items-center text-sm opacity-80">
                    <x-ui.ionicon icon="location-outline" />{{ $profile->localization }}
                </span>
                @endif
            </div>
            @endif


            @if($profile->is_downloadable && $profile->document)
            <div class="py-2">
                <a target="new" href="{{ asset('storage/' . $profile->document) }}"
                    class="inline-flex items-center gap-2 rounded-md bg-primary-500 px-4 py-2 align-middle text-sm font-medium text-secondary-50 transition-all duration-100 hover:opacity-60 active:opacity-40">
                    <ion-icon class="text-2xl" name="download-outline"></ion-icon>
                    {{ __('View Resume') }}
                </a>
            </div>
            @endif
        </div>


        <div class="mx-auto my-8" id="social-network">
            <x-ui.social-network />
        </div>


        <div id="skills" class="my-4 flex flex-wrap content-center items-center justify-center text-sm tracking-tight">
            @if($profile->skills)
            @foreach(explode(',', $profile->skills) as $skill)
            <span
                class="m-1 inline-flex rounded-md border border-secondary-400 border-opacity-30 bg-secondary-200 px-2 py-1 text-xs transition-all duration-100 hover:opacity-80 dark:bg-secondary-800">
                {{ $skill }}
            </span>
            @endforeach
            @endif
            {{-- Empty Section --}}
            @if(!$profile->skills)
            <x-ui.empty-section :auth="'Go to your Dashboard and create a New Skill.'" />
            @endif

        </div>

    </section>
</div>

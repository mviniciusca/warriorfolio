@props(['profile' => null, 'is_section_filled_inverted' => null])

@php
    $linkedin = collect($profile->social)->firstWhere('social_network', 'linkedin')['profile_link'] ?? null;
@endphp

<div
    class="my-4 flex flex-wrap items-center justify-between gap-2 rounded-lg border-none border-secondary-100 bg-transparent px-6 dark:border dark:border-secondary-900 dark:bg-transparent lg:my-0 lg:inline-block lg:items-start lg:justify-normal lg:border-none lg:bg-transparent lg:p-0 dark:lg:bg-transparent">
    <section id="profile-section-one" class="mx-auto">
        <div class="mb-8" id="profile-avatar">
            @if ($profile->avatar)
                <x-curator-glider
                    class="relative mx-auto my-2 w-28 rounded-full bg-gradient-to-tr from-secondary-800/50 to-secondary-300/50 object-cover p-1 grayscale md:w-28 lg:w-36"
                    :media="$profile->avatar" />
            @else
                <img class="relative mx-auto my-2 w-28 rounded-full bg-gradient-to-tr from-secondary-800/50 to-secondary-300/50 object-cover p-2 grayscale md:w-28 lg:w-36"
                    src="{{ asset('img/core/profile-picture.png') }}" />
            @endif
            @if ($profile->count() === 0)
                <x-ui.empty-section :auth="'Update your Profile'" />
            @endif
            @if ($profile->is_open_to_work)
                @if ($linkedin)
                    <a href="{{ 'https://' . $linkedin }}" target="_blank">
                @endif
                    <div
                        class="absolute -ml-14 -mt-6 inline-block rounded border border-black/80 bg-gradient-to-tr from-secondary-600 to-secondary-950 p-1 text-xs text-white md:-ml-14 md:-mt-8 lg:-ml-14 lg:-mt-10">
                        <span class="flex items-center gap-1 text-xs font-semibold">
                            <ion-icon class="h-4 w-4" name="logo-linkedin"></ion-icon>
                            {{ __('Open to Work') }}
                        </span>
                    </div>
                    @if ($linkedin)
                        </a>
                    @endif
            @endif
        </div>
        @if ($profile->user->name)
            <div class="text-lg font-semibold tracking-tight">
                <span>{{ $profile->user->name }}</span>
            </div>
        @endif
    </section>
    <section id="profile-section-two" class="mx-auto">
        <div class="flex flex-wrap items-center justify-center gap-4 md:justify-between lg:inline-block">
            @if ($profile->job_position || $profile->localization)
                <div class="tracking-tight">
                    @if ($profile->job_position)
                        <span class="text-sm font-semibold">{{ $profile->job_position }} </span>
                    @endif
                    @if ($profile->localization)
                        <span class="flex items-center gap-1 text-sm font-semibold opacity-60">
                            <x-ui.ionicon icon="globe-outline" />{{ $profile->localization }}
                        </span>
                    @endif
                </div>
            @endif
            @if ($profile->is_downloadable && $profile->document)
                <div class="py-2">
                    <a target="new" href="{{ asset('storage/' . $profile->document) }}">
                        <x-ui.button class=" mt-4 text-xs" :style="'filled'" :$is_section_filled_inverted
                            :icon="'download-outline'">
                            {{ __('Download Resume') }}
                        </x-ui.button>
                    </a>
                </div>
            @endif
        </div>
        <div class="mx-auto my-8 px-4 flex flex-wrap justify-between" id="social-network">
            <x-ui.social-network />
        </div>
        <div id="skills" class="my-4 flex flex-wrap content-center items-center justify-center text-sm tracking-tight">
            @if ($profile->skills)
                @foreach (explode(',', $profile->skills) as $skill)
                    <span
                        class="m-1 inline-flex rounded-full border border-secondary-500/50 bg-transparent px-3 py-1 text-xs transition-all duration-100 dark:bg-transparent">
                        {{ $skill }}
                    </span>
                @endforeach
            @endif
            {{-- Empty Section --}}
            @if (!$profile->skills)
                <x-ui.empty-section :auth="'Update your Skills'" />
            @endif
        </div>
    </section>
</div>

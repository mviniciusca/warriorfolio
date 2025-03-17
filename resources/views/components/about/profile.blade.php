@props(['profile' => null])

@php
    $linkedin = collect($profile->social)->firstWhere('social_network', 'linkedin')['profile_link'] ?? null;
@endphp

<div
    class="my-4 lg:my-0 flex flex-wrap items-center justify-between gap-2 rounded-lg border-none border-secondary-100 bg-transparent px-6 lg:p-0 dark:border dark:border-secondary-900 dark:bg-transparent lg:inline-block lg:items-start lg:justify-normal lg:border-none lg:bg-transparent dark:lg:bg-transparent">
    <section id="profile-section-one" class="mx-auto">
        <div class="mb-8" id="profile-avatar">
            @if ($profile->avatar)
                <x-curator-glider
                    class="relative mx-auto my-2 lg:w-36 md:w-28 w-28 p-2 rounded-full object-cover dark:bg-secondary-800 bg-secondary-100 lg:my-2"
                    :media="$profile->avatar" />
            @else
                <img class="relative mx-auto my-2 lg:w-36 md:w-28 w-28 p-2 rounded-full object-cover dark:bg-secondary-800 bg-secondary-100 lg:my-2"
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
                        class="absolute -ml-14 -mt-6 md:-ml-14 md:-mt-8 lg:-ml-14 lg:-mt-9 inline-block bg-black border border-white/20 rounded p-1 text-xs text-white">
                        <span class="flex items-center text-xs font-semibold gap-1">
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
            <div class="mb-1 text-lg font-semibold tracking-tight">
                <span>{{ $profile->user->name }}</span>
            </div>
        @endif
    </section>
    <section id="profile-section-two" class="mx-auto">
        <div class="flex flex-wrap items-center justify-center gap-4 md:justify-between lg:inline-block">
            @if ($profile->job_position || $profile->localization)
                <div class="md:mb-4 tracking-tight">
                    @if ($profile->job_position)
                        <span class="text-sm font-semibold">{{ $profile->job_position }} </span>
                    @endif
                    @if ($profile->localization)
                        <span class="mt-2 flex gap-1 items-center text-sm font-semibold opacity-60">
                            <x-ui.ionicon icon="map-outline" />{{ $profile->localization }}
                        </span>
                    @endif
                </div>
            @endif
            @if ($profile->is_downloadable && $profile->document)
                <div class="py-2">
                    <a target="new" href="{{ asset('storage/' . $profile->document) }}">
                        <x-hero.button-group class="text-xs" :style="'outlined'" :title="__('Download Resume')"
                            :icon="'download-outline'" />
                    </a>
                </div>
            @endif
        </div>
        <div class="mx-auto my-8" id="social-network">
            <x-ui.social-network />
        </div>
        <div id="skills" class="my-4 flex flex-wrap content-center items-center justify-center text-sm tracking-tight">
            @if ($profile->skills)
                @foreach (explode(',', $profile->skills) as $skill)
                    <span
                        class="m-1 inline-flex rounded-full border border-black/50 dark:border-white/20 bg-transparent px-3 py-1 text-xs transition-all duration-100 dark:bg-transparent">
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

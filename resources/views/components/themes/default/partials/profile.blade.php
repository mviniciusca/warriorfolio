@props(['profile' => null, 'is_section_filled_inverted' => null])

@php
$linkedin = collect($profile->social)->firstWhere('social_network', 'linkedin')['profile_link'] ?? null;
@endphp

<div
    class="my-4 flex flex-wrap items-center justify-between gap-2 rounded-lg border-none border-secondary-100 bg-transparent px-6 dark:border dark:border-secondary-900 dark:bg-transparent lg:my-0 lg:inline-block lg:items-start lg:justify-normal lg:border-none lg:bg-transparent lg:p-0 dark:lg:bg-transparent">
    <section class="mx-auto" id="profile-section-one">
        <div class="mb-8" id="profile-avatar">
            @if ($profile->avatar)
            <img class="relative mx-auto my-2 h-28 w-28 rounded-full object-cover md:h-28 md:w-28 lg:h-28 lg:w-28"
                src="{{ asset('storage/' . $profile->avatar) }}" style="object-fit: cover;" />
            @else
            <img class="relative dark:invert invert-0 mx-auto my-2 w-28 rounded-full object-cover grayscale md:w-28 lg:w-28"
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
        <div class="text-base font-medium">
            <span>{{ $profile->user->name }}</span>
        </div>
        @endif
    </section>
    <section class="mx-auto" id="profile-section-two">
        <div class="flex flex-wrap items-center justify-center gap-4 md:justify-between lg:mt-8 lg:inline-block">
            @if ($profile->job_position || $profile->localization)
            <div class="tracking-tight">
                @if ($profile->company ?? null)
                <span class="flex items-center justify-start gap-2 py-1 text-sm opacity-90">
                    <x-ui.ionicon icon="business-outline" />
                    <p>{{ $profile->company }}</p>
                </span>
                @endif
                @if ($profile->job_position ?? null)
                <span class="flex items-center justify-start gap-2 py-1 text-sm  opacity-90">
                    <x-ui.ionicon icon="briefcase-outline" />
                    <p>{{ $profile->job_position }}</p>
                </span>
                @endif
                @if ($profile->localization ?? null)
                <span class="flex items-center justify-start gap-2 py-1 text-sm opacity-90">
                    <x-ui.ionicon icon="globe-outline" />
                    <p>{{ $profile->localization }}</p>
                </span>
                @endif
                @if ($profile->public_email ?? null)
                <a href="mailto:{{ $profile->public_email }}">
                    <span class="flex items-center justify-start gap-2 py-1 text-sm opacity-90">
                        <x-ui.ionicon icon="mail-outline" />
                        <p>{{ $profile->public_email ?? 'mviniciusca@gmail.com' }}</p>
                    </span>
                </a>
                @endif
            </div>
            @endif
            @if ($profile->is_downloadable && $profile->document)
            <div class="mx-auto py-2 text-center">
                <a href="{{ asset('storage/' . $profile->document) }}" target="new">
                    <x-ui.button size="sm" :$is_section_filled_inverted :icon="'download-outline'" :style="'filled'"
                        class="mx-auto mt-4 text-xs">
                        {{ __('Download CV') }}
                    </x-ui.button>
                </a>
            </div>
            @endif
        </div>
        <div class="mx-auto my-8 flex flex-wrap justify-center px-4" id="social-network">
            <x-ui.social-network />
        </div>
        <div class="my-4 flex flex-wrap content-center items-center justify-center text-sm tracking-tight" id="skills">
            @if ($profile->skills)
            @foreach (explode(',', $profile->skills) as $skill)
            <span
                class="m-1 inline-flex rounded-full border border-secondary-500/50 bg-transparent px-2 py-1 text-xs transition-all duration-100 dark:bg-transparent">
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

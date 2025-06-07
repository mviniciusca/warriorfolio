@props([
'profile' => null,
'is_section_filled_inverted' => null,
'centered' => false,
'variant' => 'default',
'size' => 'md'
])

@php
$linkedin = collect($profile->social)->firstWhere('social_network', 'linkedin')['profile_link'] ?? null;

// Size configurations
$sizeConfig = [
'sm' => [
'avatar' => 'h-20 w-20',
'name' => 'text-sm',
'badge' => '-ml-10 -mt-4 text-xs',
'content' => 'text-xs',
],
'md' => [
'avatar' => 'h-28 w-28',
'name' => 'text-base',
'badge' => '-ml-14 -mt-6 text-xs md:-ml-14 md:-mt-8 lg:-ml-14 lg:-mt-10',
'content' => 'text-sm',
],
'lg' => [
'avatar' => 'h-36 w-36',
'name' => 'text-lg',
'badge' => '-ml-18 -mt-8 text-sm',
'content' => 'text-base',
],
];

$currentSize = $sizeConfig[$size] ?? $sizeConfig['md'];

// Layout classes based on centered prop
$containerClasses = 'my-4 flex flex-wrap items-center justify-between gap-2';

// Only center the avatar and name section when centered is true
$sectionOneClasses = $centered
? 'mx-auto text-center'
: 'mx-auto';

// Keep section two with normal layout regardless of centered prop
$sectionTwoClasses = 'mx-auto';

$profileInfoClasses = 'justify-center gap-4 md:justify-between lg:mt-8 lg:inline-block';

$skillsClasses = 'justify-center';
@endphp

<div
    class="{{ $containerClasses }} rounded-lg border-none border-secondary-100 bg-transparent px-6 dark:border dark:border-secondary-900 dark:bg-transparent lg:my-0 lg:inline-block lg:items-start lg:justify-normal lg:border-none lg:bg-transparent lg:p-0 dark:lg:bg-transparent">

    {{-- Profile Section One: Avatar and Name --}}
    <section class="{{ $sectionOneClasses }}" id="profile-section-one">
        <div class="mb-8" id="profile-avatar">
            {{-- Avatar --}}
            @if ($profile->avatar)
            <img class="relative mx-auto my-2 {{ $currentSize['avatar'] }} rounded-full object-cover"
                src="{{ asset('storage/' . $profile->avatar) }}" style="object-fit: cover;"
                alt="{{ $profile->user->name ?? 'Profile Avatar' }}" />
            @else
            <img class="relative dark:invert invert-0 mx-auto my-2 {{ $currentSize['avatar'] }} rounded-full object-cover grayscale"
                src="{{ asset('img/core/profile-picture.png') }}" alt="Default Profile Picture" />
            @endif

            {{-- Empty State --}}
            @if ($profile->count() === 0)
            <x-ui.empty-section :auth="'Update your Profile'" />
            @endif

        </div>

        {{-- Name and Open to Work --}}
        @if ($profile->user->name)
        <div class="{{ $currentSize['name'] }} grid gap-1 items-center font-medium">
            <span>{{ $profile->user->name }}</span>
            {{-- Open to Work Badge --}}
            @if ($profile->is_open_to_work)
            @if ($linkedin)
            <a href="{{ 'https://' . $linkedin }}" target="_blank" rel="noopener">
                @endif
                <div
                    class="saturn-badge border saturn-bg-inverse saturn-text-inverse text-xs saturn-border font-medium my-2">
                    {{ __('Open to Work') }}
                </div>
                @if ($linkedin)
            </a>
            @endif
            @endif
        </div>
        @endif
    </section>

    {{-- Profile Section Two: Information --}}
    <section class="{{ $sectionTwoClasses }}" id="profile-section-two">
        <div class="flex flex-wrap items-center {{ $profileInfoClasses }}">
            {{-- Professional Information --}}
            @if ($profile->job_position || $profile->localization || $profile->company || $profile->public_email)
            <div class="tracking-tight">
                @if ($profile->company)
                <span class="flex items-center justify-start gap-2 py-1 {{ $currentSize['content'] }} opacity-90">
                    <x-ui.ionicon icon="business-outline" />
                    <p>{{ $profile->company }}</p>
                </span>
                @endif

                @if ($profile->job_position)
                <span class="flex items-center justify-start gap-2 py-1 {{ $currentSize['content'] }} opacity-90">
                    <x-ui.ionicon icon="briefcase-outline" />
                    <p>{{ $profile->job_position }}</p>
                </span>
                @endif

                @if ($profile->localization)
                <span class="flex items-center justify-start gap-2 py-1 {{ $currentSize['content'] }} opacity-90">
                    <x-ui.ionicon icon="globe-outline" />
                    <p>{{ $profile->localization }}</p>
                </span>
                @endif

                @if ($profile->public_email)
                <a href="mailto:{{ $profile->public_email }}">
                    <span
                        class="flex items-center justify-start gap-2 py-1 {{ $currentSize['content'] }} opacity-90 hover:opacity-100 transition-opacity">
                        <x-ui.ionicon icon="mail-outline" />
                        <p>{{ $profile->public_email }}</p>
                    </span>
                </a>
                @endif
            </div>
            @endif

            {{-- Download CV Button --}}
            @if ($profile->is_downloadable && $profile->document)
            <div class="mx-auto py-2 text-center">
                <a href="{{ asset('storage/' . $profile->document) }}" target="_blank" rel="noopener">
                    <x-ui.button size="sm" :$is_section_filled_inverted :icon="'download-outline'" :style="'filled'"
                        class="mx-auto mt-4 text-xs hover:scale-105 transition-transform">
                        {{ __('Download CV') }}
                    </x-ui.button>
                </a>
            </div>
            @endif
        </div>

        {{-- Social Network --}}
        <div class="my-8">
            <x-ui.social-network justify="center" />
        </div>

        {{-- Skills --}}
        <div class="my-4 flex flex-wrap gap-2 justify-center items-center {{ $currentSize['content'] }} tracking-tight"
            id="skills">
            @if ($profile->skills)
            @foreach (explode(',', $profile->skills) as $skill)
            <span class="px-3 py-1 border saturn-border bg-transparent saturn-badge text-xs text-center">
                {{ trim($skill) }}
            </span>
            @endforeach
            @else
            {{-- Empty Section --}}
            <div class="w-full text-center">
                <x-ui.empty-section :auth="'Update your Skills'" />
            </div>
            @endif
        </div>
    </section>
</div>

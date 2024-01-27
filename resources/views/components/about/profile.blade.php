{{-- Profile: Avatar --}}
<div id="profile-avatar"
    class="mx-auto mb-8 mt-8 h-40 w-40 rounded-full bg-secondary-500 bg-gradient-to-tl from-primary-500 to-tertiary-400 p-1">
    <div class="bg-secondary-50 bg-no-repeat transition-all duration-100 hover:grayscale-0 h-full w-full rounded-full p-2 mx-auto mb-12 {{ $profile->avatar_size . ' ' . $profile->avatar_position }}"
        style="background-image:url('{{ $profile->avatar ? asset('storage/' . $profile->avatar) : asset('img/core/profile-picture.png') }}')">
        @if($profile->is_open_to_work)
        <div class="spacial-gradient absolute ml-4 mt-32 p-1 px-3 text-xs text-primary-50">
            {{ __('Open to Work') }}
        </div>
        @endif
    </div>
</div>
{{-- Profile: Name, Job Position and Locale --}}
<p class="mb-4 text-xl font-semibold tracking-tight">
    {{ $profile->user->name }}
</p>
<p class="mb-6 text-sm tracking-tight">
    {{ $profile->job_position }} <br /> {{ $profile->localization }}
</p>
{{-- Profile: Resume --}}
@if($profile->is_downloadable && $profile->document)
<div class="py-2">
    <a target="new" href="{{ asset('storage/' . $profile->document) }}"
        class="inline-flex items-center gap-2 rounded-md bg-primary-500 px-4 py-2 align-middle text-sm font-medium text-secondary-50 transition-all duration-100 hover:opacity-60 active:opacity-40">
        <ion-icon class="text-2xl" name="download-outline"></ion-icon>
        {{ __('View Resume') }}
    </a>
</div>
@endif
{{-- Profile: Social Network --}}
<div class="mx-auto my-8" id="social-network">
    <x-ui.social-network />
</div>
{{-- Profile: Skills --}}
<div id="skills" class="my-4 flex flex-wrap content-center items-center justify-center text-sm tracking-tight">
    @foreach(explode(',', $profile->skills) as $skill)
    <span
        class="m-1 inline-flex rounded-md border border-secondary-400 border-opacity-30 bg-secondary-200 px-2 py-1 text-xs transition-all duration-100 hover:opacity-80 dark:bg-secondary-800">
        {{ $skill }}
    </span>
    @endforeach
</div>

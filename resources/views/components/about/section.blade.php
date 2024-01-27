@if($module->about)
<x-core.layout class="{{ $info->about_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : ''}}" id="about">
    @if($info->about_section_title)
    <div class="header-title mb-2">{!! $info->about_section_title !!}</div>
    @endif
    @if($info->about_section_subtitle_text)
    <div class="mx-auto mt-4 max-w-2xl text-center text-lg">{!! $info->about_section_subtitle_text !!}</div>
    @endif
    <div class="mt-24 flex">
        {{-- Profile Section --}}
        <div class="w-full p-8 text-center md:w-1/4" id="profile">
            <div
                class="mx-auto mb-8 mt-8 h-40 w-40 rounded-full bg-secondary-500 bg-gradient-to-tl from-primary-500 to-tertiary-500 p-1">
                <div class="bg-secondary-50 bg-no-repeat transition-all duration-100 filter grayscale hover:grayscale-0 h-full w-full rounded-full p-2 mx-auto mb-12 {{ $about->avatar_size . ' ' . $about->avatar_position }}"
                    style="background-image:url('{{ $about->avatar ? asset('storage/' . $about->avatar) : asset('img/core/profile-picture.png') }}')">
                    @if($about->is_open_to_work)
                    <div class="absolute ml-6 mt-32 bg-secondary-50 p-1 text-xs text-primary-500">
                        {{ __('Open to Work') }}
                    </div>
                    @endif
                </div>
            </div>
            <p class="text-xl font-semibold tracking-tight">{{ $about->user->name }}</p>
            <p class="mb-6 text-sm tracking-tight">{{ $about->job_position }} <br /> {{ $about->localization }}
            </p>
            <div class="mx-auto">
                <x-ui.social-network />
            </div>
            <div class="my-4 text-sm tracking-tight">
                @foreach(explode(',', $about->skills) as $skill)
                <span
                    class="mb-2 mr-2 inline-block rounded-md border-t border-t-secondary-800 bg-secondary-900 px-4 py-1 text-xs text-secondary-200 transition-all duration-100 hover:opacity-80">
                    {{ $skill }}
                </span>
                @endforeach
            </div>
            @if($about->is_downloadable)
            <div class="mt-4">
                <a target="new" href="{{ asset('storage/' . $about->document) }}"
                    class="inline-flex items-center gap-2 rounded-md bg-primary-500 px-4 py-2 align-middle text-sm font-medium text-secondary-50 transition-all duration-100 hover:opacity-60 active:opacity-40 dark:bg-secondary-50 dark:text-secondary-800">
                    <ion-icon class="text-2xl" name="download-outline"></ion-icon>
                    {{ __('View Resume') }}
                </a>
            </div>
            @endif
        </div>
        {{-- About Section --}}
        <div class="text-md w-full p-12 leading-loose md:w-2/4">
            {!! $about->about !!}
        </div>
        {{-- Courses and Graduations --}}
        <div class="w-full p-12 md:w-2/4">
            <ol class="relative border-s border-secondary-200 dark:border-secondary-700">
                @foreach ($courses as $course )
                <li class="mb-10 ms-4">
                    <div
                        class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-white bg-secondary-200 dark:border-secondary-900 dark:bg-secondary-700">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-secondary-400 dark:text-secondary-500">
                        {{ \Carbon\Carbon::parse($course->start_date)->format('F, Y') }} -
                        {{ \Carbon\Carbon::parse($course->end_date)->format('F, Y') }}
                    </time>
                    <h3 class="text-lg font-semibold text-secondary-900 dark:text-white">
                        {{$course->institution}}
                    </h3>
                    <p class="mb-4 text-base font-normal text-secondary-500 dark:text-secondary-400">
                        {{$course->name}}
                    </p>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
</x-core.layout>
@endif

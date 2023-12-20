<section class="w-full bg-secondary-950 py-24 my-24">
    <div class="px-4 py-4 md:py-8">
        <div class="max-w-7xl mx-auto">
            <div class="header-title">tell about <span class="text-highlight">yourself</span>.</div>
            <div class="flex mt-24">
                {{-- Profile Section --}}
                <div class="p-8 w-full md:w-1/4 text-center" id="profile">
                    <div
                        class="bg-secondary-500 h-40 w-40 rounded-full p-1 mx-auto mb-12 mt-12 bg-gradient-to-tl from-primary-400 to-tertiary-400 ">
                        <div class="bg-secondary-50 bg-cover bg-center transition-all duration-100 filter grayscale hover:grayscale-0 h-full w-full rounded-full p-2 mx-auto mb-12"
                            style="background-image:url('{{ asset('storage/' . $about->avatar) }}')">
                            @if($about->is_open_to_work)
                            <div class="absolute bg-secondary-50 text-primary-500 text-xs p-1 ml-6 mt-32 ">
                                Open to Work
                            </div>
                            @endif
                        </div>
                    </div>
                    <p class="text-xl tracking-tight font-semibold">{{ $about->user->name }}</p>
                    <p class="text-sm tracking-tight mb-8">{{ $about->job_position }} <br /> {{ $about->localization }}
                    </p>
                    <div class="flex mx-auto justify-center ">
                        @if($about->twitter)
                        <x-ui.icon :href="$about->twitter" name="logo-twitter" />
                        @endif
                        @if($about->linkedin)
                        <x-ui.icon :href="$about->linkedin" name="logo-linkedin" />
                        @endif
                        @if($about->facebook)
                        <x-ui.icon :href="$about->facebook" name="logo-facebook" />
                        @endif
                        @if($about->dribbble)
                        <x-ui.icon :href="$about->dribbble" name="logo-dribbble" />
                        @endif
                        @if($about->github)
                        <x-ui.icon :href="$about->github" name="logo-github" />
                        @endif
                        @if($about->instagram)
                        <x-ui.icon :href="$about->instagram" name="logo-instagram" />
                        @endif
                    </div>
                    <div class="text-sm tracking-tight my-8">
                        @foreach(explode(',', $about->skills) as $skill)
                        <span
                            class="inline-block bg-secondary-900 rounded-md px-4 border-t border-t-secondary-800 py-1 text-xs text-secondary-200 mr-2 mb-2 hover:opacity-80 transition-all duration-100">
                            {{ $skill }}
                        </span>
                        @endforeach
                    </div>
                    @if($about->is_downloadable)
                    <div class="mt-8">
                        <a href="{{ asset('storage/' . $about->document) }}"
                            class="inline-flex items-center align-middle gap-2 px-4 py-2 text-sm font-medium text-secondary-500 bg-white border border-secondary-200 rounded-lg hover:bg-secondary-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-secondary-200 focus:text-primary-700 dark:bg-primary-500 dark:text-secondary-50 dark:border-secondary-950 dark:hover:text-primary-500 dark:hover:bg-secondary-50 dark:focus:ring-primary-100">
                            <ion-icon class="text-2xl" name="download-outline"></ion-icon>
                            Curriculum Vitae
                        </a>
                    </div>
                    @endif
                </div>
                {{-- About Section --}}
                <div class="p-12 w-full md:w-2/4 text-md leading-loose">
                    {!! $about->about !!}
                </div>
                {{-- Courses --}}
                <div class="p-12 w-full md:w-2/4">
                    <ol class="relative border-s border-secondary-200 dark:border-secondary-700">
                        @foreach ($courses as $course )
                        <li class="mb-10 ms-4">
                            <div
                                class="absolute w-3 h-3 bg-secondary-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-secondary-900 dark:bg-secondary-700">
                            </div>
                            <time
                                class="mb-1 text-sm font-normal leading-none text-secondary-400 dark:text-secondary-500">
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
        </div>
    </div>
</section>
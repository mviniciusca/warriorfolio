<x-content-section
:title="'about me'"
:class="'flex'"
>

    <div id="about-content-layout" class="flex justify-center gap-24">

        <div class="flex w-1/4 justify-center p-4 ">

            <div>

                 {{-- Picture Section --}}
                    <div id="picture-section">

                        <div id="main-picture" class="justify-center  flex">
                            <div>
                            @foreach ($about as $info)
                                <x-curator-glider :media="$info->profile_picture" class="rounded-full filter grayscale" />
                            @endforeach

                            </div>
                        </div>

                    </div>

                {{-- Skill Tags --}}
                 {{--  <div class="mt-8 flex justify-center items-center flex-wrap gap-2 p-4">
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">php</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">docker</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">laravel</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">devops</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">python</div>
                </div>  --}}

            </div>

        </div>

        <div id="about" class="w-1/3 p-4">

            {{-- About me info --}}
            <div class="leading-loose text-zinc-300">
              @foreach ($about as $info )
                {{ $info->about_me }}
              @endforeach
            </div>

        </div>
        <div id="timeline" class="w-1/4">
            <div class="grid justify-center p-4">

                {{-- Certifications --}}

                <span class="pb-8 text-3xl font-extrabold tracking-tight text-zinc-500">
                    recent
                    <span class="bg-gradient-to-r from-orange-400 to-pink-500 bg-clip-text text-transparent">
                    certifications
                    </span>
                </span>

                {{-- Timeline feed --}}
                @foreach ($courses as $course)
                    <x-ui.timeline :course="$course->course" :university="$course->university" :conclusion_date="$course->conclusion_date" />
                @endforeach

            </div>

        </div>
    </div>

    </div>
</x-content-section>


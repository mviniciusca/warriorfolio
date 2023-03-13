<x-content-section
:title="'about me'"
:class="'lg:flex'"
:fatherClass="'grid'"
>

    <div class="grid lg:flex lg:gap-24">

        <div class="lg:flex lg:w-1/4 grid justify-center p-4">

            <div>

                 {{-- Picture Section --}}
                    <div id="picture-section" class=" w-1/2 justify-center lg:w-full grid">
                        <div id="main-picture" class="lg:justify-center lg:flex  grid items-center">
                            <div>
                            @foreach ($about as $info)
                                <x-curator-glider :media="$info->profile_picture" class="rounded-full filter grayscale" />
                            @endforeach

                            </div>
                        </div>

                    </div>

            </div>

        </div>

        <div id="about" class="lg:w-1/3 p-4">

            {{-- About me info --}}
            <div class="lg:leading-loose text-zinc-300">
              @foreach ($about as $info )
                {{ $info->about_me }}
              @endforeach
            </div>

        </div>
        <div id="timeline" class="lg:w-1/4">
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


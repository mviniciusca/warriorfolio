@aware(['page'])
<section>
    <div class="container  max-w-7xl px-5 py-24 mx-auto">
        <div class="grid justify-center items-center text-center">
            <div class="header-title">
                elevate Your <br /> <span class="text-primary-500">Portfolio</span> Experience.
            </div>
            <p class="header-subtitle">
                Creativity in Every Detail. Explore a Tapestry of <br />Unique Projects, Beyond the Ordinary.</p>
        </div>


        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
            @foreach ($projects as $project )
            <div class="p-8 md:w-1/4 sm:mb-0 mb-6">
                <div class="rounded-lg h-64 overflow-hidden">
                    <img alt="content"
                        class="object-cover opacity-60 hover:opacity-95 transition-all duration-100 object-center h-full w-full"
                        src="{{ asset('storage/' . $project->image_cover) }}">
                </div>
                {{-- <h2 class="text-md font-semibold mt-3">{{ $project->name }}</h2> --}}
                {{-- <p class="leading-relaxed mt-2">{{ Str::limit($project->short_description, 140) }}</p>
                <a class="text-primary-500 inline-flex items-center mt-3">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a> --}}
            </div>
            @endforeach

        </div>
    </div>
</section>

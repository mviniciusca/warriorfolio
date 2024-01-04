@aware(['page'])
<x-core.layout>
    <section>
        <div class="container max-w-7xl px-5 py-24 mx-auto">
            <div class="grid justify-center items-center text-center">
                <div class="header-title">
                    elevate Your <br /> <span class="text-highlight">Portfolio </span> Experience.
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

                </div>
                @endforeach

            </div>
        </div>
    </section>
</x-core.layout>

@aware(['page'])
<x-core.layout>
    <section>
        <div class="container max-w-7xl px-5 mx-auto">
            <div class="grid justify-center items-center py-24 text-center">
                <div class="header-title">
                    elevate Your <br /> <span class="text-highlight">Portfolio </span> Experience.
                </div>
                <p class="header-subtitle">
                    Creativity in Every Detail. Explore a Tapestry of <br />Unique Projects, Beyond the Ordinary.</p>
            </div>
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                @foreach ($projects as $project )
                <div
                    class="p-8 md:w-1/4 sm:mb-0 mb-0 filter opacity-20 transition-all duration-100  grayscale invert-0  hover:filter-none hover:opacity-100">
                    <div class="overflow-hidden p-2 rounded-xl">
                        <img alt="content" class="object-cover rounded-xl  object-center w-full "
                            src="{{ asset('storage/' . $project->image_cover) }}">
                        <div class="flex justify-between mt-4 text-sm">
                            <p class="opacity-100">{{ $project->name }}</p>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-core.layout>

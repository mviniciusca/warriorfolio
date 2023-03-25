<div class="md:text-md pl-4 pr-4 text-xs lg:text-base">
    <!-- Create a radio group navigation -->
    <div class="mb-8 flex flex-row justify-end pr-4 pl-4">
        <button
            class="focus:shadow-outline-zinc mr-0 mb-2 rounded-l-lg border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-5 text-white transition-colors duration-150 hover:bg-zinc-900 focus:outline-none active:bg-zinc-800"
            wire:click="filter('all')" wire:loading.attr="disabled">
            All
        </button>
        <button
            class="focus:shadow-outline-zinc mr-0 mb-2 border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-5 text-white transition-colors duration-150 hover:bg-orange-500 focus:outline-none active:bg-zinc-800"
            wire:click="filter('vercel')" wire:loading.attr="disabled">
            Vercel
        </button>
        <button
            class="focus:shadow-outline-zinc mr-0 mb-2 border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-5 text-white transition-colors duration-150 hover:bg-gray-500 focus:outline-none active:bg-zinc-800"
            wire:click="filter('github')" wire:loading.attr="disabled">
            Github
        </button>
        <button
            class="focus:shadow-outline-zinc mr-0 mb-2 border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-5 text-white transition-colors duration-150 hover:bg-pink-500 focus:outline-none active:bg-zinc-800"
            wire:click="filter('dribbble')" wire:loading.attr="disabled">
            Dribbble
        </button>
        <button
            class="focus:shadow-outline-zinc mr-0 mb-2 border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-5 text-white transition-colors duration-150 hover:bg-red-500 focus:outline-none active:bg-zinc-800"
            wire:click="filter('laravel')" wire:loading.attr="disabled">
            Laravel
            <button
                class="focus:shadow-outline-zinc mr-0 mb-2 rounded-r-lg border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-5 text-white transition-colors duration-150 hover:bg-green-500 focus:outline-none active:bg-zinc-800"
                wire:click="filter('web')" wire:loading.attr="disabled">
                Web
            </button>
        </button>
    </div>
    <div id="listing">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($projects as $project)
                <x-ui.portfolio :tag="$project->tag" :link="$project->link"
                    :about="$project->about" :cover="$project->cover" :title="$project->title" />
            @endforeach
        </div>
    </div>
</div>

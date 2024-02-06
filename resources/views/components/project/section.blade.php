@if($module->portfolio)
<x-core.layout class="{{ $info->portfolio_section_fill ? 'bg-secondary-100 dark:bg-secondary-950' : '' }}"
    id="portfolio">

    @if($info->portfolio_section_title)
    <x-slot name="module_title">
        {!! $info->portfolio_section_title !!}
    </x-slot>
    @endif

    @if($info->portfolio_section_subtitle_text)
    <x-slot name="module_subtitle">
        {!! $info->portfolio_section_subtitle_text !!}
    </x-slot>
    @endif

    <section class="mt-20">
        <div class="container mx-auto max-w-7xl px-5">
            <div class="flex w-full flex-wrap content-center justify-start">
                @foreach ($projects as $project )
                <div data-modal-target="{{ $project->id }}" data-modal-toggle="{{ $project->id }}"
                    class="w-1/2 p-2 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5">

                    <x-curator-glider class="h-28 rounded-xl bg-indigo-600 object-cover sm:h-48 md:h-52 lg:h-60"
                        :media="$project->image_cover" />

                    <div class="mt-4 flex justify-between text-sm">
                        <p class="font-medium opacity-100">{{ $project->name }}</p>
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>

                </div>
                <x-project.modal :project='$project' />
                @endforeach
            </div>
        </div>
    </section>

    @if($projects->count() === 0)
    <x-ui.empty-section :auth="'Go to your Dashboard and create a New Project.'" />
    @endif

</x-core.layout>
@endif

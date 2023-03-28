@props([
    'projectCover'  => '',
    'projectTitle'  => '',
    'projectTag'    => '',
    'tagTitle'      => '',
    'tagColor'      => '',
    'tagLink'       => '',
    'tagIcon'       => '',
])
<div class="p-5 filter hover:filter-none opacity-70 hover:opacity-100 transition-all duration-300 hover:-translate-y-3 lg:py-8">
    <div class="absolute z-10 -ml-4 mt-8 text-sm font-semibold text-white">
            <x-portfolio.tag
                :tagLink="$tagLink"
                :tagIcon="$tagIcon"
                :tagTitle="$tagTitle"
                :tagColor="$tagColor"
            />
    </div>
    <div id="project-cover">
       <x-curator-glider :media="$projectCover" class="rounded-2xl" />
    </div>
</div>

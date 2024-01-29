@if($module->newsletter)
<x-core.layout>
    <div class="container mx-auto">
        <div
            class="mx-auto grid items-center justify-center gap-8 rounded-xl border border-secondary-300 bg-secondary-100 px-8 py-4 dark:border-secondary-800 dark:bg-secondary-950 lg:flex lg:justify-between">
            <img class="h-48"
                src="{{ $info->newsletter_section_image ? asset('storage/' . $info->newsletter_section_image) : asset('img/core/svg/developer.svg') }}"
                alt="developer guy image" class="mx-auto h-48 w-32" />
            <span class="text-5xl font-semibold leading-tight tracking-tighter">
                <p>{!! $info->newsletter_section_title !!}</p>
                <p class="text-sm font-normal tracking-normal">
                    {!! $info->newsletter_section_subtitle_text !!}
                </p>
            </span>
            <div>
                <livewire:newsletter :buttonText='$info->newsletter_section_button_text'>
            </div>
        </div>
    </div>
</x-core.layout>
@endif

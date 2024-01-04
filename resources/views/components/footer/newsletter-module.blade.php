<div class="container mx-auto">
    <div
        class="mx-auto border border-secondary-800 grid lg:flex gap-8 mt-36 py-8 px-8 bg-secondary-950 items-center justify-center lg:justify-between rounded-xl">
        <img class="h-48"
            src="{{ $info->newsletter_section_image ? asset('storage/' . $info->newsletter_section_image) : asset('img/SVG/developer.svg') }}"
            alt="whats next" class="w-32 h-32 mx-auto" />
        <span class="text-5xl font-extrabold leading-tight tracking-tighter">
            {!! $info->newsletter_section_title !!}
            <p class="text-sm tracking-normal font-normal">
                {!! $info->newsletter_section_subtitle_text !!}
            </p>
        </span>
        <div>
            <livewire:newsletter :buttonText='$info->newsletter_section_button_text'>
        </div>
    </div>
</div>

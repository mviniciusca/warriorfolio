<div>
    <div class="pb-8">
        <span class="text-2xl lg:text-3xl font-extrabold tracking-tight text-zinc-500">
            <span>recent</span>
            <span class="main-gradient-text">certifications</span>
        </span>
    </div>
    <div class="grid items-stretch">
        @foreach ($courses as $item )
            <x-ui.timeline
                :course="$item->course"
                :university="$item->university"
                :conclusion_date="$item->conclusion_date"
                    />
        @endforeach
    </div>
</div>

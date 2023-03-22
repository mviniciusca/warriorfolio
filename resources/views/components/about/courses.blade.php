<div>
    <div class="pb-8">
        @if($courses->count() !== null)
        <span
            class="text-2xl font-extrabold tracking-tight text-zinc-500 lg:text-3xl">
            <span>recent</span>
            <span class="main-gradient-text">certifications</span>
        </span>
    </div>
    <div class="grid items-stretch">
        {{-- Courses List --}}
            @foreach ($courses as $item)
                <x-ui.timeline
                :course="$item->course"
                :university="$item->university"
                :conclusion_date="$item->conclusion_date"
                />
            @endforeach
         @else
        {{-- Empty Section --}}
            <x-ui.empty-section
                :btn_icon="'add-circle-outline'"
                :btn_text="'add certification'"
                :link_path="'/certifications'"
                :empty_icon="'school-outline'"
                :empty_message="'you have no certifications yet'"
            />
        @endif
    </div>
</div>

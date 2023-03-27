@props([
    'tagIcon'  => '',
    'tagLink'  => '',
    'tagTitle' => '',
    'tagColor' => '#2D3748', // zinc-900
])
<a href="{{ $tagLink }}">
   <div class="mb-2 flex items-center gap-1 p-1 rounded-md" style="background-color:{{ $tagColor }}">
        <div class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentcolor" viewBox="0 0 512 512">
                {!! html_entity_decode($tagIcon) !!}
            </svg>
        </div>
        <div class="lowercase">{{ $tagTitle }}</div>
    </div>
</a>


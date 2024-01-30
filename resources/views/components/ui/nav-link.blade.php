@props(['href' => '#', 'text' => '', 'target' => '_self'])

<a href="{{ $href }}" target="{{ $target }}">
    <button
        class="mx-2 flex cursor-pointer flex-wrap items-center gap-1 border-b-2 border-b-primary-500 border-opacity-0 px-1 pb-3 text-sm font-bold transition-all duration-100 hover:border-opacity-100 hover:font-bold hover:text-primary-500 hover:opacity-90 active:opacity-25">
        {{ $text }}
        @if($target == '_blank')
        <ion-icon class="h-4 w-4" name="trending-up-outline"></ion-icon>
        @endif
    </button>
</a>

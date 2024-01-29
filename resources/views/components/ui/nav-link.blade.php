@props(['href' => '#', 'text' => '', 'target' => '_self'])

<a href="{{ $href }}" target="{{ $target }}">
    <button
        class="z-10 mx-2 cursor-pointer border-b-2 border-b-primary-500 border-opacity-0 px-1 pb-3 text-sm font-bold transition-all duration-100 hover:border-opacity-100 hover:font-bold hover:text-primary-500 hover:opacity-90 active:opacity-25">
        {{ $text }}
    </button>
</a>

@props(['href' => '#', 'text' => '', 'target' => '_self'])
<a target="{{ $target }}" href="{{ $href }}"
    class="mr-2 px-2 pb-2 hover:text-primary-500 cursor-pointer border-b-2 border-b-primary-500 border-opacity-0 hover:border-opacity-100 active:opacity-30 transition-all duration-100">
    {{ $text }}
</a>
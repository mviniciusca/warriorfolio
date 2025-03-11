@props(['href' => '#', 'text' => '', 'target' => '_self'])

<a href="{{ $href }}" target="{{ $target }}">
    <button
        class="flex flex-initial cursor-pointer items-center gap-1 rounded-xl bg-transparent px-2 text-sm transition-all duration-200 hover:bg-black hover:text-white active:opacity-10 dark:hover:bg-white dark:hover:text-black">
        {!! $text !!}
        @if ($target === '_blank')
            <ion-icon class="h-5 w-5" name="trending-up-outline"></ion-icon>
        @endif
    </button>
</a>

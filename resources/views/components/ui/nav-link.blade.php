@props(['href' => '#', 'text' => '', 'target' => null, 'is_menu_highlighted' => false])

<a href="{{ $href }}" target="{{ $target ? '_blank' : '_self' }}">
    <button class="flex lg:mt-0 flex-initial mr-1 max-h-5 cursor-pointer items-center gap-1 rounded-none py-1 px-1 transition-all duration-300 hover:bg-black hover:text-white active:opacity-10 dark:hover:bg-white dark:hover:text-black
        {{ ($is_menu_highlighted ?? false) ? 'bg-white dark:bg-black' : '' }}
        ">
        <p>{!! $text !!}</p>
        @if ($target)
        <ion-icon class="h-5 w-5" name="trending-up-outline"></ion-icon>
        @endif
    </button>
</a>

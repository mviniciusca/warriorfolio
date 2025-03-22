@props(['name', 'href' => null])

<div class="inline-flex">
    @if ($href)
        <a href="https://{{ $href }}" target="_blank">
    @endif
        @if ($name)
                <ion-icon name="{{ 'logo-' . $name }}"
                    class="mr-1 text-xl transition-all duration-300 hover:opacity-30 active:opacity-20">
                </ion-icon>
                @if ($href)
                    </a>
                @endif
        @endif
</div>

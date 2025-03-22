@props(['name', 'href' => null])

<div class="inline-flex">
    @if ($href)
        <a href="https://{{ $href }}" target="_blank">
    @endif
        @if ($name)
                <ion-icon name="{{ 'logo-' . $name }}"
                    class="mr-1 text-2xl transition-all duration-300 hover:opacity-30 active:opacity-10">
                </ion-icon>
                @if ($href)
                    </a>
                @endif
        @endif
</div>

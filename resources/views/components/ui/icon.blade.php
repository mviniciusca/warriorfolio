@props(['name' => '', 'href' => null])

<div class="inline-flex">
    @if ($href)
        <a href="https://{{ $href }}" target="_blank">
    @endif
    @if ($name)
        <ion-icon name="{{ 'logo-' . $name }}"
            class="mr-4 text-2xl transition-all duration-100 hover:opacity-90 active:opacity-30">
        </ion-icon>
        @if ($href)
            </a>
        @endif
    @endif
</div>

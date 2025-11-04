@props(['name', 'href' => null, 'size' => 'default'])

<div class="inline-flex">
    @if ($href)
    <a href="https://{{ $href }}" target="_blank">
        @endif
        @if ($name)
        <ion-icon name="{{ 'logo-' . $name }}"
            class="{{ $size === 'default' ? 'text-2xl' : ($size === 'big' ? 'text-3xl' : 'text-xl') }} transition-all duration-300 hover:opacity-30 active:opacity-10">
        </ion-icon>
        @if ($href)
    </a>
    @endif
    @endif
</div>

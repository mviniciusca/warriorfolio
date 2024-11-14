@props(['name' => '', 'href' => '#'])

<div class="inline-flex">
    <a href="https://{{ $href ?? '#' }}" target="_blank">
        @if($name)
        <ion-icon name="{{ 'logo-' . $name }}"
            class="mr-4 cursor-pointer text-3xl opacity-60 transition-all duration-100 hover:opacity-90">
        </ion-icon>
    </a>
    @endif
</div>
@props(['name' => '', 'href' => '#'])
<div>
    <a href="{{ $href ?? '#' }}" target="_blank">
        <ion-icon name="{{ $name }}"
            class="text-2xl cursor-pointer mr-4 transition-all duration-100 hover:opacity-90 opacity-60">
        </ion-icon>
    </a>
</div>

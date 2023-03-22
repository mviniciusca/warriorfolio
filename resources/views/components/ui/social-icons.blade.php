@props(['social_network', 'link'])
<div class="inline-block lg:p-2 p-3">
    <a href="{{ $link }}">
        <span class="text-xl md:text-2xl hover:opacity-80 hover:cursor-pointer">
            <ion-icon name="logo-{{ $social_network }}"></ion-icon>
        </span>
    </a>
</div>

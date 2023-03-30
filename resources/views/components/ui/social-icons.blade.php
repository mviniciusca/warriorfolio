@props(['social_network', 'link'])

{{-- Social Media Links --}}
<div class="inline-block px-1">
    <a href="{{ $link }}">
        <span class="text-xl text-zinc-300 md:text-2xl hover:opacity-30 active:opacity-70 hover:cursor-pointer transition-all duration-200">
            <ion-icon name="logo-{{ $social_network }}"></ion-icon>
        </span>
    </a>
</div>

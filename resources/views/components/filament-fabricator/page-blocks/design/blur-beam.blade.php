@aware(['page'])
@props(['color' => 'pink'])

<div class="relative">
    <div class="{{ $color === 'white' ? ' invert dark:invert-0' : '' }} {{ $color !== 'blur' ? '-mt-7 md:-mt-9' : '-mt-4 sm:-mt-2 md:-mt-8 lg:-mt-16' }} absolute left-1/2 h-12 w-full -translate-x-1/2 transform animate-pulse bg-contain bg-center bg-no-repeat"
        style="background-image:url({{ asset('img/core/core-ui-elements/beams/' . $color . '-beam.png') }})">
    </div>
</div>

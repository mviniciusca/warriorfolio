@aware(['page'])
@props(['color' => 'pink'])

<div class="relative">
    <div class="{{ $color === 'white' ? ' invert dark:invert-0' : '' }} absolute left-1/2 -mt-9 h-12 w-full -translate-x-1/2 transform animate-pulse bg-contain bg-center bg-no-repeat"
        style="background-image:url({{ asset('img/core/core-ui-elements/beams/' . $color . '-beam.png') }})">
    </div>
</div>

@aware(['page'])
@props(['color' => null])

<div class="{{ $color === 'blur' ? 'bg-center bg-contain h-48' : 'h-12' }} absolute -z-10 -mt-10 w-full animate-pulse bg-contain bg-bottom bg-no-repeat"
    style="background-image: url('{{ asset('img/core/core-ui-elements/beams/' . $color . '-beam.png') }}')">
</div>

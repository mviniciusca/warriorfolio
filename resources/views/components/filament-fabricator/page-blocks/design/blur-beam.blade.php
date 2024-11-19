@aware(['page'])
@props(['color' => null])

<div class="absolute -z-10 -mt-10 {{ $color === 'blur' ? 'h-44' : 'h-12'}} w-full animate-pulse bg-contain bg-bottom bg-no-repeat"
    style="background-image: url('{{ asset('img/core/core-ui-elements/beams/' . $color.'-beam.png') }}')">
</div>
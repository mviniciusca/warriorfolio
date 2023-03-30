@props(['background'])

{{-- Hero Background Set by user--}}
<div class="absolute -z-50 filter inset-0 flex items-start justify-center">
  @if ($background !== null)
    <x-curator-glider :media="$background->background_image" />
  @endif
</div>

{{-- Main Background Set by default --}}
@if(!$background)
  <div class="absolute -z-50 filter inset-0 flex items-start justify-center mt-28 md:-mt-2 lg:mt-0">
    <img src="{{ asset('/img/lights.png') }}" alt="Hero Background Image" >
  </div>
@endif

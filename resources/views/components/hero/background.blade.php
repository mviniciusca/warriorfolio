{{-- Hero Background Image --}}
<div class="absolute -z-50 filter inset-0 flex items-start justify-center">
  @if ($background->background_image !== null)
    <x-curator-glider :media="$background->background_image" />
  @endif
</div>

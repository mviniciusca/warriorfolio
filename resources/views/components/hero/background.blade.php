{{-- Hero Background Image --}}
<div class="absolute -z-50 filter">
    @if ($background->background_image !== null)
        <x-curator-glider
            :media="$background->background_image"
        />
    @endif
</div>

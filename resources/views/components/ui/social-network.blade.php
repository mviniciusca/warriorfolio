<div>

    @foreach ($items as $social )
    @if($$social['is_active'])
    <x-ui.icon :href="$social['profile_link']" :name="$social['social_network']" />
    @endif
    @endforeach

    {{-- Empty Section --}}
    {{-- @if(empty($social->twitter) && empty($social->linkedin) && empty($social->facebook) && empty($social->dribbble)
    &&
    empty($social->github) && empty($social->instagram) && empty($social->twitch) && empty($social->youtube) &&
    empty($social->medium) && empty($social->devto))
    <x-ui.empty-section :auth="'Go to your Dashboard and update your Social Network.'" />
    @endif --}}

</div>
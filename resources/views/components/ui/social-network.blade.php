<div>
    @if($social->twitter)
    <x-ui.icon :href="$social->twitter" name="logo-twitter" />
    @endif
    @if($social->linkedin)
    <x-ui.icon :href="$social->linkedin" name="logo-linkedin" />
    @endif
    @if($social->facebook)
    <x-ui.icon :href="$social->facebook" name="logo-facebook" />
    @endif
    @if($social->dribbble)
    <x-ui.icon :href="$social->dribbble" name="logo-dribbble" />
    @endif
    @if($social->github)
    <x-ui.icon :href="$social->github" name="logo-github" />
    @endif
    @if($social->instagram)
    <x-ui.icon :href="$social->instagram" name="logo-instagram" />
    @endif
    @if($social->twitch)
    <x-ui.icon :href="$social->twitch" name="logo-twitch" />
    @endif
    @if($social->youtube)
    <x-ui.icon :href="$social->youtube" name="logo-youtube" />
    @endif
    @if($social->medium)
    <x-ui.icon :href="$social->medium" name="logo-medium" />
    @endif
    @if($social->devto)
    <x-ui.icon :href="$social->devto" name="devto" />
    @endif

    {{-- Empty Section --}}
    @if(empty($social->twitter) && empty($social->linkedin) && empty($social->facebook) && empty($social->dribbble) &&
    empty($social->github) && empty($social->instagram) && empty($social->twitch) && empty($social->youtube) &&
    empty($social->medium) && empty($social->devto))
    <x-ui.empty-section :auth="'Go to your Dashboard and update your Social Network.'" />
    @endif

</div>

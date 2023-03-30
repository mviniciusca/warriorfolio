@props(['profile'])

<!-- Github -->
@if($profile->github_link)
    <x-ui.social-icons :social_network="'github'" :link="$profile->github_link" />
@endif
<!-- LinkedIn -->
@if($profile->linkedin_link)
    <x-ui.social-icons :social_network="'linkedin'" :link="$profile->linkedin_link" />
@endif
<!-- Dribbble -->
@if($profile->dribbble_link)
    <x-ui.social-icons :social_network="'dribbble'" :link="$profile->dribbble_link" />
@endif
<!-- Twitter -->
@if($profile->twitter_link)
    <x-ui.social-icons :social_network="'twitter'" :link="$profile->twitter_link" />
@endif
<!-- Facebook -->
@if($profile->facebook_link)
    <x-ui.social-icons :social_network="'facebook'" :link="$profile->facebook_link" />
@endif
<!-- Instagram -->
@if($profile->instagram_link)
    <x-ui.social-icons :social_network="'instagram'" :link="$profile->instagram_link" />
@endif
<!-- Medium -->
@if($profile->medium_link)
    <x-ui.social-icons :social_network="'medium'" :link="$profile->medium_link" />
@endif



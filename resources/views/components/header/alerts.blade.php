@props(['maintenance' => null, 'discovery' => null])

{{-- Discovery Mode Alert --}}
@if($maintenance && ($discovery && auth()->user()))
<x-ui.alert :icon="'earth-outline'" :id="'discovery-alert'">
    <strong class="font-bold">{{ __('Discovery Mode') }}</strong>
    {{__('is actived now. You can see all the features of this website but still in Maintenance Mode for the public or if you are not logged in.')}}
</x-ui.alert>
@endif
{{-- End Discovery Mode Alert --}}

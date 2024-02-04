@props(['maintenance' => null, 'discovery' => null])

{{-- Messaging Hub --}}

@foreach ($alerts as $alert)
<livewire:alert wire:key="$alert->id" :style='$alert->style' :id="$alert->id" :message="$alert->message"
    :is_active="$alert->is_active" :is_dismissible="$alert->is_dismissible" />
@endforeach






{{-- Core Message : Discovery Mode Alert --}}
@if($maintenance && ($discovery && auth()->user()))
<x-ui.alert :icon="'earth-outline'" :id="'discovery-alert'">
    <strong class="font-bold">{{ __('Discovery Mode') }}</strong>
    {{__('is actived now. You can see all the features of this website but still in Maintenance Mode for the public or if you are not logged in.')}}
</x-ui.alert>
@endif
{{-- End Core Message : Discovery Mode Alert --}}

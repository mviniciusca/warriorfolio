@props(['maintenance' => null, 'discovery' => null, 'button_text' => null])

{{-- Messaging Hub --}}
@foreach ($alerts as $alert)
<livewire:alert wire:key="$alert->id" :style='$alert->style' :id="$alert->title" :message="$alert->message"
    :is_active="$alert->is_active" :is_dismissible="$alert->is_dismissible" :button_text="$alert->button_text" />
@endforeach


{{-- Core Message : Discovery Mode Alert --}}
@if($maintenance && ($discovery && auth()->user()))
<livewire:alert :icon="'earth-outline'" :style="'banner'" :id="'discovery-alert'"
    :message="'Discovery Mode is Active. The website is Maintenance Mode but still visible to you under your login session.'"
    :is_active="true" />
@endif
{{-- End Core Message : Discovery Mode Alert --}}
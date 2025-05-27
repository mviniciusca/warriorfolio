@props(['maintenance' => null, 'discovery' => null, 'alerts' => []])

{{-- Messaging Hub --}}
@foreach ($alerts as $alert)
<x-ui.alert :id="$alert->id" :style="$alert->style" :icon="$alert->icon" :is_dismissible="$alert->is_dismissible"
    :button_text="$alert->button_text" :display="$alert->display" :is_active="$alert->is_active">
    {!! $alert->message !!}
</x-ui.alert>
@endforeach


{{-- Core Message: Discovery Mode Alert --}}
@if ($maintenance && ($discovery && auth()->user()))
<x-ui.alert :icon="'telescope-sharp'" :style="'banner'" :id="'discovery-alert'">
    <div class="flex items-center gap-2">
        <span class="bg-warning-500 animate-pulse block h-1 w-1 rounded-full"></span>
        {{ __('Discovery Mode is active. Although the website is in Maintenance Mode, it remains visible due to your
        authenticated session.') }}
    </div>
</x-ui.alert>
@endif

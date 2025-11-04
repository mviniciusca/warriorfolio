@props(['maintenance' => null, 'discovery' => null, 'alerts' => []])

{{-- Messaging Hub from Livewire Component --}}
@foreach ($alerts as $alert)
@livewire('alert', [
'id' => $alert->id,
'style' => $alert->style,
'icon' => $alert->icon,
'is_dismissible' => $alert->is_dismissible,
'button_text' => $alert->button_text,
'is_active' => $alert->is_active,
'message' => $alert->message
])
@endforeach

{{-- Core Message: Discovery Mode Alert --}}
@if ($maintenance && ($discovery && auth()->user()))
<x-ui.alert :style="'banner'" :id="'discovery-alert'">
    <div class="flex items-center gap-2">
        <span
            class="saturn-bg-inverse animate-pulse block h-1 w-1 p-0.5 ring ring-saturn-500/50 border saturn-border-inverse  rounded-full"></span>
        {{ __('Discovery Mode is active. Although the website is in Maintenance Mode, it remains visible due to your
        authenticated session.') }}
    </div>
</x-ui.alert>
@endif

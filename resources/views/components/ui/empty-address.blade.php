@props(['data'])

<x-ui.contact-icon />

@if (empty(array_filter([
data_get($data, 'google_map'),
data_get($data, 'address'),
data_get($data, 'phone'),
data_get($data, 'email'),
])
))
<x-ui.empty-section :auth="__('Update your Contact Section.')" />
@endif

@props(['data'])

<x-ui.contact-icon />

@if (empty(array_filter([
data_get($data, 'contact.google_maps_code'),
data_get($data, 'contact.public_address'),
data_get($data, 'contact.public_phone'),
data_get($data, 'contact.public_email'),
])
))
<x-ui.empty-section :auth="__('Update your Contact Section.')" />
@endif

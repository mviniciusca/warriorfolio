@props(['data'])

<x-ui.contact-icon />

@if (empty(array_filter([
            data_get($data, 'google_maps_code'),
            data_get($data, 'public_address'),
            data_get($data, 'public_phone'),
            data_get($data, 'public_email'),
        ])
    ))
    <x-ui.empty-section :auth="__('Update your Contact Section.')" />
@endif

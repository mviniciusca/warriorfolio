@props(['data'])

<x-ui.contact-icon />

@if(data_get($data, 'contact.google_maps_code') == null &&
data_get($data, 'contact.public_adress') == null &&
data_get($data, 'contact.public_phone') == null &&
data_get($data, 'contact.public_email') == null)
<x-ui.empty-section :auth="__('Go to your Dashboard and update your Contact Section.')" />
@endif
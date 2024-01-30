@props(['info'])

<x-ui.contact-icon />

@if($info->contact_section_google_map == null && $info->contact_section_address == null &&
$info->contact_section_phone == null && $info->contact_section_email == null)
<x-ui.empty-section :auth="'Go to your Dashboard and update your Contact.'" />
@endif

@aware(['page'])

@php
// Retrieve password directly from page settings
$password = $page->advanced_settings['visibility']['access_password'] ?? '';
@endphp

@livewire('password-protected-page', [
'password' => $password,
'pageId' => $page->id
])

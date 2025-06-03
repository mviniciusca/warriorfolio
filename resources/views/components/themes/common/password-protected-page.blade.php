@aware(['page'])

@php
// Retrieve password directly from page field
$password = $page->access_password ?? '';
@endphp

@livewire('password-protected-page', [
'password' => $password,
'pageId' => $page->id
])

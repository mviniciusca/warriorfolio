@props(['profile'])

<div>
    {{-- Profile About --}}
    @if($profile->about !== null)
        {!! $profile->about !!}
    @else
    {{-- Empty Section --}}
    <x-ui.empty-section
        :btn_icon="'add-circle-outline'"
        :btn_text="'Add Bio'"
        :link_path="'/admin/profile-settings/'"
        :empty_icon="'document-text-outline'"
        :empty_message="'You have not added a bio yet'"
    />
    @endif
</div>

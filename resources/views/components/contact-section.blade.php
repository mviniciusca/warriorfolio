{{-- Contatct Section : This section will show a contact form  --}}
<x-content-section
    :nav_id="'contact'"
    :title='$contact_title'
    :subTitle='$contact_description'
>

 {{-- Livewire Form --}}
 <livewire:mail/>

</x-content-section>

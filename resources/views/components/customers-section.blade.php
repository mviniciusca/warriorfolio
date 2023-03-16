{{-- Customers Section: This section will show the brands of the customers you have worked for. --}}
<x-content-section
    :nav_id="'customers'"
    :title='$customers_title'
    :subTitle='$customers_description'
>
{{-- Customers Brands Grid --}}
<div class="grid justify-center items-center grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4">
    @foreach ($customers as $customer)
        <x-ui.brands
            :cover="$customer->customer_logo"
        />
    @endforeach
</div>

{{--Empty Section --}}
    @if($customers->count() === 0)
        <x-ui.empty-section
            :btn_icon="'add-outline'"
            :btn_text="'Add Customer'"
            :empty_message="'You have no customers yet'"
            :empty_icon="'person-add-outline'"
            :link_path="'/admin/customers/create'"
        />
    @endif

</x-content-section>

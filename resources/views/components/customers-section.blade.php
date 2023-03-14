<x-content-section
:title='$customers_title'
:subTitle='$customers_description'
>
    <div class="grid justify-center items-center grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4">

    @foreach ($customers as $customer)
        <x-ui.brands
            :cover="$customer->customer_logo"
        />
    @endforeach

 </div>
</x-content-section>

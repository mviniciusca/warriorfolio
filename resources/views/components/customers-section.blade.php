<x-content-section
:title="'trusted by'"
>
    <div class="grid grid-cols-4 gap-8 justify-center items-center">

    @foreach ($customers as $customer)
        <x-ui.brands
            :cover="$customer->customer_logo"
        />
    @endforeach
 </div>
</x-content-section>

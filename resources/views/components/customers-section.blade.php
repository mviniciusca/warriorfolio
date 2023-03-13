<x-content-section
:title="'trusted by'"
:subTitle="'Trabalhei com uma ampla variedade de clientes, desde pequenas startups a grandes empresas.
Cada um com suas necessidades e objetivos únicos, entregando projetos personalizados que superam as expectativas dos clientes.'"
>
    <div class="grid justify-center items-center grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4">

    @foreach ($customers as $customer)
        <x-ui.brands
            :cover="$customer->customer_logo"
        />
    @endforeach
 </div>
</x-content-section>

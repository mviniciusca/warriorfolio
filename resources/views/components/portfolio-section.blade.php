<x-content-section
:title="'from dribbble to vercel'"
:class="'grid'"
:subTitle="'Meu portfólio inclui uma variedade de projetos que demonstro habilidades em desenvolvimento web e design. Cada projeto foi criado com atenção aos detalhes e às necessidades do cliente. De websites responsivos a aplicativos interativos, meu portfólio mostra minha experiência em criar soluções digitais para diferentes desafios.'"
>

<div class="grid grid-cols-4 justify-center items-center gap-8">

    @foreach ($projects as $project )
            <x-ui.portfolio
            :cover="$project->cover"
            :title="$project->title"
            :tag="$project->tag"
            :link="$project->link"
            :about="$project->about"
            />
    @endforeach

</div>
</x-content-section>

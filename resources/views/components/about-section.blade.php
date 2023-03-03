<x-content-section
:title="'About Me'"
:class="'grid'"
>
{{-- ajustar o flex do component pai --}}
<div class="grid grid-cols-2 gap-28">


        <div class="leading-10 p-4 pt-0">

        <div id="avatar" class="w-full grid justify-center align-center mb-16">
            <div class="bg-zinc-900 border border-zinc-800 rounded-full h-32 w-32"></div>
        </div>

         <div>
            Eu sou um desenvolvedor de software apaixonado por aviação, com mais de 2 anos de experiência em programação. Tenho habilidades especializadas em linguagens como PHP, Laravel e Opencart. Sou formado pela Embraer e pela Faculdade XP como desenvolvedor Python, o que me deu uma ampla base de conhecimento em diferentes áreas da programação. Me especializei em desenvolvimento backend, onde tenho forte conhecimento em arquitetura de software, bancos de dados e outras tecnologias importantes para criar aplicativos robustos e escaláveis. Com minha experiência em várias linguagens de programação e habilidades em desenvolvimento fullstack, tenho orgulho de trabalhar em projetos desafiadores e de alta qualidade, oferecendo soluções criativas para problemas complexos e entregando resultados confiáveis e de alto desempenho. Além disso, com minha paixão pela aviação e formação na Embraer, estou sempre em busca de novas oportunidades para aplicar minhas habilidades em tecnologia em projetos relacionados à aviação e outras áreas afins.
         </div>
        </div>

        <div class="bg-zinc-900 grid justify-center p-8">

        <span class="text-4xl tracking-tight font-extrabold text-zinc-500 pb-8">
            timeline:
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
           certificates
            </span>
        </span>

            <x-ui.timeline
            :course="'Embraer Tech Carrers 2022'"
            :university="'Faculdade XP'"
            :date="'12/2022'"
            />
            <x-ui.timeline
            :course="'Python'"
            :university="'USP'"
            :date="'11/2022'"
            />
            <x-ui.timeline
            :course="'Técnico Informática'"
            :university="'FAETEC/RJ'"
            :date="'12/2006'"
            />

        </div>

    </div>
</x-content-section>

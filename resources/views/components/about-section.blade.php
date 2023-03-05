<x-content-section :title="'about me'" :class="'flex'">
    <div id="about-content-layout" class="flex justify-center gap-24">

        <div class="flex w-1/4 justify-center p-4 ">

            <div>

                    <div id="avatar-section">

                        <div id="main-picture" class="justify-center flex">
                            <div class="bg-zinc-900 rounded-full w-52 h-52 bg-[url('http://localhost:8000/storage/media/cc0c277a-3c19-4d3b-9edc-7b3681a2523b.jpg')] filter grayscale bg-no-repeat bg-cover bg-center"></div>
                        </div>

                    </div>

                 <div class="mt-8 flex justify-center items-center flex-wrap gap-2 p-4">
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">php</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">docker</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">laravel</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">devops</div>
                    <div class="text-white text-sm font-semibold border border-zinc-800 bg-zinc-900 p-1 w-1/10">python</div>
                </div>


            </div>



        </div>

        <div id="about" class="w-1/3 p-4">

            <div class="leading-loose text-zinc-300">
                Eu sou um desenvolvedor de software apaixonado por aviação, com mais de 2 anos de experiência em
                programação. Tenho habilidades especializadas em linguagens como PHP, Laravel e Opencart. Sou formado
                pela Embraer e pela Faculdade XP como desenvolvedor Python, o que me deu uma ampla base de conhecimento
                em diferentes áreas da programação. Me especializei em desenvolvimento backend, onde tenho forte
                conhecimento em arquitetura de software, bancos de dados e outras tecnologias importantes para criar
                aplicativos robustos e escaláveis. Com minha experiência em várias linguagens de programação e
                habilidades em desenvolvimento fullstack, tenho orgulho de trabalhar em projetos desafiadores e de alta
                qualidade, oferecendo soluções criativas para problemas complexos e entregando resultados confiáveis e
                de alto desempenho. Além disso, com minha paixão pela aviação e formação na Embraer, estou sempre em
                busca de novas oportunidades para aplicar minhas habilidades em tecnologia em projetos relacionados à
                aviação e outras áreas afins.
            </div>

        </div>
        <div id="timeline" class="w-1/4">
            <div class="grid justify-center p-4">

                <span class="pb-8 text-3xl font-extrabold tracking-tight text-zinc-500">
                    recent
                    <span class="bg-gradient-to-r from-orange-400 to-pink-500 bg-clip-text text-transparent">
                        certifications
                    </span>
                </span>

                @foreach ($courses as $course)
                    <x-ui.timeline :course="$course->course" :university="$course->university" :conclusion_date="$course->conclusion_date" />
                @endforeach

            </div>

        </div>
    </div>

    </div>
</x-content-section>

{

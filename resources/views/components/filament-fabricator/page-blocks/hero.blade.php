@aware(['page'])
<div class="bg-hero absolute w-full h-full -z-10 bg-cover bg-center"
    style="background-image: url('{{ asset('storage/' .  $hero['background_image'] ) }}')">
</div>
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <section>
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <div class="text-center max-w-7xl mt-48">
                    <h1
                        class="title-font animate__animated animate__fadeInUp animate__delay-1s  text-8xl mb-4 font-bold dark:text-white tracking-tighter leading-tighter">
                        {!! $info['hero_section_title'] !!}
                    </h1>
                    <p
                        class="animate__animated animate__fadeInUp animate__delay-2s mb-8 text-3xl dark:text-white shadow-current tracking-tighter leading-tight">
                        {!! $info['hero_section_subtitle_text'] !!}
                    </p>
                    <div class="flex justify-center animate__animated animate__fadeInUp animate__delay-3s">
                        <button
                            class="inline-flex text-secondary-50 dark:bg-primary-500 border-0 py-2 px-6 focus:outline-none dark: hover:bg-primary-600 rounded text-lg">
                            <ion-icon name="chevron-down-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

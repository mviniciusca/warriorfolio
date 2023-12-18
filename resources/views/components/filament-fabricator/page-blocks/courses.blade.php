@aware(['page'])
<section class="w-full bg-secondary-950 py-24 my-24">
    <div class="px-4 py-4 md:py-8">
        <div class="max-w-7xl mx-auto">
            <div class="header-title">tell about <span class="text-highlight">yourself</span>.</div>
            <div class="flex mt-24">
                {{-- Profile Section --}}
                <div class="p-8 w-full md:w-1/4 text-center" id="profile">
                    <div
                        class="bg-secondary-300 h-40 w-40 rounded-full p-1 mx-auto mb-12 bg-gradient-to-tl from-primary-400 to-rose-600">
                        <div class="bg-secondary-50 bg-cover transition-all duration-100 filter grayscale hover:grayscale-0 h-full w-full rounded-full p-2 mx-auto mb-12"
                            style="background-image:url('{{ asset('storage/') }}')">
                            <div class="absolute bg-secondary-50 text-primary-500 text-xs p-1 ml-6 mt-32 ">
                                Open to Work
                            </div>
                        </div>
                    </div>
                    <p class="text-xl tracking-tight font-semibold"></p>
                    <p class="text-sm tracking-tight mb-8"></p>
                    <div class="flex mx-auto justify-center ">
                        <x-ui.icon name="logo-twitter" />
                        <x-ui.icon name="logo-linkedin" />
                        <x-ui.icon name="logo-github" />
                        <x-ui.icon name="logo-instagram" />
                        <x-ui.icon name="logo-medium" />
                    </div>
                    <div class="mt-8">
                        <a href=""
                            class="inline-flex items-center align-middle gap-2 px-4 py-2 text-sm font-medium text-secondary-500 bg-white border border-secondary-200 rounded-lg hover:bg-secondary-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-secondary-200 focus:text-primary-700 dark:bg-primary-500 dark:text-secondary-50 dark:border-secondary-950 dark:hover:text-primary-500 dark:hover:bg-secondary-50 dark:focus:ring-primary-100">
                            <ion-icon class="text-2xl" name="download-outline"></ion-icon>
                            Curriculum Vitae
                        </a>
                    </div>
                </div>
                {{-- End Profile Section --}}

                <div class="p-12 w-full md:w-2/4 text-md leading-relaxed">Passionate full-stack developer with a knack
                    for crafting
                    seamless,
                    user-centric
                    web
                    applications. Proficient in both
                    front-end and back-end technologies, I bring a creative approach to problem-solving and a
                    commitment
                    to delivering
                    high-quality code. Experienced in diverse tech stacks and frameworks, I thrive in collaborative
                    environments that foster
                    innovation. <p class="my-2"></p> With a keen eye for detail and a dedication to staying current
                    with
                    industry trends, I
                    consistently strive
                    to create robust and scalable solutions. Eager to contribute my skills and enthusiasm to dynamic
                    projects that push the
                    boundaries of web development. Dedicated full-stack developer blending technical expertise with
                    a
                    passion for building intuitive, engaging user
                    experiences. Skilled in HTML, CSS, JavaScript, and adept at server-side languages like Node.js
                    and
                    Python.
                    <p class="my-2"></p>
                    From conceptualization to deployment, I thrive on turning ideas into functional, responsive
                    applications.
                    Detail-oriented and
                    committed to writing clean, efficient code, I'm equally comfortable working on the front end
                    with
                    frameworks like React
                    as I am architecting scalable solutions on the back end. Ready to tackle new challenges and
                    collaborate with
                    cross-functional teams to elevate digital experiences to the next level.
                </div>
                <div class="p-12 w-full md:w-2/4">
                    <ol class="relative border-s border-secondary-200 dark:border-secondary-700">
                        <li class="mb-10 ms-4">
                            <div
                                class="absolute w-3 h-3 bg-secondary-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-secondary-900 dark:bg-secondary-700">
                            </div>
                            <time
                                class="mb-1 text-sm font-normal leading-none text-secondary-400 dark:text-secondary-500">February
                                2022</time>
                            <h3 class="text-lg font-semibold text-secondary-900 dark:text-white">Application UI code
                                in
                                Tailwind CSS</h3>
                            <p class="mb-4 text-base font-normal text-secondary-500 dark:text-secondary-400">Get
                                access
                                to over
                                20+ pages including a
                                dashboard layout, charts, kanban board, calendar, and pre-order E-commerce &
                                Marketing
                                pages.</p>

                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

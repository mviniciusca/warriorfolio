   <nav class="font-bold">

        {{--  Mobile Menu --}}
        <nav class=" lg:hidden">
          <!-- Alpine Show Menu on Click -->
            <div x-data="{ show: false }" class="">
                <button @click="show = !show" class="text-white">
                <ion-icon class="h-9 w-9" name="menu-outline"></ion-icon>
                </button>
                <div x-show="show" class="">

                    <div class="bg-black bg-opacity-95 h-full w-full p-4 mr-auto fixed top-0 right-0 bottom-0 ">

                        <div class="flex justify-end mt-16">

                            <button @click="show = !show" class="text-white justify-end">
                            <ion-icon class="h-9 w-9 justify-end" name="close-outline"></ion-icon>
                            </button>

                        </div>

                        <ul class="grid gap-8 justify-center text-base">
                          <li>github</li>
                          <li>linkedin</li>
                        </ul>
                    </div>
                </div>
        </nav>

        {{-- Desktop Menu --}}
        <nav class=" hidden lg:block">
            github / linkedin
        </nav>

   </nav>

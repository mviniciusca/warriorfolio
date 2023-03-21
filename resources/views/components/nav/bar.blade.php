{{-- Mobile Menu --}}
<nav class="lg:hidden">
    {{-- Alpine JS Menu --}}
    <div x-data="{ show: false }" class="">
        <button @click="show = !show" class="cursor-pointer text-white">
            <ion-icon class="h-9 w-9" name="menu-outline"></ion-icon>
        </button>
        <div x-show="show" class="transition-opacity duration-300 ease-out">
            <div
                class="fixed top-0 right-0 bottom-0 z-50 mr-auto h-full w-full bg-black p-4">
                {{-- Close Button --}}
                <div class="flex justify-end gap-10">
                    <button @click="show = !show"
                        class="cursor-pointer justify-end text-white">
                        <ion-icon class="h-9 w-9 justify-end"
                            name="close-outline"></ion-icon>
                    </button>
                </div>
                {{-- Nav Links Mobile --}}
                <ul class="grid justify-center gap-8 text-2xl">
                    <x-nav.link :links='$links' />
                </ul>
            </div>
        </div>
    </div>
</nav>
{{-- End Mobile Menu --}}

{{-- Desktop Menu --}}
<nav class="lg:text-md hidden font-normal lg:block">
    <ul class="flex gap-4">
        <x-nav.link :links='$links' />
    </ul>
</nav>
{{-- End Desktop Menu --}}

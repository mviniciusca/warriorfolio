{{--Astronaut Background --}}
<div class="hidden absolute top-8 -mt-16 md:mt-0 left-0 right-0 overflow-hidden h-full w-full -z-30 astro-bg filter grayscale bg-no-repeat bg-contain"></div>

{{-- Hero Section --}}
<div class="w-full grid justify-center text-center">

{{--Welcome Text--}}
    <div class="text-center font-bold text-2xl mt-16 leading-tight tracking-tight md:tracking-tighter md:text-4xl md:mt-24 lg:text-6xl lg:mt-60 ">
        building the <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">what's next</span><br>with laravel + <span id="changing-text">ia</span>
    </div>

{{--Sub-title Text--}}
    <div class="mt-3 md:mt-8">
        software developer based in rio de janeiro, brazil
    </div>

{{--Hero Button --}}
    <div class="mt-10 flex items-center justify-center gap-4">
        <a href="#contact" class="bg-orange-500 rounded-sm text-white py-3 px-8 hover:shadow-lg hover:bg-orange-400 transition-all duration-200">
            get in touch
        </a>

    {{-- Visit me on linkedin --}}
    <div>
        <a href="#" target="_blank" class="text-zinc-300 hover:text-orange-400 transition-all duration-200">
            or visit me on linkedin
        </a>
    </div>

</div>

{{--Scripts and Styles--}}
<style>
.astro-bg {
    background-image:url("{{ asset('/img/bg-astro.png') }}");
}
</style>
<script>
let words = ["livewire", "vuejs", "tailwind", "ia"];
let index = 0;
let textElement = document.getElementById("changing-text");

setInterval(function() {
  textElement.innerHTML = words[index];
  index = (index + 1) % words.length;
}, 2500);
</script>

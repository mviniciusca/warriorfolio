{{-- PlanetBG --}}

<div class="planet-bg absolute -z-50 w-full h-[1080px] -mt-16">

<div class="blur-bg bg-repeat-x bg-center absolute w-full h-[700px] -z-40 -mt-[-600px]"></div>
</div>
{{-- Space BG --}}
{{--  <section class="absolute -z-40 left-0 right-0 justify-center h-[900px] bg-gradient-to-t w-full grid overflow-hidden from-black to-black">
<div class="maxw-7xl  h-[600px] justify-center items-center">
    <img src="{{ asset('/img/svg/circles-air.svg') }}" class="animate-spin opacity-50 filter grayscale" style="animation-duration: 30s;" />
</div>
 <div class="blur-bg bg-repeat-x bg-center absolute w-full h-[700px] z-20 mt-96"></div>
</section>  --}}

{{-- Astronault Backgorund --}}
<section class="w-full bg-center bg-no-repeat animate-background custom-height -mt-16 -z-10 astro-bg">
</section>

{{-- Hero Welcome --}}
<div class="px-4 py-4 md:py-8 -mt-[580px]">

{{-- Big Welcome --}}
    <div class="max-w-7xl mx-auto text-6xl text-center font-extrabold tracking-tighter leading-[3.5rem]">
       building the
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
        what's next
        </span><br />
        with laravel
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
         +
        </span>
        <span id="changing-text">ia</span>

    </div>
{{-- End Big Welcome --}}

{{-- Welcome min text --}}
    <div class="mt-16 max-w-7xl mx-auto text-center text-xl lowercase">
        Software Developer based in Rio de Janeiro, Brazil
    </div>
{{-- End Welcome min text --}}

{{-- Stacks Logos --}}
<div class="max-w-7xl mx-auto mt-28">
    <div class="flex gap-16 items-center justify-center">

       <x-ui.stack
       :duration="'3'"
       :filename="'laravel'" />
       <x-ui.stack
       :duration="'4'"
       :filename="'vue'" />
       <x-ui.stack
       :duration="'5'"
       :filename="'tailwind'" />
       <x-ui.stack
       :duration="'5'"
       :filename="'php'" />
       <x-ui.stack
       :duration="'4'"
       :filename="'livewire'" />
       <x-ui.stack
       :duration="'3'"
       :filename="'ai'" />

    </div>
</div>
{{-- End Stack Logos --}}

{{-- Hero Button --}}
{{--  <div class="flex justify-center items-center gap-3 mx-auto mt-28">
    <button class=" p-4 text-lg border  border-orange-800 hover:bg-zinc-900">
        more about me and my work
    </button>
    <span> or say a hello in linkedin</span>
</div>  --}}
{{--  End Hero Button --}}

{{-- End Hero Section --}}
</div>

{{-- Styles, scripts from this section --}}
<style>
  @keyframes moveBackground {
    0% {
      background-position-y: 0;
    }
    50% {
      background-position-y: 10%;
    }
    100% {
      background-position-y: 0%;
    }
  }

 .animate-background {
    animation-name: moveBackground;
    animation-duration: 5s;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
  }

 .astro-bg, .circles-bg {
    background-image:url("{{ asset('/img/bg-astro.png') }}");
    background-repeat: no-repeat;
    background-position: center center;
  }
.circles-bg {
   background-image:url("{{ asset('/img/svg/circles-air.svg') }}");
   background-size:contain;
  }
.blur-bg {
   background-image:url("{{ asset('/img/bg/blur-black.png') }}");
   background-size:contain;
   background-repeat: repeat-x;
  }
.planet-bg{
    background-image:url("{{ asset('/img/bg/bg-orange.png') }}");
   background-size:contain;
   background-position: center center;
   background-repeat: no-repeat;
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

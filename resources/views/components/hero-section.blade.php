{{-- BG Blur --}}

{{--  <section class="absolute -z-40 left-0 right-0 -mt-70  justify-center flex">
<img src="http://localhost:8000/img/bg-blur.svg" class="w-full h-full -mt-56  bg-dark -z-50">
</section>  --}}

{{-- Space BG --}}

<section class="absolute -z-40 left-0 right-0 -mt-30 justify-center flex overflow-hidden">
  <img src="http://localhost:8000/img/circles.svg" class="overflow-hidden animate-spin" style="animation-duration: 40s;">
</section>

{{-- Astronault Backgorund --}}

<section class="w-full bg-[url('http://localhost:8000/img/bg-astro.png')] bg-center bg-no-repeat animate-background custom-height -mt-36 -z-10 ">
</section>

{{-- Hero Welcome --}}

<div class="px-4 py-4 md:py-8 -mt-[680px] ">

{{-- Big Welcome --}}

    <div class="max-w-7xl mx-auto text-7xl text-center font-bold tracking-tighter leading-[3.5rem] drop-shadow">
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
{{-- end Big Welcome --}}

{{-- Welcome min text --}}
    <div class="mt-16 max-w-7xl mx-auto text-center text-xl lowercase">
        Software Developer based in Rio de Janeiro, Brazil
    </div>
{{-- end Welcome min text --}}

{{-- Stacks Logos --}}
<div class="max-w-7xl mx-auto mt-28">
    <div class="flex gap-16 items-center justify-center">

       <x-ui.stack :filename="'laravel'" />
       <x-ui.stack :filename="'vue'" />
       <x-ui.stack :filename="'tailwind'" />
       <x-ui.stack :filename="'php'" />
       <x-ui.stack :filename="'livewire'" />
       <x-ui.stack :filename="'ai'" />

    </div>
</div>
{{-- End Stack Logos --}}

{{-- Hero Button --}}
<div class="flex justify-center items-center gap-3 mx-auto mt-28">
    <button class=" p-4 text-lg border  border-orange-800 hover:bg-zinc-900">
        more about me and my work
    </button>
    <span> or say a hello in linkedin</span>
</div>
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
      background-position-y: 15%;
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

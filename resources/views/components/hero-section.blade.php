<section class="absolute -z-40 left-0 right-0 -mt-70  justify-center flex">
<img src="http://localhost:8000/img/bg-blur.svg" class="w-full h-full -mt-56  bg-dark -z-50">
</section>

{{-- Space BG --}}
<section class="absolute -z-40 left-0 right-0 mt-20  justify-center flex">
<img src="http://localhost:8000/img/circles.svg" class="w-full h-full-z-30">
</section>

{{-- Astronault Backgorund --}}

<section class="w-full bg-[url('http://localhost:8000/img/bg-astro.png')] bg-center bg-no-repeat animate-background custom-height -mt-36 -z-10 ">
</section>

{{-- Hero Welcome --}}


<div class="px-4 py-4 md:py-8 -mt-[680px] ">

{{-- Welcome --}}
    <div class="mb-16 max-w-7xl mx-auto text-center text-xl">
    Fullstack Developer based in Rio de Janeiro, Brazil
    </div>
{{-- end Welcome --}}

{{-- Big Welcome --}}

    <div class="max-w-7xl mx-auto text-7xl text-center font-bold tracking-tighter leading-[3.5rem] drop-shadow">
       building the
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
        next
        </span><br />
        with laravel
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
         +
        </span>

        <span id="changing-text">ia</span>

    </div>
{{-- end Big Welcome --}}



<div class="max-w-7xl mx-auto mt-28">
    <div class="flex gap-16 items-center justify-center">

        <div class=" h-20 w-20 p-5 flex items-center justify-center rounded-full border-2 border-dashed border-zinc-500">
            <img src="http://localhost:8000/img/laravel.png" width="100%" height="100%" />
        </div>
        <div class=" h-20 w-20 p-5 flex items-center justify-center rounded-full border-2 border-dashed border-zinc-500">
            <img src="http://localhost:8000/img/vue.png" width="100%" height="100%" />
        </div>
        <div class=" h-20 w-20 p-5 flex items-center justify-center rounded-full border-2 border-dashed border-zinc-500">
            <img src="http://localhost:8000/img/tailwind.png"width="100%" height="100%" />
        </div>
        <div class=" h-20 w-20 p-5 flex items-center justify-center rounded-full border-2 border-dashed border-zinc-500">
            <img src="http://localhost:8000/img/php.png" width="100%" height="100%" />
        </div>
        <div class=" h-20 w-20 p-5 flex items-center justify-center rounded-full border-2 border-dashed border-zinc-500">
            <img src="http://localhost:8000/img/livewire.png" width="100%" height="100%" />
        </div>
        <div class=" h-20 w-20 p-5 flex items-center justify-center rounded-full border-2 border-dashed border-zinc-500">
            <img src="http://localhost:8000/img/ai.png" width="100%" height="100%" />
        </div>
    </div>

</div>

{{-- end Hero --}}
</div>

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

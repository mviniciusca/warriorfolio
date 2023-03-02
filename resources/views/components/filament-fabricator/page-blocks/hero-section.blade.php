@aware(['page'])

{{-- Astronault Backgorund --}}
<section class="w-full bg-[url('http://localhost:8000/img/bg-astro.png')] bg-center bg-no-repeat animate-background custom-height -mt-36 -z-10 ">
</section>

{{-- Hero Welcome --}}
<div class="px-4 py-4 md:py-8 -mt-[540px] ">

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

{{-- Welcome --}}
    <div class="pt-16 max-w-7xl mx-auto  text-center">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit ipsum perferendis impedit consectetur ex error! Eum sequi sapiente tempore illo incidunt ducimus facilis. Beatae est blanditiis, eius harum perferendis cum.
    </div>
{{-- end Welcome --}}

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

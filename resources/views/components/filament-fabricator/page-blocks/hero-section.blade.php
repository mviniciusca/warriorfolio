@aware(['page'])
{{-- Astro --}}
<section class="w-full bg-[url('http://localhost:8000/img/bg-astro.png')] bg-center bg-no-repeat animate-background custom-height -mt-36 -z-10 ">
</section>

{{-- Hero Welcome --}}
<div class="px-4 py-4 md:py-8 -mt-[540px] text-7xl text-center font-bold tracking-tighter leading-[3.5rem] drop-shadow">
    <div class="max-w-7xl mx-auto">
        building the
        <span class="text-transparent bg-clip-text bg-gradient-to-br from-pink-500 to-yellow-500">
        what's next
        </span><br />
        with laravel & typescript
    </div>
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


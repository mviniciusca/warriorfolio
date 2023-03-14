<x-hero.background />

<x-content-section>
    <x-hero.welcome />
    <x-ui.stacks-icons />
</x-content-section>

{{-- Styles, scripts from this section --}}
<style>

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

</style>



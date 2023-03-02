@aware(['page'])
<section class="absolute -z-10 w-screen h-screen bg-gray-900 bg-[url('https://images.unsplash.com/photo-1581822261290-991b38693d1b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80')] bg-center bg-cover animate-background">
  <div class="flex items-center justify-center h-full">
    <div class="max-w-7xl font-sans text-center lowercase font-bold text-7xl tracking-tighter leading-[3.5rem] text-gray-50">
       construindo o <span class="text-indigo-500">próximo novo </span><br> com Laravel e Typescript
    </div>
  </div>
</section>

<style>
  @keyframes moveBackground {
    0% {
      background-position-y: 0;
    }
    50% {
      background-position-y: 20%;
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


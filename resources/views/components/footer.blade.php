                    </div>
                </div>
        </div>
</div>

{{-- Footer --}}
<footer class="mt-12 mb-2 text-md">

     {{-- Footer BG --}}
     <div class="absolute -z-50 w-full min-h-[600px] opacity-100 filter grayscale mt-[-500px] bg-footer bg-contain bg-no-repeat bg-center">
     </div>

   <div class="max-w-7xl mx-auto pt-16 grid-cols-3 grid gap-28 justify-start  text-zinc-400 mb-10 ">

{{-- App Logo --}}
       <x-ui.logo />

{{-- Footer Middle Info --}}
       <div class="flex justify-center gap-2">
            <span>made with</span>
            <span class="text-orange-500"><ion-icon name="heart"></ion-icon></span>
            <span>in rio de janeiro</span>
       </div>

{{-- Footer Social Icons --}}
       <div class="flex gap-4 justify-end">
            <span class="text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-github"></ion-icon></span>
            <span class="text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-linkedin"></ion-icon></span>
            <span class="text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-twitter"></ion-icon></span>
            <span class="text-2xl hover:opacity-80 hover:cursor-pointer"><ion-icon name="logo-medium"></ion-icon></span>
       </div>
{{-- End Footer --}}
    </div>
</footer>
<style>
.bg-footer {
    background-position: center center;
    background-repeat: no-repeat;
    background-image:url("{{ asset('/img/lights.png') }}");
}
</style>

    <div class="grid gap-3 p-4">
    @csrf

        <label for="" class="text-sm text-zinc-500 font-semibold mt-2">Name*</label>
        <input name="name" type="text" wire:model='mail.name' class="bg-zinc-900 border border-zinc-800 text-zinc-400 focus:bg-zinc-700 transition-all duration-100">

        <label for="" class="text-sm text-zinc-500 font-semibold mt-2">E-mail*</label>
        <input name="email" type="text" wire:model='mail.email' class="bg-zinc-900 border border-zinc-800 text-zinc-400  focus:bg-zinc-700 transition-all duration-100">

        <label for="" class="text-sm text-zinc-500 font-semibold mt-2">Subject*</label>
        <input name="" type="text" wire:model='mail.subject' class="bg-zinc-900 border border-zinc-800 text-zinc-400  focus:bg-zinc-700 transition-all duration-100">

        <label for="" class="text-sm text-zinc-500 font-semibold mt-2">Message*</label>
        <textarea name="" wire:model='mail.message' class="bg-zinc-900 border border-zinc-800 text-zinc-400  focus:bg-zinc-700 transition-all duration-100" id="" cols="30" rows="4"></textarea>

        <button wire:click='save' class="bg-zinc-900 border border-zinc-800 text-zinc-400 font-extrabold w-1/3 p-4 mt-4 hover:bg-orange-500 transition-all duration-100 hover:text-white active:bg-black">send</button>

    </div>


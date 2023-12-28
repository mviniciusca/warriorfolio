<div>
    <span class="text-sm">Join our mailing list</span>
    <div class="flex md:flex-nowrap mt-4 flex-wrap justify-center items-end md:justify-start">
        <div class="relative w-md sm:mr-4 mr-2">
            <form class="flex gap-1" wire:submit="create">
                {{ $this->form }}
                <button
                    class="inline-flex text-white bg-primary-500 border-0 py-2 px-3 focus:outline-none hover:bg-primary-600 rounded text-sm"
                    type="submit">
                    Subscribe
                </button>
            </form>
        </div>

        <p class="text-sm md:ml-6 md:mt-0 mt-2 sm:text-left text-center">I hate spam too. I'll never
            share your email address.
        </p>
    </div>
</div>

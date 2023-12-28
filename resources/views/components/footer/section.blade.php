<x-core.layout class="bg-secondary-900">
    <div class="header-title">{!! $info->contact_section_title !!}</div>
    @if($info->contact_section_subtitle_text)
    <div class="subtitle text-xl text-center mt-2">{!! $info->contact_section_subtitle_text !!}</div>
    @endif
    <div class="mt-24 grid gap-8 items-center">
        @livewire('mail.create-mail')
        <div class="border-t border-secondary-800">
            <div class="container px-5 py-8 flex flex-wrap mx-auto items-center">
                @livewire('newsletter')
            </div>
        </div>
        <div>
            <div
                class=" border-t border-secondary-800 pt-12 container mx-auto px-5 flex flex-wrap flex-col sm:flex-row items-center">
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->name }}" class="w-8 h-8 mr-4">
                <p class=" text-sm text-center sm:text-left">© {{ date('Y') }} - {{$setting->name}}
                </p>
                <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-sm">All rights
                    reserved</span>
            </div>
        </div>
    </div>
    </div>
</x-core.layout>

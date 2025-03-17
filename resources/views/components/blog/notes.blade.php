{{-- Notes (Blog) --}}

@if($module_blog ?? false)
    <x-core.layout :with_padding="false">
        <div class="mx-auto my-16">
            <div class="flex flex-wrap">
                <div class="order-2 mx-auto w-full lg:order-1 lg:w-3/4 lg:pr-24">
                    <x-blog.homepage />
                </div>
                <div class="order-1 hidden w-full lg:order-2 lg:block lg:w-1/4 lg:pl-8">
                    <aside class="px-4 text-center">
                        <x-about.profile :$profile />
                        <x-blog.widget.counter />
                    </aside>
                </div>
            </div>
    </x-core.layout>
@else
    <div class="grid h-screen items-center">
        <x-ui.empty-section :message="__('Ops! Notes not available yet!')" :auth="__('Activate Notes on your Dashboard!')" />
    </div>
@endif

<x-filament-panels::page
    @class([
        'fi-resource-view-record-page',
        'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()),
        'fi-resource-record-' . $record->getKey(),
        'mail-view-page font-sans',
    ])
>
    @php
        $relationManagers = $this->getRelationManagers();
        $hasCombinedRelationManagerTabsWithContent = $this->hasCombinedRelationManagerTabsWithContent();
    @endphp

    @if ((! $hasCombinedRelationManagerTabsWithContent) || (! count($relationManagers)))
        @if ($this->hasInfolist())
            <div class="w-full space-y-0 font-sans">
                {{ $this->infolist }}

                @if (! $replyComposerVisible)
                    <div
                        class="bg-transparent px-4 pt-6 pb-4 sm:px-6">
                        <x-filament::button
                            color="gray"
                            icon="heroicon-o-arrow-uturn-left"
                            outlined
                            type="button"
                            wire:click="openReplyComposer"
                        >
                            {{ __('Reply') }}
                        </x-filament::button>
                    </div>
                @endif

                @if ($replyComposerVisible)
                    <div
                        class="bg-transparent px-4 pt-6 pb-6 sm:px-6"
                        wire:key="mail-reply-composer-{{ $record->getKey() }}">
                        <h3 class="mb-1 text-sm font-semibold text-zinc-900 dark:text-zinc-100">
                            {{ __('Reply') }}
                        </h3>
                        <p class="mb-4 text-xs text-zinc-500 dark:text-zinc-400">
                            {{ __('The reply is saved in Sent. If SMTP is enabled, it will be delivered to the recipient.') }}
                        </p>

                        <div
                            wire:key="{{ $this->getId() }}.forms.replyData"
                        >
                            {{ $this->replyForm }}
                        </div>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <x-filament::button
                                icon="heroicon-o-paper-airplane"
                                type="button"
                                wire:click="submitReply"
                                wire:loading.attr="disabled"
                                wire:target="submitReply"
                            >
                                {{ __('Send') }}
                            </x-filament::button>

                            <x-filament::button
                                color="gray"
                                outlined
                                type="button"
                                wire:click="closeReplyComposer"
                                wire:loading.attr="disabled"
                                wire:target="closeReplyComposer"
                            >
                                {{ __('Discard') }}
                            </x-filament::button>
                        </div>
                    </div>
                @endif
            </div>
        @else
            <div
                wire:key="{{ $this->getId() }}.forms.{{ $this->getFormStatePath() }}"
            >
                {{ $this->form }}
            </div>
        @endif
    @endif

    @if (count($relationManagers))
        <x-filament-panels::resources.relation-managers
            :active-locale="isset($activeLocale) ? $activeLocale : null"
            :active-manager="$this->activeRelationManager ?? ($hasCombinedRelationManagerTabsWithContent ? null : array_key_first($relationManagers))"
            :content-tab-label="$this->getContentTabLabel()"
            :content-tab-icon="$this->getContentTabIcon()"
            :content-tab-position="$this->getContentTabPosition()"
            :managers="$relationManagers"
            :owner-record="$record"
            :page-class="static::class"
        >
            @if ($hasCombinedRelationManagerTabsWithContent)
                <x-slot name="content">
                    @if ($this->hasInfolist())
                        {{ $this->infolist }}
                    @else
                        {{ $this->form }}
                    @endif
                </x-slot>
            @endif
        </x-filament-panels::resources.relation-managers>
    @endif
</x-filament-panels::page>

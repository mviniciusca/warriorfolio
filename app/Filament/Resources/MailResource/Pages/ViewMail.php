<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\View;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewMail extends ViewRecord
{
    protected static string $resource = MailResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Mail');
    }

    protected function getHeaderActions(): array
    {
        return [

            Action::make('back_to_inbox')
                ->color('gray')
                ->label(__('Back'))
                ->size('sm')
                ->url(route('filament.admin.resources.mails.index'))
                ->icon('heroicon-o-arrow-left'),
            DeleteAction::make()
                ->icon('heroicon-o-trash')
                ->size('sm')
                ->label(__('Move to Trash'))
                ->icon('heroicon-o-trash'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(1)
            ->schema([
                View::make('infolists.components.mail-view'),
            ]);
    }
}

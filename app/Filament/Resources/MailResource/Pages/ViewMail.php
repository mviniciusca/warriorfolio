<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\View;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewMail extends ViewRecord
{
    protected static string $resource = MailResource::class;

    public function getTitle(): string | Htmlable
    {
        return '­';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_post')
                ->label(__('View Post'))
                ->url(env('APP_URL').'/'.$this->record->slug)
                ->openUrlInNewTab(true)
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('success'),
            DeleteAction::make()
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

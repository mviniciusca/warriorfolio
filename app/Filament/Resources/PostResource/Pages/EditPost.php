<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_post')
                ->label(__('View Post'))
                ->url(env('APP_URL').'/'.$this->record->slug)
                ->openUrlInNewTab(true)
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->color('success'),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash'),
        ];
    }
}

<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Edit Note');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_post')
                ->hidden(fn ($record) => ! is_null($record?->deleted_at))
                ->label(__('View Post'))
                ->url(env('APP_URL').'/'.$this->record->slug)
                ->openUrlInNewTab(true)
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->size('xs')
                ->color('info'),
            Actions\DeleteAction::make()
                ->size('xs')
                ->label(__('Move to Trash'))
                ->outlined()
                ->icon('heroicon-o-trash'),
            Actions\ForceDeleteAction::make()
                ->label(__('Delete from Trash'))
                ->icon('heroicon-o-trash')
                ->size('xs'),
            Actions\RestoreAction::make()
                ->icon('heroicon-o-arrow-uturn-left')
                ->label(__('Restore'))
                ->size('xs'),
        ];
    }
}

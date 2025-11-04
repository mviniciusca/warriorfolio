<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Edit Note');
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Se há dados do post no relacionamento, atualizá-los separadamente
        if (isset($data['post']) && is_array($data['post']) && $record->post) {
            $record->post->update($data['post']);
            unset($data['post']);
        }

        // Atualizar a página
        $record->update($data);

        return $record;
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
                ->label(__('Delete'))
                ->modalHeading(__('Delete Note'))
                ->requiresConfirmation()
                ->icon('heroicon-o-trash'),
        ];
    }
}

<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Page;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;
use Z3d0X\FilamentFabricator\Resources\PageResource\Pages\Concerns\HasPreviewModal;

class EditPage extends EditRecord
{
    use HasPreviewModal;

    protected static string $resource = PageResource::class;

    public static function getResource(): string
    {
        return config('filament-fabricator.page-resource') ?? static::$resource;
    }

    public function mount(int|string $record): void
    {
        $resolved = $this->resolveRecord($record);

        if ($resolved instanceof Page && in_array($resolved->style, ['blog', 'project'], true)) {
            $this->redirect(PageResource::getEditUrlForPage($resolved));

            return;
        }

        parent::mount($record);
    }

    /**
     * Livewire pode reidratar `record` como string (chave); o trait devolve isso e quebra o tipo de `getRecord()`.
     */
    public function getRecord(): Model
    {
        if ($this->record instanceof Model) {
            return $this->record;
        }

        if ($this->record === null || $this->record === '') {
            throw (new ModelNotFoundException)->setModel($this->getModel(), []);
        }

        return $this->record = $this->resolveRecord($this->record);
    }

    protected function getActions(): array
    {
        return [
            PreviewAction::make(),

            Actions\ViewAction::make()
                ->visible(config('filament-fabricator.enable-view-page')),

            Actions\DeleteAction::make(),

            Action::make('visit')
                ->label(__('filament-fabricator::page-resource.actions.visit'))
                ->url(function () {
                    /** @var PageContract $page */
                    $page = $this->getRecord();

                    return FilamentFabricator::getPageUrlFromId($page->id);
                })
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->openUrlInNewTab()
                ->color('success')
                ->visible(config('filament-fabricator.routing.enabled')),

            Action::make('save')
                ->action('save')
                ->label(__('filament-fabricator::page-resource.actions.save')),
        ];
    }
}

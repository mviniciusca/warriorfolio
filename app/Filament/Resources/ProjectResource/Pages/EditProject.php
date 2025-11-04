<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getSteps(): array
    {
        return [
            'Project Information' => [
                'icon'   => 'heroicon-o-rocket-launch',
                'schema' => [
                    // Just for the wizard steps visualization; complete form is in tabs
                ],
            ],
            'Media & Categorization' => [
                'icon'   => 'heroicon-o-photo',
                'schema' => [],
            ],
            'Publication' => [
                'icon'   => 'heroicon-o-eye',
                'schema' => [],
            ],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->visible(config('filament-fabricator.enable-view-page')),
            Action::make('visit')
                ->url(function () {
                    /** @var PageContract $page */
                    $page = $this->getRecord();

                    return FilamentFabricator::getPageUrlFromId($page->id);
                })
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->openUrlInNewTab()
                ->label(__('Visit Project'))
                ->color('primary')
                ->size('sm')
                ->visible(config('filament-fabricator.routing.enabled')),
            Actions\DeleteAction::make()
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->size('sm'),
        ];
    }
}

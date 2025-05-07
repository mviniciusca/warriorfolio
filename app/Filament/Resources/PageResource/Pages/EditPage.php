<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    public static function getResource(): string
    {
        return config('filament-fabricator.page-resource') ?? static::$resource;
    }

    protected function getHeaderActions(): array
    {
        return [
            PreviewAction::make()
                ->size('sm')
                ->color('info')
                ->icon('heroicon-m-eye'),
            Actions\ViewAction::make()
                ->visible(config('filament-fabricator.enable-view-page')),
            Actions\Action::make('visit')
                ->label(__('filament-fabricator::page-resource.actions.visit'))
                ->url(function () {
                    /** @var PageContract $page */
                    $page = $this->getRecord();

                    return FilamentFabricator::getPageUrlFromId($page->id);
                })
                ->icon('heroicon-m-arrow-top-right-on-square')
                ->openUrlInNewTab()
                ->color('success')
                ->size('sm')
                ->visible(config('filament-fabricator.routing.enabled')),
            Actions\DeleteAction::make()
                ->icon('heroicon-m-trash')
                ->color('danger')
                ->size('sm'),
            Actions\Action::make('save')
                ->action('save')
                ->icon('heroicon-m-check')
                ->size('sm')
                ->label(__('filament-fabricator::page-resource.actions.save')),
        ];
    }
}

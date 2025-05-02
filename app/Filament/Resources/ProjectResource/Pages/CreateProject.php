<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateProject extends CreateRecord
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

    public function getTitle(): string | Htmlable
    {
        return __('Create Project');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view_all')
                ->label(__('View All Projects'))
                ->url(ProjectResource::getUrl('index'))
                ->color('gray')
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}

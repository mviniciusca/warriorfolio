<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    /**
     * Garante que não há Create na toolbar da tabela (só o "New Project" do header da página).
     */
    public function table(Table $table): Table
    {
        return parent::table($table)
            ->headerActions([]);
    }

    public function getTitle(): string|Htmlable
    {
        return __('Projects');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Manage your projects — publish, edit and organize what appears on your portfolio.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Project'))
                ->size('sm')
                ->icon('heroicon-o-rocket-launch'),
        ];
    }
}

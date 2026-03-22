<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\SettingResource;
use App\Models\Core;
use App\Models\Setting;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class CoreModuleWidget extends BaseWidget
{
    protected static string $view = 'filament.widgets.core-module-table-widget';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 6;

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        $settingId = Setting::query()->value('id');

        return [
            'coreSettingsUrl' => $settingId !== null && $settingId !== ''
                ? SettingResource::getUrl('edit', ['record' => $settingId])
                : null,
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Core::query()->select()
            )
            ->striped()
            ->heading(null)
            ->description(null)
            ->emptyStateIcon('heroicon-o-cpu-chip')
            ->paginated(false)
            ->columns([
                CheckboxColumn::make('about')
                    ->label('About')
                    ->alignCenter(),
                CheckboxColumn::make('clients')
                    ->label('Clients')
                    ->alignCenter(),
                CheckboxColumn::make('contact')
                    ->label('Contact')
                    ->alignCenter(),
                CheckboxColumn::make('footer')
                    ->label('Footer')
                    ->alignCenter(),
                CheckboxColumn::make('header')
                    ->label('Header')
                    ->alignCenter(),
                CheckboxColumn::make('hero')
                    ->label('Hero')
                    ->alignCenter(),
                CheckboxColumn::make('newsletter')
                    ->label('Newsletter')
                    ->alignCenter(),
                CheckboxColumn::make('portfolio')
                    ->label('Portfolio')
                    ->alignCenter(),
            ]);
    }
}

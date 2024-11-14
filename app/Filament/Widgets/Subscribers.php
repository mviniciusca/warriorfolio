<?php

namespace App\Filament\Widgets;

use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class Subscribers extends ChartWidget
{
    protected static ?string $heading = 'Mailing List';

    protected static ?string $description = 'Your mailing list subscribers.';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(\App\Models\Newsletter::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Subscribers',
                    'data'  => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill'  => true,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

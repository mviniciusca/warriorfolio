<?php

namespace App\Filament\Widgets;

use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class Subscribers extends ChartWidget
{
    protected static ?string $heading = 'Subscribers';
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
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                    'fill' => true
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}

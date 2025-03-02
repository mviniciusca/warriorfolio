<?php

namespace App\Filament\Widgets;

use App\Models\Newsletter;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class Subscribers extends ChartWidget
{
    protected static ?string $heading = 'Mailing List';

    protected static ?string $description = 'Your mailing list subscribers.';

    protected static ?int $sort = 9;

    protected function getData(): array
    {
        $data = Trend::model(Newsletter::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('Subscribers'),
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

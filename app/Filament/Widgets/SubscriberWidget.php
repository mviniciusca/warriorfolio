<?php

namespace App\Filament\Widgets;

use App\Models\Newsletter;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SubscriberWidget extends ChartWidget
{
    protected static ?string $heading = 'Subscribers Graph';

    protected static ?int $sort = 8;  // Mudando para 8 para ficar logo após o SliderWidget

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '320px';

    protected function getColumns(): int|array
    {
        return 6; // Total de 3 colunas disponíveis
    }

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

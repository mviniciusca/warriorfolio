<?php

namespace App\Filament\Resources\NewsletterResource\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class NewsletterSubscribersChart extends ChartWidget
{
    protected static ?string $heading = 'Subscriber Growth';

    protected static ?string $description = 'Monthly growth of newsletter subscribers';

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
                    'label'           => __('Subscribers'),
                    'data'            => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill'            => true,
                    'borderColor'     => '#6366f1',
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                    'tension'         => 0.2,
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid'        => [
                        'display'    => true,
                        'drawBorder' => false,
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}

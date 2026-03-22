<?php

namespace App\Filament\Widgets;

use App\Models\Newsletter;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\Support\Htmlable;

class SubscriberWidget extends ChartWidget
{
    protected static ?int $sort = 8;  // Mudando para 8 para ficar logo após o SliderWidget

    protected int|string|array $columnSpan = 'full';

    protected static ?string $maxHeight = '320px';

    public function getHeading(): string|Htmlable|null
    {
        return __('Newsletter subscribers');
    }

    public function getDescription(): string|Htmlable|null
    {
        return __(
            'Monthly trend of new newsletter sign-ups from the start of the year through the current month. Useful to see growth at a glance before opening the full subscriber list.'
        );
    }

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
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill' => true,
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

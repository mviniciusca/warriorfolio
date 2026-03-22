<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class PulseMetricsSectionHeaderWidget extends Widget
{
    protected static string $view = 'filament.widgets.pulse-metrics-section-header';

    protected static bool $isDiscovered = false;

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';
}

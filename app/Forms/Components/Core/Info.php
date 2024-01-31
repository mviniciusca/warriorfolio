<?php

namespace App\Forms\Components\Core;

use Filament\Forms\Components\Component;

class Info extends Component
{
    protected string $view = 'forms.components.core.info';

    public static function make(): static
    {
        return app(static::class);
    }
}

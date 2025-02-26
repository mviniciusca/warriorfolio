<?php

namespace App\Infolists\Components;

use Filament\Infolists\Components\Component;

class MailView extends Component
{
    protected string $view = 'infolists.components.mail-view';

    public static function make(): static
    {
        return app(static::class);
    }
}

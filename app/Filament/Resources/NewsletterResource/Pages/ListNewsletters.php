<?php

namespace App\Filament\Resources\NewsletterResource\Pages;

use App\Filament\Resources\NewsletterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsletters extends ListRecords
{
    protected static string $resource = NewsletterResource::class;
    protected static ?string $title = 'Newsletter Subscribers';

    public function getHeaderWidgetsColumns(): int|array
    {
        return [
            'sm' => 1
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            NewsletterResource\Widgets\NewsletterSubscribersChart::class,
        ];
    }
}

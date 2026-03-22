<?php

namespace App\Filament\Resources\NewsletterResource\Pages;

use App\Filament\Resources\NewsletterResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListNewsletters extends ListRecords
{
    protected static string $resource = NewsletterResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Newsletter Subscribers');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Emails collected from your mailing list. Export or clean up subscribers from this table.');
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return [
            'sm' => 1,
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

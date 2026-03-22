<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;

class ManageMails extends ManageRecords
{
    protected static string $resource = MailResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Inbox');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Contact form and inbound mail. Open a row to read the full message.');
    }

    /**
     * @return array<\Filament\Navigation\NavigationItem|\Filament\Navigation\NavigationGroup>
     */
    public function getSubNavigation(): array
    {
        return $this->generateNavigationItems([
            self::class,
            MailTrashed::class,
        ]);
    }

    public static function getNavigationLabel(): string
    {
        return __('Inbox');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-inbox-stack';
    }

    public static function getNavigationSort(): ?int
    {
        return 0;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getTableRecordUrlUsing(): ?\Closure
    {
        return fn (Mail $record): string => MailResource::getUrl('view', ['record' => $record]);
    }
}

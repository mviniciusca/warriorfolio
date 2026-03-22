<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Filament\Resources\MailResource\Concerns\InteractsWithMailboxInboxPages;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class ManageMailRead extends ManageRecords
{
    use InteractsWithMailboxInboxPages;

    protected static string $resource = MailResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Read');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Messages you have already opened.');
    }

    public static function getNavigationLabel(): string
    {
        return __('Read');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-envelope-open';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return MailResource::mailboxSubNavigationBadge(
            fn (Builder $query) => $query
                ->where('is_sent', false)
                ->where('is_read', true),
        );
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'gray';
    }

    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery()
            ->where('is_sent', false)
            ->where('is_read', true);
    }
}

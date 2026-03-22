<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Filament\Resources\MailResource\Concerns\InteractsWithMailboxInboxPages;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class ManageMailUnread extends ManageRecords
{
    use InteractsWithMailboxInboxPages;

    protected static string $resource = MailResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Unread');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Received messages you have not opened yet.');
    }

    public static function getNavigationLabel(): string
    {
        return __('Unread');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-envelope';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationBadge(): ?string
    {
        return MailResource::mailboxSubNavigationBadge(
            fn (Builder $query) => $query
                ->where('is_sent', false)
                ->where('is_read', false),
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
            ->where('is_read', false);
    }
}

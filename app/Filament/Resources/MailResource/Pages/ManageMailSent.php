<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Filament\Resources\MailResource\Concerns\InteractsWithMailboxInboxPages;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class ManageMailSent extends ManageRecords
{
    use InteractsWithMailboxInboxPages;

    protected static string $resource = MailResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Sent');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Messages you sent from the admin panel.');
    }

    public static function getNavigationLabel(): string
    {
        return __('Sent');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-paper-airplane';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function getNavigationBadge(): ?string
    {
        return MailResource::mailboxSubNavigationBadge(
            fn (Builder $query) => $query->where('is_sent', true),
        );
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'gray';
    }

    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery()
            ->where('is_sent', true);
    }
}

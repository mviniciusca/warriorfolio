<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Filament\Resources\MailResource\Concerns\InteractsWithMailboxInboxPages;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;

class ManageMailImportant extends ManageRecords
{
    use InteractsWithMailboxInboxPages;

    protected static string $resource = MailResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Important');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Starred messages from your inbox.');
    }

    public static function getNavigationLabel(): string
    {
        return __('Important');
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-s-star';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
    {
        return MailResource::mailboxSubNavigationBadge(
            fn (Builder $query) => $query
                ->where('is_sent', false)
                ->where('is_important', true),
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
            ->where('is_important', true);
    }
}

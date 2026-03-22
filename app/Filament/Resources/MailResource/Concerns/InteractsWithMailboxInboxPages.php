<?php

namespace App\Filament\Resources\MailResource\Concerns;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Closure;

trait InteractsWithMailboxInboxPages
{
    protected function getHeaderActions(): array
    {
        return [
            MailResource::getNewMessageAction(),
        ];
    }

    public function getSubNavigation(): array
    {
        return $this->generateNavigationItems(MailResource::getMailboxSubNavigationPages());
    }

    protected function getTableRecordUrlUsing(): ?Closure
    {
        return fn (Mail $record): string => MailResource::getUrl('view', ['record' => $record]);
    }
}

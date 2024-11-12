<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;

class MailTrashed extends ListRecords
{
    protected static string $resource = MailResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->query(Mail::query()->onlyTrashed())
            ->columns([]);
    }
}

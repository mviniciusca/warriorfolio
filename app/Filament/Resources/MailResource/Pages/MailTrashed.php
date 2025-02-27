<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class MailTrashed extends ListRecords
{
    protected static string $resource = MailResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-trash';

    public static function getNavigationLabel(): string
    {
        return __('Trashed Mails');
    }

    public function getTitle(): string | Htmlable
    {
        return __('Trashed Mails');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Mail::query()->onlyTrashed())
            ->columns([
                TextColumn::make('name')
                    ->label(__('From:'))
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('Email:'))
                    ->limit(20)
                    ->searchable(),
                TextColumn::make('subject')
                    ->label(__('Subject:'))
                    ->limit(50)
                    ->searchable(),
            ])
            ->actions([
                ActionGroup::make([
                    RestoreAction::make(),
                    ForceDeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}

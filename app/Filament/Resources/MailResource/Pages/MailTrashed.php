<?php

namespace App\Filament\Resources\MailResource\Pages;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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
                IconColumn::make('is_important')
                    ->label('')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->falseIcon('heroicon-o-star')
                    ->falseColor('gray')
                    ->trueColor('warning'),
                ToggleColumn::make('is_read')
                    ->alignCenter()
                    ->label(__('Mark as Read')),
                TextColumn::make('name')
                    ->label(__('From'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('Email'))
                    ->searchable(),
                TextColumn::make('subject')
                    ->label(__('Subject'))
                    ->words(5)
                    ->searchable(),
            ])
            ->actions([
                ActionGroup::make([
                    ForceDeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailResource\Pages;
use App\Models\Mail;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class MailResource extends Resource
{
    protected static ?string $model = Mail::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function getNavigationLabel(): string
    {
        return __('Mail');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('is_read', false)->count() > 0) {
            if (static::getModel()::where('is_read', false)->count() >= 999) {
                return '+999';
            } else {
                return static::getModel()::where('is_read', false)->count();
            }
        }

        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\Toggle::make('is_read')
                            ->label(__('Mark as Read')),
                        Forms\Components\Toggle::make('is_important')
                            ->label(__('Mark as Important')),
                    ]),
                Forms\Components\TextInput::make('name')
                    ->columnSpanFull()
                    ->label(__('From:'))
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label(__('Email'))
                    ->disabled()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->label(__('Phone:'))
                    ->disabled()
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->columnSpanFull()
                    ->disabled()
                    ->label(__('Subject:'))
                    ->maxLength(255),
                Textarea::make('body')
                    ->columnSpanFull()
                    ->label(__('Message:'))
                    ->disabled()
                    ->rows(3)
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped(false)
            ->headerActions([
                Action::make('view_trashed_mails')
                    ->color('gray')
                    ->label(__('View Trash'))
                    ->icon('heroicon-o-trash')
                    ->url(route('filament.admin.resources.mails.bin')),
            ])
            ->heading(__('Inbox'))
            ->description(__('Your messages from your website contact form'))
            ->recordClasses(fn (Mail $record) => match ($record->is_read) {
                1       => 'opacity-50 dark:opacity-30 decoration-dashed line-through',
                default => null,
            })
            ->columns([
                Tables\Columns\IconColumn::make('is_important')
                    ->label('')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->falseIcon('heroicon-o-star')
                    ->falseColor('gray')
                    ->trueColor('primary'),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('From:'))
                    ->limit(15)
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('Email:'))
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label(__('Subject:'))
                    ->limit(50)
                    ->words(5)
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_read')
                    ->alignEnd()
                    ->onIcon('heroicon-o-eye-slash')
                    ->offColor('primary')
                    ->onColor('gray')
                    ->offIcon('heroicon-m-eye')
                    ->label(__('Mark as Read')),
            ])
            ->defaultSort('id', 'desc')
            ->defaultPaginationPageOption(10)
            ->filters([
                TernaryFilter::make('is_read')
                    ->label(__('Messages'))
                    ->falseLabel(__('Unread'))
                    ->trueLabel(__('Read')),
                TernaryFilter::make('is_important')
                    ->label(__('Important'))
                    ->falseLabel(__('Without Star'))
                    ->trueLabel(__('With Star')),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->modalHeading(__('Mail')),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMails::route('/'),
            'bin'   => Pages\MailTrashed::route('/bin'),
        ];
    }
}

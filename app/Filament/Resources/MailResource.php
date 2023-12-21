<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Mail;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\MailResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MailResource\RelationManagers;


class MailResource extends Resource
{
    protected static ?string $model = Mail::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $navigationLabel = 'Mail';
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
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('body')->columnSpanFull()
                    ->fileAttachmentsDirectory('mails')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('is_read')
                    ->inline(false)
                    ->label('Mark as Read'),
                Forms\Components\Toggle::make('is_important')
                    ->inline(false)
                    ->label('Mark as Important'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_important')
                    ->label('')
                    ->boolean()
                    ->trueIcon('heroicon-o-bookmark')
                    ->falseIcon('')
                    ->trueColor('primary'),
                Tables\Columns\ToggleColumn::make('is_read')
                    ->alignCenter()
                    ->label('Read'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->words(5)
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->defaultPaginationPageOption(50)
            ->filters([
                TernaryFilter::make('is_read')
                    ->default(false)
                    ->label('Messages')
                    ->falseLabel('Show unread messages')
                    ->trueLabel('Show read messages'),
                TernaryFilter::make('is_important')
                    ->label('Important')
                    ->falseLabel('Show unimportant messages')
                    ->trueLabel('Show important messages'),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
        ];
    }
}

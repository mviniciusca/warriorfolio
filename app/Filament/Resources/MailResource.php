<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailResource\Pages;
use App\Models\Mail;
use App\Services\MailService;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class MailResource extends Resource
{
    protected static ?string $model = Mail::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function getNavigationLabel(): string
    {
        return __('Inbox');
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
                        Toggle::make('is_read')
                            ->label(__('Mark as Read')),
                        Toggle::make('is_important')
                            ->label(__('Mark as Important')),
                    ]),
                TextInput::make('name')
                    ->columnSpanFull()
                    ->label(__('From:'))
                    ->disabled()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label(__('Email: '))
                    ->disabled()
                    ->email()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label(__('Phone:'))
                    ->disabled()
                    ->tel()
                    ->maxLength(255),
                TextInput::make('subject')
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
                CreateAction::make('write_message')
                    ->modalHeading(__('New Message'))
                    ->size('sm')
                    ->modalIcon('heroicon-o-envelope')
                    ->modalDescription(__('Write a new mail message. Be sure that SMTP services are enabled.'))
                    ->modalSubmitActionLabel(__('Send Message'))
                    ->label(__('New Message'))
                    ->closeModalByClickingAway(false)
                    ->color('primary')
                    ->icon('heroicon-o-pencil')
                    ->createAnother(false)
                    ->form([
                        Group::make()
                            ->columns(2)
                            ->schema([
                                Hidden::make('is_sent')
                                    ->default(true),
                                TextInput::make('email')
                                    ->required()
                                    ->email()
                                    ->placeholder(__('Destiny email address'))
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-envelope')
                                    ->label(__('To:')),
                                TextInput::make('name')
                                    ->required()
                                    ->placeholder(__('Your Name'))
                                    ->maxLength(255)
                                    ->prefixIcon('heroicon-o-user')
                                    ->label(__('Your Name:'))
                                    ->default(function (): mixed {
                                        return Auth::user()->name ?? env('APP_NAME');
                                    }),
                                TextInput::make('subject')
                                    ->required()
                                    ->placeholder(__('Email subject'))
                                    ->maxLength(255)
                                    ->columnSpanFull()
                                    ->prefixIcon('heroicon-o-bars-3-bottom-left')
                                    ->label(__('Subject:')),
                                RichEditor::make('body')
                                    ->required()
                                    ->placeholder(__('Your Message'))
                                    ->maxLength(5000)
                                    ->columnSpanFull()
                                    ->label(__('Message')),
                            ]),
                    ])
                    ->after(function (?array $data): MailService|null {
                        if (env('SMTP_SERVICES')) {
                            $mail = new MailService($data);

                            return $mail->send();
                        }

                        return null;
                    }),
                Action::make('view_trashed_mails')
                    ->color('gray')
                    ->label(__('View Trash'))
                    ->size('sm')
                    ->icon('heroicon-o-trash')
                    ->url(route('filament.admin.resources.mails.bin')),
            ])
            ->heading(__('Inbox'))
            ->description(__('Your messages from your website contact form.'))
            ->recordClasses(fn (Mail $record) => match ($record->is_read) {
                1       => 'opacity-50 dark:opacity-30 decoration-dashed line-through',
                default => null,
            })
            ->columns([
                ToggleColumn::make('is_important')
                    ->label(__('Favorite'))
                    ->onColor('primary')
                    ->offColor('gray')
                    ->onIcon('heroicon-m-star')
                    ->offIcon('heroicon-o-star'),
                TextColumn::make('name')
                    ->label(__('From:'))
                    ->limit(15)
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
            ->defaultSort('created_at', 'desc')
            ->defaultPaginationPageOption(25)
            ->filters([
                TernaryFilter::make('is_read')
                    ->label(__('Messages'))
                    ->falseLabel(__('Unread'))
                    ->trueLabel(__('Read')),
                TernaryFilter::make('is_sent')
                    ->label(__('Status'))
                    ->default(false)
                    ->falseLabel(__('Received'))
                    ->trueLabel(__('Sent')),
                TernaryFilter::make('is_important')
                    ->label(__('Important'))
                    ->falseLabel(__('Without Star'))
                    ->trueLabel(__('With Star')),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->modalHeading(__('Mail')),
                    Tables\Actions\DeleteAction::make()
                        ->label(__('Move to Trash')),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label(__('Move to Trash')),
                ]),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMails::route('/'),
            'view'  => Pages\ViewMail::route('{record}/read'),
            'bin'   => Pages\MailTrashed::route('/bin'),
        ];
    }
}

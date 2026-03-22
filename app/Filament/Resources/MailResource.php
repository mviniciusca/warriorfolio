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
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Pages\Page as ResourcePage;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\Action as TableRecordAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\IconColumn\IconColumnSize;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MailResource extends Resource
{
    protected static ?string $model = Mail::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    protected static ?int $navigationSort = 0;

    public static function getNavigationGroup(): ?string
    {
        return __('Workspace');
    }

    public static function getNavigationLabel(): string
    {
        return __('Inbox');
    }

    public static function getNavigationBadge(): ?string
    {
        $unread = static::getModel()::query()
            ->where('is_read', false)
            ->where('is_sent', false)
            ->count();

        if ($unread <= 0) {
            return null;
        }

        return $unread >= 999 ? '+999' : (string) $unread;
    }

    /**
     * @return array<\Filament\Navigation\NavigationItem|\Filament\Navigation\NavigationGroup>
     */
    public static function getRecordSubNavigation(ResourcePage $page): array
    {
        return $page->generateNavigationItems([
            Pages\ManageMails::class,
            Pages\MailTrashed::class,
        ]);
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
                    ->after(function (?array $data): ?MailService {
                        if (env('SMTP_SERVICES')) {
                            $mail = new MailService($data);

                            return $mail->send();
                        }

                        return null;
                    }),
            ])
            ->heading(__('Inbox'))
            ->description(__('Messages from your site contact form and outbound mail you send from here.'))
            ->recordClasses(fn (Mail $record): string => (bool) $record->is_read
                ? 'opacity-70'
                : 'border-s-2 border-primary-500/60 dark:border-primary-400/50')
            ->columns([
                TextColumn::make('email')
                    ->searchable()
                    ->hidden(),

                Split::make([
                    IconColumn::make('is_read')
                        ->label('')
                        ->alignStart()
                        ->icon(fn (mixed $state): string => (bool) $state
                            ? 'heroicon-o-envelope-open'
                            : 'heroicon-s-envelope')
                        ->color(fn (mixed $state): string => (bool) $state ? 'gray' : 'primary')
                        ->size(IconColumnSize::Medium)
                        ->extraAttributes([
                            'class' => 'shrink-0 [&_.fi-ta-icon]:size-5',
                        ])
                        ->grow(false),

                    Stack::make([
                        Split::make([
                            TextColumn::make('subject')
                                ->label('')
                                ->weight(FontWeight::SemiBold)
                                ->searchable()
                                ->limit(85)
                                ->tooltip(fn (Mail $record): string => $record->subject),

                            TextColumn::make('created_at')
                                ->label('')
                                ->since()
                                ->alignment(Alignment::End)
                                ->color('gray')
                                ->size('sm')
                                ->grow(false),
                        ]),

                        TextColumn::make('name')
                            ->label('')
                            ->color('gray')
                            ->size('sm')
                            ->formatStateUsing(fn (string $state, Mail $record): string => $state.' · '.$record->email)
                            ->searchable(),

                        TextColumn::make('body')
                            ->label('')
                            ->color('gray')
                            ->size('sm')
                            ->formatStateUsing(fn (?string $state): string => static::plainBodyPreview($state, 155)),
                    ])->space(1),
                ])->from('sm'),
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
                TableRecordAction::make('toggleImportant')
                    ->label(fn (Mail $record): string => $record->is_important ? __('Unstar') : __('Star'))
                    ->icon(fn (Mail $record): string => $record->is_important ? 'heroicon-s-star' : 'heroicon-o-star')
                    ->iconButton()
                    ->color('warning')
                    ->action(function (Mail $record): void {
                        $record->update(['is_important' => ! $record->is_important]);
                    }),
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
            'view' => Pages\ViewMail::route('{record}/read'),
            'bin' => Pages\MailTrashed::route('/bin'),
        ];
    }

    public static function plainBodyPreview(?string $html, int $limit = 160): string
    {
        $text = strip_tags(html_entity_decode($html ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8'));

        return Str::of($text)->squish()->limit($limit)->toString();
    }
}

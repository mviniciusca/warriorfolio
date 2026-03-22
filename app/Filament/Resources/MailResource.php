<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailResource\Pages;
use App\Models\Mail;
use App\Services\MailService;
use Closure;
use Filament\Actions\CreateAction;
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
use Filament\Tables;
use Filament\Tables\Actions\Action as TableRecordAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
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
     * @return array<class-string<ResourcePage>>
     */
    public static function getMailboxSubNavigationPages(): array
    {
        return [
            Pages\ManageMails::class,
            Pages\ManageMailUnread::class,
            Pages\ManageMailRead::class,
            Pages\ManageMailImportant::class,
            Pages\ManageMailSent::class,
            Pages\MailTrashed::class,
        ];
    }

    /**
     * Contagem para badge nas abas do mail (sub-navegação). Devolve null quando é 0.
     *
     * @param  Closure(Builder<Mail>): void  $scope
     */
    public static function mailboxSubNavigationBadge(Closure $scope): ?string
    {
        $query = static::getModel()::query();
        $scope($query);
        $count = $query->count();

        if ($count <= 0) {
            return null;
        }

        return $count >= 999 ? '+999' : (string) $count;
    }

    public static function getNewMessageAction(): CreateAction
    {
        return CreateAction::make('write_message')
            ->model(Mail::class)
            ->modalHeading(__('New Message'))
            ->size('sm')
            ->modalIcon('heroicon-o-envelope')
            ->modalDescription(__('Write a new mail message. Be sure that SMTP services are enabled.'))
            ->modalSubmitActionLabel(__('Send Message'))
            ->label(__('New Message'))
            ->closeModalByClickingAway(false)
            ->color('primary')
            ->icon('heroicon-o-paper-airplane')
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
            ->after(function (CreateAction $action): ?MailService {
                if (! env('SMTP_SERVICES')) {
                    return null;
                }

                $record = $action->getRecord();

                if (! $record instanceof Mail) {
                    return null;
                }

                return (new MailService([
                    'email' => $record->email,
                    'name' => $record->name,
                    'subject' => $record->subject,
                    'body' => $record->body,
                ], $record))->send();
            });
    }

    /**
     * Formulário do modal “Responder” na vista de leitura.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public static function getReplyFormSchema(): array
    {
        return [
            Group::make()
                ->columns(2)
                ->columnSpanFull()
                ->schema([
                    Hidden::make('is_sent')
                        ->default(true),
                    TextInput::make('email')
                        ->email()
                        ->label(__('To:'))
                        ->disabled()
                        ->dehydrated()
                        ->maxLength(255)
                        ->prefixIcon('heroicon-o-envelope'),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->prefixIcon('heroicon-o-user')
                        ->label(__('Your name:')),
                    TextInput::make('subject')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->prefixIcon('heroicon-o-bars-3-bottom-left')
                        ->label(__('Subject:')),
                    RichEditor::make('body')
                        ->required()
                        ->maxLength(15000)
                        ->columnSpanFull()
                        ->label(__('Message')),
                ]),
        ];
    }

    public static function getReplyFormState(Mail $mail): array
    {
        $subject = trim((string) ($mail->subject ?? ''));

        if ($subject !== '' && ! preg_match('/^re:\s/i', $subject)) {
            $subject = 'Re: '.$subject;
        }

        return [
            'email' => $mail->email,
            'name' => Auth::user()->name ?? (string) env('APP_NAME'),
            'subject' => $subject,
            'body' => static::quotedReplyHtml($mail),
            'is_sent' => true,
        ];
    }

    public static function quotedReplyHtml(Mail $mail): string
    {
        $when = $mail->created_at
            ? $mail->created_at->timezone(config('app.timezone'))->format('D, M j, Y \a\t g:i A')
            : '';

        $header = __('On :date, :name wrote:', [
            'date' => $when,
            'name' => $mail->name,
        ]);

        return '<p><br></p><p>'.e($header).'</p><blockquote class="mail-reply-quote">'.$mail->body.'</blockquote>';
    }

    /**
     * @return array<\Filament\Navigation\NavigationItem|\Filament\Navigation\NavigationGroup>
     */
    public static function getRecordSubNavigation(ResourcePage $page): array
    {
        return $page->generateNavigationItems(static::getMailboxSubNavigationPages());
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
            ->heading(null)
            ->description(null)
            ->recordClasses(fn (Mail $record): string => 'mail-row-compact '.((bool) $record->is_read
                ? 'is-read'
                : 'is-unread border-s-2 border-primary-500/50 dark:border-primary-400/40'))
            ->columns([
                TextColumn::make('email')
                    ->searchable()
                    ->hidden(),
                TextColumn::make('name')
                    ->searchable()
                    ->hidden(),

                Split::make([
                    TextColumn::make('subject')
                        ->label('')
                        ->searchable()
                        ->sortable()
                        ->grow()
                        ->wrap(false)
                        ->tooltip(fn (Mail $record): string => $record->subject)
                        ->html()
                        ->formatStateUsing(function (mixed $state, Mail $record): string {
                            $name = e($record->name);
                            $subject = e(Str::limit($record->subject, 72));
                            $snippet = e(static::plainBodyPreview($record->body, 100));
                            $emphasis = $record->is_read
                                ? 'font-medium'
                                : 'font-semibold';

                            return '<div class="min-w-0 truncate text-sm leading-tight">'
                                .'<span class="'.$emphasis.' text-neutral-950 dark:text-white">'.$name.'</span>'
                                .' <span class="font-normal text-neutral-400 dark:text-neutral-500">—</span> '
                                .'<span class="'.$emphasis.' text-neutral-800 dark:text-neutral-100">'.$subject.'</span>'
                                .' <span class="font-normal text-neutral-500 dark:text-neutral-400">— '.$snippet.'</span>'
                                .'</div>';
                        }),
                    TextColumn::make('created_at')
                        ->label('')
                        ->since()
                        ->grow(false)
                        ->wrap(false)
                        ->color('gray')
                        ->size('sm')
                        ->extraCellAttributes(['class' => 'whitespace-nowrap ps-3 align-middle shrink-0']),
                ])->extraAttributes(fn (Mail $record): array => [
                    'class' => '!gap-3 min-w-0 flex-1 items-center md:flex-row'
                        .($record->is_read ? ' mail-inbox-read-dim' : ''),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->defaultPaginationPageOption(25)
            ->filters([])
            ->actions([
                TableRecordAction::make('smtpDeliveredIndicator')
                    ->label('')
                    ->icon(fn (Mail $record): string => $record->smtp_delivered
                        ? 'heroicon-o-paper-airplane'
                        : 'heroicon-o-circle-stack')
                    ->iconButton()
                    ->color(fn (Mail $record): string => $record->smtp_delivered ? 'success' : 'gray')
                    ->tooltip(fn (Mail $record): string => $record->smtp_delivered
                        ? __('Delivered via SMTP')
                        : __('Saved in the database only (SMTP disabled or send failed).'))
                    ->hidden(fn (Mail $record): bool => ! $record->is_sent)
                    ->action(static function (): void {}),
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
            ], ActionsPosition::BeforeColumns)
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
            'unread' => Pages\ManageMailUnread::route('/unread'),
            'read' => Pages\ManageMailRead::route('/read'),
            'important' => Pages\ManageMailImportant::route('/important'),
            'sent' => Pages\ManageMailSent::route('/sent'),
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

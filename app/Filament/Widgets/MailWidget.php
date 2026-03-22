<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Tables\Actions\Action as TableRecordAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class MailWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int $limit = 5;

    protected int|string|array $columnSpan = 'full';

    protected function getTableHeading(): string|Htmlable|null
    {
        return __('Inbox');
    }

    protected function getTableDescription(): string|Htmlable|null
    {
        $count = Mail::query()
            ->where('is_read', false)
            ->where('is_sent', false)
            ->count();

        $prefix = __('Same compact list as the mail inbox. Up to :max unread messages; click a row to open.', [
            'max' => $this->limit,
        ]);

        if ($count === 0) {
            return $prefix.' '.__('Right now there are no unread messages.');
        }

        return $prefix.' '.trans_choice(
            '{1} :count unread message|[2,*] :count unread messages',
            $count,
            ['count' => $count]
        );
    }

    public function table(Table $table): Table
    {
        return $table
            ->description(fn () => $this->getTableDescription())
            ->query(
                Mail::query()
                    ->where('is_read', false)
                    ->where('is_sent', false)
                    ->latest('created_at')
                    ->limit($this->limit)
            )
            ->recordUrl(fn (?Mail $record): ?string => $record
                ? MailResource::getUrl('view', ['record' => $record])
                : null)
            ->headerActions([
                TableRecordAction::make('openInbox')
                    ->label(__('Open inbox'))
                    ->url(MailResource::getUrl('index'))
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('gray')
                    ->outlined()
                    ->size('sm'),
            ])
            ->striped(false)
            ->selectable(false)
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
                        ->wrap(false)
                        ->tooltip(fn (Mail $record): string => $record->subject)
                        ->html()
                        ->formatStateUsing(function (mixed $state, Mail $record): string {
                            $name = e($record->name);
                            $subject = e(Str::limit($record->subject, 72));
                            $snippet = e(MailResource::plainBodyPreview($record->body, 100));
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
                    EditAction::make()
                        ->modalHeading(__('Mail')),
                    DeleteAction::make()
                        ->label(__('Move to Trash')),
                ]),
            ], ActionsPosition::BeforeColumns)
            ->paginated(false)
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading(__('Nothing new'))
            ->emptyStateDescription(__('Unread contact messages appear here as soon as they arrive.'))
            ->emptyStateIcon('heroicon-o-sparkles')
            ->emptyStateActions([
                TableRecordAction::make('browseInbox')
                    ->label(__('Go to inbox'))
                    ->url(MailResource::getUrl('index'))
                    ->icon('heroicon-o-inbox-stack')
                    ->button()
                    ->color('gray'),
            ]);
    }
}

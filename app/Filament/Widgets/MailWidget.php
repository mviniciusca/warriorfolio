<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\Action as TableAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

class MailWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected int $limit = 8;

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

        $prefix = __('Quick view of unread contact messages. Click a card to open the full message in the inbox.');

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
                    ->latest('id')
                    ->limit($this->limit)
            )
            ->recordUrl(fn (?Mail $record): ?string => $record
                ? MailResource::getUrl('view', ['record' => $record])
                : null)
            ->headerActions([
                TableAction::make('openInbox')
                    ->label(__('Open inbox'))
                    ->url(MailResource::getUrl('index'))
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->button()
                    ->size('sm')
                    ->color('gray'),
            ])
            ->contentGrid([
                'default' => 1,
                'md' => 2,
                'xl' => 2,
            ])
            ->columns([
                Panel::make([
                    Split::make([
                        TextColumn::make('id')
                            ->label('')
                            ->alignCenter()
                            ->formatStateUsing(function (mixed $state, ?Mail $record): string {
                                if ($record === null) {
                                    return '?';
                                }
                                $letter = Str::upper(Str::substr(Str::squish($record->name), 0, 1));

                                return $letter !== '' ? $letter : '?';
                            })
                            ->weight(FontWeight::Bold)
                            ->color('primary')
                            ->size('lg')
                            ->grow(false),

                        Stack::make([
                            TextColumn::make('subject')
                                ->label(__('Subject'))
                                ->weight(FontWeight::SemiBold)
                                ->formatStateUsing(fn (string $state): string => Str::limit(Str::squish($state), 52)),

                            TextColumn::make('name')
                                ->label(__('From'))
                                ->color('gray')
                                ->formatStateUsing(function (string $state, ?Mail $record): string {
                                    $line = $record
                                        ? Str::squish($state).' · '.Str::squish($record->email)
                                        : Str::squish($state);

                                    return Str::limit($line, 68);
                                }),

                            TextColumn::make('body')
                                ->label(__('Preview'))
                                ->color('gray')
                                ->formatStateUsing(fn (?string $state): string => MailResource::plainBodyPreview($state, 96)),
                        ])
                            ->space(1)
                            ->extraAttributes([
                                'class' => 'min-w-0 max-w-full overflow-hidden',
                            ]),

                        Stack::make([
                            TextColumn::make('created_at')
                                ->label('')
                                ->since()
                                ->alignment(Alignment::End)
                                ->color('gray')
                                ->size('sm'),

                            TextColumn::make('is_important')
                                ->label('')
                                ->formatStateUsing(fn (mixed $state): string => (bool) $state ? '★' : '')
                                ->color('warning')
                                ->alignment(Alignment::End)
                                ->visible(fn (?Mail $record): bool => (bool) $record?->is_important),
                        ])->alignment(Alignment::End)->space(1)->grow(false),
                    ])->from('sm'),
                ])
                    ->extraAttributes(fn (?Mail $record): array => [
                        'class' => 'h-full min-w-0 max-w-full overflow-hidden rounded-2xl border border-gray-200/90 bg-gradient-to-br from-white to-gray-50/80 p-4 shadow-sm transition duration-150 hover:border-primary-400/40 hover:shadow-md dark:border-white/10 dark:from-gray-950 dark:to-gray-900/80'
                            .($record !== null && $record->is_important ? ' ring-1 ring-amber-400/35 dark:ring-amber-500/25' : ''),
                    ]),
            ])
            ->emptyStateHeading(__('Nothing new'))
            ->emptyStateDescription(__('Unread contact messages appear here as soon as they arrive.'))
            ->emptyStateIcon('heroicon-o-sparkles')
            ->emptyStateActions([
                TableAction::make('browseInbox')
                    ->label(__('Go to inbox'))
                    ->url(MailResource::getUrl('index'))
                    ->icon('heroicon-o-inbox-stack')
                    ->button()
                    ->color('gray'),
            ])
            ->recordClasses('min-w-0 max-w-full [&_td]:min-w-0')
            ->paginated(false)
            ->striped(false);
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageCommentResource\Pages;
use App\Filament\Support\PageCommentTableActions;
use App\Models\Page;
use App\Models\PageComment;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class PageCommentResource extends Resource
{
    protected static ?string $model = PageComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string
    {
        return __('Comments');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::query()->pending()->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('page_id')
                    ->label(__('Post (page)'))
                    ->relationship(
                        'page',
                        'title',
                        fn (Builder $query) => $query->where('style', 'blog')->orderBy('title')
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live(onBlur: true),
                Select::make('parent_id')
                    ->label(__('Reply to'))
                    ->options(function (callable $get): array {
                        $pageId = $get('page_id');
                        if (! $pageId) {
                            return [];
                        }

                        return PageComment::query()
                            ->where('page_id', $pageId)
                            ->where('status', PageComment::STATUS_APPROVED)
                            ->orderBy('created_at')
                            ->get()
                            ->mapWithKeys(fn (PageComment $c) => [
                                $c->id => $c->author_name.' — '.str($c->body)->limit(40),
                            ])
                            ->all();
                    })
                    ->searchable()
                    ->nullable(),
                TextInput::make('author_name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('author_email')
                    ->label(__('Email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Textarea::make('body')
                    ->label(__('Comment'))
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Select::make('status')
                    ->label(__('Status'))
                    ->options([
                        PageComment::STATUS_PENDING => __('Pending'),
                        PageComment::STATUS_APPROVED => __('Approved'),
                        PageComment::STATUS_REJECTED => __('Rejected'),
                    ])
                    ->required()
                    ->default(PageComment::STATUS_PENDING),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with(['page', 'parent']))
            ->persistFiltersInSession(false)
            ->persistSearchInSession(false)
            ->persistSortInSession(false)
            ->paginated(false)
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                PageCommentTableActions::approveAllPendingHeaderAction(),
                PageCommentTableActions::deleteAllPendingHeaderAction(),
            ])
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('')
                    ->square()
                    ->size(40)
                    ->getStateUsing(fn (PageComment $record) => $record->avatar_url),
                Tables\Columns\TextColumn::make('page.title')
                    ->label(__('Post'))
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->url(fn (PageComment $record): ?string => $record->page_id
                        ? route('filament.admin.resources.posts.edit', ['record' => $record->page_id])
                        : null),
                Tables\Columns\TextColumn::make('author_name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('author_email')
                    ->label(__('Email'))
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('body')
                    ->label(__('Comment'))
                    ->limit(45)
                    ->wrap(),
                Tables\Columns\TextColumn::make('parent.author_name')
                    ->label(__('Reply to'))
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        PageComment::STATUS_APPROVED => 'success',
                        PageComment::STATUS_REJECTED => 'danger',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Submitted'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('moderated_at')
                    ->label(__('Moderated'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('page_id')
                    ->label(__('Post'))
                    ->options(fn (): array => Page::query()
                        ->where('style', 'blog')
                        ->orderBy('title')
                        ->pluck('title', 'id')
                        ->toArray())
                    ->searchable()
                    ->preload()
                    ->query(function (Builder $query, array $data): Builder {
                        $value = $data['value'] ?? ($data['values'] ?? null);
                        if (is_array($value)) {
                            $value = head($value);
                        }

                        if (blank($value)) {
                            return $query;
                        }

                        if (is_numeric($value)) {
                            return $query->where('page_id', (int) $value);
                        }

                        $pageId = Page::query()
                            ->where('style', 'blog')
                            ->where(function (Builder $pageQuery) use ($value): void {
                                $pageQuery
                                    ->where('title', $value)
                                    ->orWhere('title', 'like', '%'.$value.'%');
                            })
                            ->value('id');

                        if ($pageId) {
                            return $query->where('page_id', $pageId);
                        }

                        return $query->whereHas('page', function (Builder $pageQuery) use ($value): void {
                            $pageQuery->where('title', 'like', '%'.$value.'%');
                        });
                    }),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        PageComment::STATUS_PENDING => __('Pending'),
                        PageComment::STATUS_APPROVED => __('Approved'),
                        PageComment::STATUS_REJECTED => __('Rejected'),
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    PageCommentTableActions::viewOnPostAction(),
                    Tables\Actions\Action::make('approve')
                        ->label(__('Approve'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn (PageComment $record) => $record->status !== PageComment::STATUS_APPROVED)
                        ->requiresConfirmation()
                        ->action(function (PageComment $record): void {
                            $record->update([
                                'status' => PageComment::STATUS_APPROVED,
                                'moderated_at' => now(),
                                'moderated_by' => Auth::id(),
                            ]);
                        }),
                    Tables\Actions\Action::make('reject')
                        ->label(__('Reject'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn (PageComment $record) => $record->status !== PageComment::STATUS_REJECTED)
                        ->requiresConfirmation()
                        ->action(function (PageComment $record): void {
                            $record->update([
                                'status' => PageComment::STATUS_REJECTED,
                                'moderated_at' => now(),
                                'moderated_by' => Auth::id(),
                            ]);
                        }),
                    Tables\Actions\DeleteAction::make(),
                ])->label(__('Actions')),
            ])
            ->bulkActions([
                PageCommentTableActions::bulkActionGroup(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageComments::route('/'),
            'edit' => Pages\EditPageComment::route('/{record}/edit'),
        ];
    }
}

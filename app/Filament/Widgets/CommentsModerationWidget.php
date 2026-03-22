<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PageCommentResource;
use App\Filament\Resources\PostResource;
use App\Filament\Support\PageCommentTableActions;
use App\Models\PageComment;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentsModerationWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int $limit = 10;

    protected int|string|array $columnSpan = 'full';

    protected function getTableHeading(): string|Htmlable|null
    {
        return __('Comments awaiting moderation');
    }

    public function table(Table $table): Table
    {
        return $table
            ->description(
                __(
                    'Comments visitors left on your notes that are still pending. Approve to show them on the site, or reject / delete to keep them hidden.'
                )
            )
            ->query(
                PageComment::query()
                    ->pending()
                    ->with(['page'])
                    ->latest('created_at')
                    ->limit($this->limit)
            )
            ->recordTitleAttribute('author_name')
            ->headerActions([
                Action::make('viewAll')
                    ->label(__('View all comments'))
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url(PageCommentResource::getUrl('index'))
                    ->outlined()
                    ->size('xs'),
                PageCommentTableActions::approveAllPendingHeaderAction(),
                PageCommentTableActions::deleteAllPendingHeaderAction(),
            ])
            ->columns([
                TextColumn::make('author_name')
                    ->label(__('Author'))
                    ->searchable()
                    ->description(fn (PageComment $record): string => Str::limit((string) $record->author_email, 36))
                    ->icon('heroicon-m-user'),
                TextColumn::make('body')
                    ->label(__('Comment'))
                    ->wrap()
                    ->limit(80),
                TextColumn::make('page.title')
                    ->label(__('Post'))
                    ->placeholder('—')
                    ->limit(36)
                    ->url(fn (PageComment $record): ?string => $record->page_id
                        ? PostResource::getUrl('edit', ['record' => $record->page_id])
                        : null)
                    ->icon('heroicon-m-document-text'),
                TextColumn::make('created_at')
                    ->label(__('Submitted'))
                    ->since()
                    ->sortable(),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('edit')
                        ->label(__('Edit'))
                        ->icon('heroicon-m-pencil-square')
                        ->url(fn (PageComment $record): string => PageCommentResource::getUrl('edit', ['record' => $record])),
                    PageCommentTableActions::viewOnPostAction(),
                    Action::make('approve')
                        ->label(__('Approve'))
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading(__('Approve this comment?'))
                        ->modalDescription(__('It will be visible on the post.'))
                        ->action(function (PageComment $record): void {
                            $record->update([
                                'status' => PageComment::STATUS_APPROVED,
                                'moderated_at' => now(),
                                'moderated_by' => Auth::id(),
                            ]);
                        })
                        ->successNotificationTitle(__('Comment approved')),
                    Action::make('reject')
                        ->label(__('Reject'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading(__('Reject this comment?'))
                        ->modalDescription(__('It will not appear on the site.'))
                        ->action(function (PageComment $record): void {
                            $record->update([
                                'status' => PageComment::STATUS_REJECTED,
                                'moderated_at' => now(),
                                'moderated_by' => Auth::id(),
                            ]);
                        })
                        ->successNotificationTitle(__('Comment rejected')),
                    DeleteAction::make()
                        ->modalHeading(__('Delete comment')),
                ])
                    ->label(__('Actions'))
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->button()
                    ->size('sm')
                    ->outlined(),
            ])
            ->bulkActions([
                PageCommentTableActions::bulkActionGroup(),
            ])
            ->emptyStateHeading(__('No pending comments'))
            ->emptyStateDescription(__('New submissions will show up here for review.'))
            ->emptyStateIcon('heroicon-o-chat-bubble-bottom-center-text')
            ->paginated(false)
            ->striped();
    }
}

<?php

namespace App\Filament\Support;

use App\Models\PageComment;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Bulk + header actions for every Filament table that lists {@see PageComment}.
 */
final class PageCommentTableActions
{
    public static function viewOnPostAction(): Action
    {
        return Action::make('viewOnPost')
            ->label(__('View on post'))
            ->icon('heroicon-o-arrow-top-right-on-square')
            ->url(fn (PageComment $record): string => $record->urlOnPublicPost() ?? '')
            ->openUrlInNewTab()
            ->visible(fn (PageComment $record): bool => $record->hasPublicPostUrl());
    }

    public static function bulkActionGroup(): BulkActionGroup
    {
        return BulkActionGroup::make([
            BulkAction::make('approve')
                ->label(__('Approve selected'))
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading(__('Approve selected comments?'))
                ->modalDescription(__('Pending and rejected comments will be published. Already approved rows are skipped.'))
                ->action(function (Collection $records): void {
                    $records->each(function (PageComment $record): void {
                        if ($record->status === PageComment::STATUS_APPROVED) {
                            return;
                        }
                        $record->update([
                            'status' => PageComment::STATUS_APPROVED,
                            'moderated_at' => now(),
                            'moderated_by' => Auth::id(),
                        ]);
                    });
                })
                ->deselectRecordsAfterCompletion(),
            BulkAction::make('reject')
                ->label(__('Reject selected'))
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading(__('Reject selected comments?'))
                ->modalDescription(__('Pending and published comments will be rejected. Already rejected rows are skipped.'))
                ->action(function (Collection $records): void {
                    $records->each(function (PageComment $record): void {
                        if ($record->status === PageComment::STATUS_REJECTED) {
                            return;
                        }
                        $record->update([
                            'status' => PageComment::STATUS_REJECTED,
                            'moderated_at' => now(),
                            'moderated_by' => Auth::id(),
                        ]);
                    });
                })
                ->deselectRecordsAfterCompletion(),
            BulkAction::make('setPending')
                ->label(__('Set to pending again'))
                ->icon('heroicon-o-eye-slash')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading(__('Return selected comments to pending?'))
                ->modalDescription(__('Approved or rejected comments will be hidden from the post until you approve them again. Nothing is deleted.'))
                ->action(function (Collection $records): void {
                    $records->each(function (PageComment $record): void {
                        if ($record->status === PageComment::STATUS_PENDING) {
                            return;
                        }
                        $record->update([
                            'status' => PageComment::STATUS_PENDING,
                            'moderated_at' => null,
                            'moderated_by' => null,
                        ]);
                    });
                })
                ->deselectRecordsAfterCompletion(),
            DeleteBulkAction::make(),
        ]);
    }

    public static function approveAllPendingForPageHeaderAction(int $pageId): Action
    {
        return Action::make('approveAllPendingOnPost')
            ->label(__('Approve all pending on this post'))
            ->icon('heroicon-o-check-badge')
            ->color('success')
            ->requiresConfirmation()
            ->modalHeading(__('Approve every pending comment on this post?'))
            ->modalDescription(function () use ($pageId): string {
                $count = PageComment::query()->where('page_id', $pageId)->pending()->count();

                return __(':count pending comment(s) on this post will be published.', ['count' => $count]);
            })
            ->visible(fn () => PageComment::query()->where('page_id', $pageId)->pending()->exists())
            ->action(function () use ($pageId): void {
                PageComment::query()
                    ->where('page_id', $pageId)
                    ->pending()
                    ->orderBy('id')
                    ->chunkById(100, function (Collection $chunk): void {
                        $chunk->each(function (PageComment $record): void {
                            $record->update([
                                'status' => PageComment::STATUS_APPROVED,
                                'moderated_at' => now(),
                                'moderated_by' => Auth::id(),
                            ]);
                        });
                    });
            });
    }

    public static function deleteAllPendingForPageHeaderAction(int $pageId): Action
    {
        return Action::make('deleteAllPendingOnPost')
            ->label(__('Delete all pending on this post'))
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading(__('Delete every pending comment on this post?'))
            ->modalDescription(function () use ($pageId): string {
                $count = PageComment::query()->where('page_id', $pageId)->pending()->count();

                return __(':count pending comment(s) on this post will be permanently deleted.', ['count' => $count]);
            })
            ->visible(fn () => PageComment::query()->where('page_id', $pageId)->pending()->exists())
            ->action(function () use ($pageId): void {
                PageComment::query()
                    ->where('page_id', $pageId)
                    ->pending()
                    ->orderBy('id')
                    ->chunkById(100, function (Collection $chunk): void {
                        $chunk->each->delete();
                    });
            });
    }

    /**
     * Aprova todos os comentários pendentes (site inteiro). Usa eventos do model linha a linha.
     */
    public static function approveAllPendingHeaderAction(): Action
    {
        return Action::make('approveAllPending')
            ->label(__('Approve all pending'))
            ->icon('heroicon-o-check-badge')
            ->color('success')
            ->requiresConfirmation()
            ->modalHeading(__('Approve every pending comment?'))
            ->modalDescription(function (): string {
                $count = PageComment::query()->pending()->count();

                return __(':count pending comment(s) will be published.', ['count' => $count]);
            })
            ->visible(fn (): bool => PageComment::query()->pending()->exists())
            ->action(function (): void {
                PageComment::query()
                    ->pending()
                    ->orderBy('id')
                    ->chunkById(100, function (Collection $chunk): void {
                        $chunk->each(function (PageComment $record): void {
                            $record->update([
                                'status' => PageComment::STATUS_APPROVED,
                                'moderated_at' => now(),
                                'moderated_by' => Auth::id(),
                            ]);
                        });
                    });
            });
    }

    /**
     * Elimina todos os comentários pendentes (site inteiro).
     */
    public static function deleteAllPendingHeaderAction(): Action
    {
        return Action::make('deleteAllPending')
            ->label(__('Delete all pending'))
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading(__('Delete every pending comment?'))
            ->modalDescription(function (): string {
                $count = PageComment::query()->pending()->count();

                return __(':count pending comment(s) will be permanently deleted.', ['count' => $count]);
            })
            ->visible(fn (): bool => PageComment::query()->pending()->exists())
            ->action(function (): void {
                PageComment::query()
                    ->pending()
                    ->orderBy('id')
                    ->chunkById(100, function (Collection $chunk): void {
                        $chunk->each->delete();
                    });
            });
    }
}

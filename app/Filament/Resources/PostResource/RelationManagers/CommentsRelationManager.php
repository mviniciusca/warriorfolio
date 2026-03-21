<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use App\Filament\Support\PageCommentTableActions;
use App\Models\PageComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public static function getTitle(\Illuminate\Database\Eloquent\Model $ownerRecord, string $pageClass): string
    {
        return __('Comments');
    }

    public static function canViewForRecord(Model $ownerRecord, string $pageClass): bool
    {
        return true;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                    ->label(__('Reply to'))
                    ->options(function (): array {
                        return PageComment::query()
                            ->where('page_id', $this->ownerRecord->getKey())
                            ->where('status', PageComment::STATUS_APPROVED)
                            ->orderBy('created_at')
                            ->get()
                            ->mapWithKeys(fn (PageComment $c) => [
                                $c->getKey() => $c->author_name.' — '.str($c->body)->limit(40),
                            ])
                            ->all();
                    })
                    ->searchable()
                    ->nullable(),
                Forms\Components\TextInput::make('author_name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('author_email')
                    ->label(__('Email'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('body')
                    ->label(__('Comment'))
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
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

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->where('page_id', $this->ownerRecord->getKey()))
            ->persistFiltersInSession(false)
            ->persistSearchInSession(false)
            ->persistSortInSession(false)
            ->paginated(false)
            ->recordTitleAttribute('author_name')
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('')
                    ->square()
                    ->size(36)
                    ->getStateUsing(fn (PageComment $record) => $record->avatar_url),
                Tables\Columns\TextColumn::make('author_name')
                    ->label(__('Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('body')
                    ->label(__('Comment'))
                    ->limit(45)
                    ->wrap(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        PageComment::STATUS_APPROVED => 'success',
                        PageComment::STATUS_REJECTED => 'danger',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        PageComment::STATUS_PENDING => __('Pending'),
                        PageComment::STATUS_APPROVED => __('Approved'),
                        PageComment::STATUS_REJECTED => __('Rejected'),
                    ]),
            ])
            ->headerActions([
                PageCommentTableActions::approveAllPendingForPageHeaderAction($this->ownerRecord->getKey()),
                PageCommentTableActions::deleteAllPendingForPageHeaderAction($this->ownerRecord->getKey()),
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
}

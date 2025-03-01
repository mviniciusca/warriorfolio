<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Page;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class BinPost extends ListRecords
{
    protected static string $resource = PostResource::class;

    public static function getNavigationLabel(): string
    {
        return __('Trashed Notes');
    }

    public function getTitle(): string | Htmlable
    {
        return __('');
    }

    public function table(Table $table): Table
    {
        return $table->
        query(Page::query()
            ->with('post')
            ->where('style', '=', 'blog')
            ->onlyTrashed())
            ->recordUrl(false)
            ->headerActions([
                Action::make('back_to_posts')
                    ->outlined()
                    ->size('sm')
                    ->label(__('Back to Notes'))
                    ->icon('heroicon-o-arrow-left')
                    ->url(route('filament.admin.resources.posts.index')),
            ])
            ->heading(__('Trashed Notes'))
            ->description(__('Manage your deleted notes.'))
            ->bulkActions([
                BulkActionGroup::make([
                    RestoreBulkAction::make(),
                    DeleteBulkAction::make(),

                ]),
            ])
            ->actions([
                ActionGroup::make([
                    RestoreAction::make()
                        ->label(__('Restore Note')),
                    ForceDeleteAction::make()
                        ->label(__('Force Delete')),
                ]),
            ])
            ->columns([
                TextColumn::make('title')
                    ->limit(60)
                    ->label(__('Title')),
                TextColumn::make('post.category.name')
                    ->limit(30)
                    ->badge()
                    ->label(__('Category')),
            ]);
    }
}

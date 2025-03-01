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

class BinPost extends ListRecords
{
    protected static string $resource = PostResource::class;

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
                    ->label(__('Back to Notes'))
                    ->icon('heroicon-o-arrow-left')
                    ->url(route('filament.admin.resources.posts.index')),
            ])
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
                TextColumn::make('title'),
            ]);
    }
}

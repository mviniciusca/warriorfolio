<?php

namespace App\Filament\Widgets;

use App\Models\Page;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostsWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected static ?string $model = Page::class;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->paginated(false)
            ->searchable(false)
            ->recordClasses(fn (Page $record): string|null => match ($record->is_active) {
                0       => 'opacity-50 dark:opacity-30',
                default => null,
            })
            ->heading(__('Latest Posts'))
            ->description(__('Your latest posts from your blog.'))
            ->query(
                Page::query()
                    ->with('post')
                    ->where('style', '=', 'blog')
                    ->latest('created_at')
                    ->take(5)
            )
            ->recordUrl(fn (Page $record) => route('filament.admin.resources.posts.edit', $record?->id))
            ->headerActions(
                [
                    ViewAction::make('new')
                        ->icon('heroicon-o-pencil')
                        ->color('primary')
                        ->size('xs')
                        ->outlined()
                        ->url(route('filament.admin.resources.posts.create'))
                        ->label(__('New Post')),
                    ViewAction::make()
                        ->url(route('filament.admin.resources.posts.index'))
                        ->label(__('View All'))
                        ->icon('heroicon-o-arrow-up-right')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->columns([
                TextColumn::make('title')
                    ->label(__('Post Title'))
                    ->limit(50),
                TextColumn::make('post.category.name')
                    ->label(__('Category'))
                    ->badge(),
                IconColumn::make('is_active')
                    ->label(__('Published'))
                    ->alignCenter()
                    ->boolean()
                    ->label(__('Published')),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

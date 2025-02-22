<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PostsWidget extends BaseWidget
{
    protected static ?int $sort = 0;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->paginated(false)
            ->searchable(false)
            ->recordClasses(fn (Post $record) => match ($record->is_active) {
                0       => 'opacity-50 dark:opacity-30',
                default => null,
            })
            ->heading(__('Latest Posts'))
            ->description(__('Your latest posts from your blog.'))
            ->query(
                Post::query()
                    ->latest('created_at')
                    ->with('page')
                    ->take(5)
            )
            ->headerActions(
                [
                    ViewAction::make('new')
                        ->icon('heroicon-o-pencil')
                        ->color('primary')
                        ->size('xs')
                        ->url(route('filament.admin.resources.posts.create'))
                        ->label(__('New Post')),
                    ViewAction::make()
                        ->url(route('filament.admin.resources.posts.index'))
                        ->label(__('View All'))
                        ->icon('heroicon-o-pencil')
                        ->outlined()
                        ->size('xs'),
                ]
            )
            ->recordUrl(fn (Post $record) => route('filament.admin.resources.posts.edit', $record->page->id))
            ->columns([
                TextColumn::make('page.title')
                    ->label(__('Post Title'))
                    ->limit(50),
                TextColumn::make('category.name')
                    ->label(__('Category'))
                    ->badge(),
                IconColumn::make('is_active')
                    ->label(__('Published'))
                    ->alignCenter()
                    ->boolean()
                    ->label(__('Published')),
            ]);
    }
}

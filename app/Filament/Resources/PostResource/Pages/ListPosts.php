<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Blog Posts');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('view_blog_settings')
                ->url(route('filament.admin.resources.settings.edit-blog', 1))
                ->color('secondary')
                ->icon('heroicon-o-cog-6-tooth')
                ->label(__('Settings')),
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil')
                ->label(__('New Post')),
        ];
    }
}

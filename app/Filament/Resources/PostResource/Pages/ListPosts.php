<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Notes');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-pencil')
                ->size('sm')
                ->label(__('New Note')),
            Actions\Action::make('view_blog_settings')
                ->url(route('filament.admin.resources.settings.edit-blog', Setting::first('id')->id))
                ->color('gray')
                ->size('sm')
                ->icon('heroicon-o-cog-6-tooth')
                ->label(__('Settings')),
        ];
    }
}

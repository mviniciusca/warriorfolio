<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Notes');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('Write and publish notes, control visibility and open the Notes module settings when you need them.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Note'))
                ->icon('heroicon-o-document-plus')
                ->size('sm'),
            Actions\Action::make('view_blog_settings')
                ->url(SettingResource::getUrl('edit-blog', ['record' => Setting::query()->value('id')]))
                ->color('gray')
                ->size('sm')
                ->icon('heroicon-o-cog-6-tooth')
                ->label(__('Settings')),
        ];
    }
}

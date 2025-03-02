<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    public function getTitle(): string | Htmlable
    {
        return __('Create Note');
    }
}

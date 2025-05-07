<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    public static function getResource(): string
    {
        return config('filament-fabricator.page-resource') ?? static::$resource;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}

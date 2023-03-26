<?php

namespace App\Filament\Resources\Project\TagResource\Pages;

use App\Filament\Resources\Project\TagResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;
}

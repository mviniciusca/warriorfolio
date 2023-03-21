<?php

namespace App\Filament\Resources\Hero\WelcomeResource\Pages;

use App\Filament\Resources\Hero\WelcomeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWelcome extends CreateRecord
{
    protected static string $resource = WelcomeResource::class;
}

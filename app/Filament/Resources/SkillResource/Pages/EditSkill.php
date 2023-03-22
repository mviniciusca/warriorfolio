<?php

namespace App\Filament\Resources\SkillResource\Pages;

use App\Filament\Resources\SkillResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkill extends EditRecord
{
    protected static string $resource = SkillResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

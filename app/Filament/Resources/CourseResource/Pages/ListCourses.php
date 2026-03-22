<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Courses & Certifications');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('List training, certifications and education entries shown on your profile.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('New Course'))
                ->icon('heroicon-o-academic-cap')
                ->size('sm'),
        ];
    }
}

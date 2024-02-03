<?php

use Filament\Notifications\Collection;
use Illuminate\Database\Eloquent\Model;

if (!function_exists('getSlider')) {
    function getSlider(string $module_name, Model $model): Model|Collection|null
    {
        $sliders = $model
            ->query()
            ->select()
            ->where('module_name', '=', $module_name)
            ->where('is_active', '=', true)
            ->get();
        return $sliders->first();
    }

}


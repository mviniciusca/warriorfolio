<?php

use App\Models\Setting;
use Filament\Notifications\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Get the first slider for a given module name.
 */
if (! function_exists('getSlider')) {
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

    /**
     * Get the settings from container layout in database.
     */
    if (! function_exists('settings')) {
        function settings(string $key, mixed $default = null): mixed
        {
            $settings = Setting::query()
                ->with(['layout'])
                ->first();

            return data_get($settings, $key, $default);
        }
    }
}

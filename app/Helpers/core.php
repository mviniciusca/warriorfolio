<?php

use App\Models\Setting;
use Filament\Notifications\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

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
            $setting = Setting::query()
                ->with(['layout'])
                ->first();

            return data_get($setting, $key, $default);
        }
    }

    if (! function_exists('formatContent')) {
        function formatContent(string $content, int $words = 20, string $end = '...'): string
        {
            return Str::words(
                preg_replace('/<figure[^>]*>.*?<\/figure>/s', '', strip_tags($content, '<figure>')),
                $words,
                $end
            );
        }
    }
}

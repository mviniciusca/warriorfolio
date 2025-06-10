<?php

use App\Models\Section;
use App\Models\Setting;
use Filament\Notifications\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Returns the first active slider for a given module.
 *
 * @param string $module_name Name of the module to search for.
 * @param Model $model Eloquent model instance related to the slider.
 * @return Model|Collection|null The first active slider found or null.
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
     * Retrieves settings from the layout container in the database.
     *
     * @param string $key The configuration key (e.g., 'layout.name').
     * @param mixed $default Default value if the key does not exist.
     * @return mixed The configuration value or the default value.
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

    /**
     * Limits content to a number of words, removing <figure> tags.
     *
     * @param string $content HTML or text content.
     * @param int $words Maximum number of words.
     * @param string $end Suffix to indicate truncation.
     * @return string Formatted content.
     */
    if (! function_exists('formatContent')) {
        function formatContent(string $content, int $words = 15, string $end = '...'): string
        {
            return Str::words(
                preg_replace('/<figure[^>]*>.*?<\/figure>/s', '', strip_tags($content, '<figure>')),
                $words,
                $end
            );
        }
    }

    /**
     * Returns the activation status of a section by slug.
     *
     * @param string $slug Section identifier slug.
     * @return Section|null Section instance with the is_active field or null.
     */
    if (! function_exists('sectionStatus')) {
        function sectionStatus($slug)
        {
            return Section::where('slug', $slug)->first(['is_active']);
        }
    }
}

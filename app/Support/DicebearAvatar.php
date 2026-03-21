<?php

namespace App\Support;

/**
 * @see https://www.dicebear.com/how-to-use/http-api/
 */
final class DicebearAvatar
{
    public const DEFAULT_STYLE = 'avataaars';

    public const API_VERSION = '9.x';

    public static function url(string $seed, ?string $style = null): string
    {
        $style = $style ?? config('comments.dicebear_style', self::DEFAULT_STYLE);
        $seed = rawurlencode($seed);

        return 'https://api.dicebear.com/'.self::API_VERSION."/{$style}/svg?seed={$seed}";
    }
}

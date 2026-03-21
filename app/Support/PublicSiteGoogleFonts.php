<?php

namespace App\Support;

final class PublicSiteGoogleFonts
{
    /**
     * Default public site font is Geist; migrate legacy Inter + typical Inter embeds.
     *
     * @return array{0: string, 1: string|null}
     */
    public static function fromSettings(?array $google): array
    {
        $google ??= [];

        $fontName = $google['font_name'] ?? null;
        $code = $google['fonts_code'] ?? null;

        $fontName = ($fontName !== null && $fontName !== '') ? $fontName : 'Geist';
        $code = filled($code) ? trim((string) $code) : null;

        if (strcasecmp($fontName, 'Inter') === 0) {
            $fontName = 'Geist';
            if ($code !== null && preg_match('/Inter/i', $code)) {
                $code = null;
            }
        } elseif ($code !== null && strcasecmp($fontName, 'Geist') === 0 && preg_match('/family=Inter|Inter%3A|Inter:wght/i', $code)) {
            $code = null;
        }

        return [$fontName, $code];
    }
}

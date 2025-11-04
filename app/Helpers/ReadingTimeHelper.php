<?php

namespace App\Helpers;

class ReadingTimeHelper
{
    /**
     * Calculate reading time for given content
     *
     * @param string $content
     * @param int $wordsPerMinute Average reading speed (default: 200 words/minute)
     * @return array
     */
    public static function calculate(string $content, int $wordsPerMinute = 200): array
    {
        // Remove HTML tags and decode entities
        $plainText = html_entity_decode(strip_tags($content));

        // Count words (split by whitespace and filter empty)
        $words = array_filter(explode(' ', $plainText));
        $wordCount = count($words);

        // Calculate reading time in minutes
        $minutes = ceil($wordCount / $wordsPerMinute);

        // Handle edge cases
        if ($minutes < 1) {
            $minutes = 1;
        }

        return [
            'word_count'           => $wordCount,
            'minutes'              => $minutes,
            'formatted'            => self::formatReadingTime($minutes),
            'formatted_with_words' => self::formatWithWordCount($minutes, $wordCount),
        ];
    }

    /**
     * Format reading time for display
     */
    private static function formatReadingTime(int $minutes): string
    {
        if ($minutes === 1) {
            return '1 min read';
        }

        return "{$minutes} min read";
    }

    /**
     * Format reading time with word count
     */
    private static function formatWithWordCount(int $minutes, int $wordCount): string
    {
        $formattedWords = number_format($wordCount);
        $readTime = self::formatReadingTime($minutes);

        return "{$formattedWords} words • {$readTime}";
    }

    /**
     * Get reading time with icon for UI display
     */
    public static function getDisplayFormat(string $content, bool $showWordCount = false): array
    {
        $data = self::calculate($content);

        return [
            'minutes'    => $data['minutes'],
            'text'       => $showWordCount ? $data['formatted_with_words'] : $data['formatted'],
            'icon'       => 'time-outline',
            'word_count' => $data['word_count'],
        ];
    }
}

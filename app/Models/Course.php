<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date'   => 'datetime',
    ];

    const STATUS_COMPLETED = 'completed';

    const STATUS_IN_PROGRESS = 'in-progress';

    const STATUS_PLANNED = 'planned';

    const STATUS_DROPPED = 'dropped';

    /**
     * Get the icon based on the course status.
     */
    public function getStatusIcon(): string
    {
        return match ($this->status) {
            self::STATUS_COMPLETED   => 'checkmark-circle-outline',
            self::STATUS_IN_PROGRESS => 'time-outline',
            self::STATUS_PLANNED     => 'calendar-outline',
            self::STATUS_DROPPED     => 'close-circle-outline',
            default                  => 'help-circle-outline',
        };
    }

    /**
     * Get the color based on the course status.
     */
    public function getStatusColor(): array
    {
        return match ($this->status) {
            self::STATUS_COMPLETED => [
                'border'      => 'border-green-200',
                'text'        => 'text-green-600',
                'dark_border' => 'dark:border-green-900',
                'dark_text'   => 'dark:text-green-400',
            ],
            self::STATUS_IN_PROGRESS => [
                'border'      => 'border-yellow-200',
                'text'        => 'text-yellow-600',
                'dark_border' => 'dark:border-yellow-900',
                'dark_text'   => 'dark:text-yellow-400',
            ],
            self::STATUS_PLANNED => [
                'border'      => 'border-blue-200',
                'text'        => 'text-blue-600',
                'dark_border' => 'dark:border-blue-900',
                'dark_text'   => 'dark:text-blue-400',
            ],
            self::STATUS_DROPPED => [
                'border'      => 'border-red-200',
                'text'        => 'text-red-600',
                'dark_border' => 'dark:border-red-900',
                'dark_text'   => 'dark:text-red-400',
            ],
            default => [
                'border'      => 'border-gray-200',
                'text'        => 'text-gray-600',
                'dark_border' => 'dark:border-gray-900',
                'dark_text'   => 'dark:text-gray-400',
            ],
        };
    }

    /**
     * Get the label based on the course status.
     */
    public function getStatusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_COMPLETED   => __('Completed'),
            self::STATUS_IN_PROGRESS => __('In Progress'),
            self::STATUS_PLANNED     => __('Upcoming'),
            self::STATUS_DROPPED     => __('Cancelled'),
            default                  => __('Unknown'),
        };
    }
}

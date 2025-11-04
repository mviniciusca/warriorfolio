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
                'border'      => 'border-secondary-200',
                'text'        => 'text-secondary-600',
                'dark_border' => 'dark:border-secondary-800',
                'dark_text'   => 'dark:text-secondary-400',
            ],
            self::STATUS_IN_PROGRESS => [
                'border'      => 'border-secondary-200',
                'text'        => 'text-secondary-600',
                'dark_border' => 'dark:border-secondary-800',
                'dark_text'   => 'dark:text-secondary-400',
            ],
            self::STATUS_PLANNED => [
                'border'      => 'border-secondary-200',
                'text'        => 'text-secondary-600',
                'dark_border' => 'dark:border-secondary-800',
                'dark_text'   => 'dark:text-secondary-400',
            ],
            self::STATUS_DROPPED => [
                'border'      => 'border-secondary-200',
                'text'        => 'text-secondary-600',
                'dark_border' => 'dark:border-secondary-800',
                'dark_text'   => 'dark:text-secondary-400',
            ],
            default => [
                'border'      => 'border-secondary-200',
                'text'        => 'text-secondary-600',
                'dark_border' => 'dark:border-secondary-800',
                'dark_text'   => 'dark:text-secondary-400',
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

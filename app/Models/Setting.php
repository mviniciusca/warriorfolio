<?php

namespace App\Models;

use App\Models\Chatbox;
use App\Models\Core;
use App\Models\Layout;
use App\Models\Maintenance;
use App\Models\Module;
use App\Models\Navigation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'application' => 'array',
        'design'      => 'array',
        'meta'        => 'array',
        'google'      => 'array',
        'scripts'     => 'array',
        'blog'        => 'array',
    ];

    /**
     * Summary of user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of module
     * @return HasOne
     */
    public function module(): HasOne
    {
        return $this->hasOne(Module::class);
    }

    /**
     * Summary of layout
     * @return HasOne
     */
    public function layout(): HasOne
    {
        return $this->hasOne(Layout::class);
    }

    /**
     * Summary of chatbox
     * @return HasOne
     */
    public function chatbox(): HasOne
    {
        return $this->hasOne(Chatbox::class);
    }

    /**
     * Summary of maintenance
     * @return HasOne
     */
    public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class);
    }

    /**
     * Summary of navigation
     * @return HasOne
     */
    public function navigation(): HasOne
    {
        return $this->hasOne(Navigation::class);
    }

    /**
     * Summary of core
     * @return HasOne
     */
    public function core(): HasOne
    {
        return $this->hasOne(Core::class);
    }

    public function systemStatus(): array|string|null
    {
        $status = $this->maintenance()
            ->where('is_active', true)
            ->first();

        if ($status) {
            return __('System is under maintenance');
        } else {
            return __('System is active');
        }
    }
}

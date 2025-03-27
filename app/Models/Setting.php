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
        'config'      => 'array',
    ];

    /**
     * Get the user that owns the setting.
     *
     * This method defines an inverse one-to-many relationship between the Setting model
     * and the User model. It indicates that each setting belongs to a single user.
     *
     * @return BelongsTo The relationship instance linking the Setting to its owning User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the module associated with the setting.
     *
     * This method defines a one-to-one relationship between the Setting model
     * and the Module model.
     *
     * @return HasOne The relationship instance linking the Setting to its associated Module.
     */
    public function module(): HasOne
    {
        return $this->hasOne(Module::class);
    }

    /**
     * Get the layout associated with the setting.
     *
     * This method defines a one-to-one relationship between the Setting model
     * and the Layout model.
     *
     * @return HasOne The relationship instance linking the Setting to its associated Layout.
     */
    public function layout(): HasOne
    {
        return $this->hasOne(Layout::class);
    }

    /**
     * Get the chatbox associated with the setting.
     *
     * This method defines a one-to-one relationship between the Setting model
     * and the Chatbox model.
     *
     * @return HasOne The relationship instance linking the Setting to its associated Chatbox.
     */
    public function chatbox(): HasOne
    {
        return $this->hasOne(Chatbox::class);
    }

    /**
     * Get the maintenance settings associated with the setting.
     *
     * This method defines a one-to-one relationship between the Setting model
     * and the Maintenance model.
     *
     * @return HasOne The relationship instance linking the Setting to its associated Maintenance settings.
     */
    public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class);
    }

    /**
     * Get the navigation settings associated with the setting.
     *
     * This method defines a one-to-one relationship between the Setting model
     * and the Navigation model.
     *
     * @return HasOne The relationship instance linking the Setting to its associated Navigation settings.
     */
    public function navigation(): HasOne
    {
        return $this->hasOne(Navigation::class);
    }

    /**
     * Get the core settings associated with the setting.
     *
     * This method defines a one-to-one relationship between the Setting model
     * and the Core model.
     *
     * @return HasOne The relationship instance linking the Setting to its associated Core settings.
     */
    public function core(): HasOne
    {
        return $this->hasOne(Core::class);
    }

    /**
     * Get the system status based on maintenance settings.
     *
     * This method checks if the system is under maintenance by querying the associated
     * Maintenance model. If maintenance is active, it returns a localized message indicating
     * the system is under maintenance. Otherwise, it returns a message indicating the system is active.
     *
     * @return array|string|null A localized message indicating the system status.
     */
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

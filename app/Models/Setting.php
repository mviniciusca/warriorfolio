<?php

namespace App\Models;

use App\Models\Core;
use App\Models\User;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Chatbox;
use App\Models\Navigation;
use App\Models\Maintenance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * Summary of user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of module
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function module()
    {
        return $this->hasOne(Module::class);
    }

    /**
     * Summary of layout
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function layout()
    {
        return $this->hasOne(Layout::class);
    }

    /**
     * Summary of chatbox
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function chatbox()
    {
        return $this->hasOne(Chatbox::class);
    }

    /**
     * Summary of maintenance
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maintenance()
    {
        return $this->hasOne(Maintenance::class);
    }

    /**
     * Summary of navigation
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function navigation()
    {
        return $this->hasOne(Navigation::class);
    }


    /**
     * Summary of core
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function core()
    {
        return $this->hasOne(Core::class);
    }

    public function systemStatus()
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

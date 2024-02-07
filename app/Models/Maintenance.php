<?php

namespace App\Models;

use App\Models\Setting;
use App\Models\Maintenance as ModelsMaintenance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Summary of setting
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /**
     * Summary of setting
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }

    /**
     * Summary of discoveryMode
     * @return void
     */
    public function discoveryMode()
    {
        //

    }

}

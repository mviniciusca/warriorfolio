<?php

namespace App\Models;

use App\Models\Layout;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];

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
}

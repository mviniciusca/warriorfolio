<?php

namespace App\Models;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Layout extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The $casts property defines how attributes should be cast when accessed or set.
     * Each key represents an attribute name, and the value specifies the cast type.
     *
     * - 'about': Casts the 'about' attribute to an array.
     * - 'contact': Casts the 'contact' attribute to an array.
     * - 'customer': Casts the 'customer' attribute to an array.
     * - 'footer': Casts the 'footer' attribute to an array.
     * - 'hero': Casts the 'hero' attribute to an array.
     * - 'mailing': Casts the 'mailing' attribute to an array.
     * - 'portfolio': Casts the 'portfolio' attribute to an array.
     *
     * This ensures that these attributes are always treated as arrays when accessed
     * or modified, simplifying data handling and ensuring consistency.
     */
    protected $casts = [
        'about'     => 'array',
        'contact'   => 'array',
        'customer'  => 'array',
        'footer'    => 'array',
        'hero'      => 'array',
        'mailing'   => 'array',
        'portfolio' => 'array',
    ];

    /**
     * Define a relationship to the Setting model.
     *
     * @return BelongsTo
     */
    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class);
    }
}

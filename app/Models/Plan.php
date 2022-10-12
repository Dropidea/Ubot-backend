<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'plans';

    /**
    * casts
    *
    * @var array
    */
    protected $casts = [
        "status" => "boolean",
        "price" => "float"
    ];


    /* -------------------------------------------------------------------------- */
    /*                                  constants                                 */
    /* -------------------------------------------------------------------------- */

    public const STATUS_ACTIVE = 1;
    public const STATUS_DISACTIVE = 0;



    /* -------------------------------------------------------------------------- */
    /*                                   filters                                  */
    /* -------------------------------------------------------------------------- */





    /* -------------------------------------------------------------------------- */
    /*                             methods of filters                             */
    /* -------------------------------------------------------------------------- */





    /* -------------------------------------------------------------------------- */
    /*                            accesor and mutators                            */
    /* -------------------------------------------------------------------------- */






    /* -------------------------------------------------------------------------- */
    /*                                   scopes                                   */
    /* -------------------------------------------------------------------------- */

    /**
     * scopeActive
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * scopeDisactive
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeDisactive($query)
    {
        return $query->where('status', self::STATUS_DISACTIVE);
    }




    /* -------------------------------------------------------------------------- */
    /*                                relationship                                */
    /* -------------------------------------------------------------------------- */

    /**
     * subscriptions
     *
     * @return HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }


    /**
     * plan_feature
     *
     * @return BelongsToMany
     */
    public function plan_feature(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'plan_feature')->withPivot('count');
    }
}

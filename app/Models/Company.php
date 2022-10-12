<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'companies';


    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        "status" => "boolean"
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
     * scopeParent
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeParent($query)
    {
        return $query->whereNull('company_id');
    }

    /**
     * scopeChild
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeChild($query)
    {
        return $query->whereNotNull('company_id');
    }


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
     * users
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

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
     * branchs
     *
     * @return HasMany
     */
    public function branchs(): HasMany
    {
        return $this->hasMany(Company::class, 'company_id')->child();
    }

    /**
     * type
     *
     * @return void
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}

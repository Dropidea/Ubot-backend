<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'states';


    /* -------------------------------------------------------------------------- */
    /*                                  constants                                 */
    /* -------------------------------------------------------------------------- */





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
        return $query->whereNull('state_id');
    }

    /**
     * scopeChild
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeChild($query)
    {
        return $query->whereNotNull('state_id');
    }




    /* -------------------------------------------------------------------------- */
    /*                                relationship                                */
    /* -------------------------------------------------------------------------- */

    /**
     * country
     *
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->BelongsTo(Country::class);
    }

    /**
     * cities
     *
     * @return HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(State::class, 'state_id')->child();
    }
}

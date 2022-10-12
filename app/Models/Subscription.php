<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'subscriptions';


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






    /* -------------------------------------------------------------------------- */
    /*                                relationship                                */
    /* -------------------------------------------------------------------------- */


    /**
     * company
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * plan
     *
     * @return BelongsTo
     */
    public function plan():BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    use HasRoles;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'admins';


    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        "status" => "boolean"
    ];


    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /* -------------------------------------------------------------------------- */
    /*                                  constants                                 */
    /* -------------------------------------------------------------------------- */

    public const STATUS_DISACTIVE = 0;
    public const STATUS_ACTIVE = 1;




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




    /* -------------------------------------------------------------------------- */
    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

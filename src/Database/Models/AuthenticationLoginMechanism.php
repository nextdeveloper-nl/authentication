<?php

namespace NextDeveloper\Authentication\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Authentication\Database\Observers\AuthenticationLoginMechanismObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;

/**
 * Class AuthenticationLoginMechanism.
 *
 * @package NextDeveloper\Authentication\Database\Models
 */
class AuthenticationLoginMechanism extends Model
{
    use Filterable, UuidId;
    use SoftDeletes;
    

    public $timestamps = true;

    protected $table = 'authentication_login_mechanisms';


    /**
     * @var array
     */
    protected $guarded = [];

    /**
     *  Here we have the fulltext fields. We can use these for fulltext search if enabled.
     */
    protected $fullTextFields = [
        
    ];

    /**
     * @var array
     */
    protected $appends = [
        
    ];

    /**
     * We are casting fields to objects so that we can work on them better
     * @var array
     */
    protected $casts = [
        'id'              => 'integer',
		'uuid'            => 'string',
		'user_id'         => 'integer',
		'login_client'    => 'string',
		'login_mechanism' => 'string',
		'is_latest'       => 'boolean',
		'is_default'      => 'boolean',
		'created_at'      => 'datetime',
		'updated_at'      => 'datetime',
		'deleted_at'      => 'datetime',
    ];

    /**
     * We are casting data fields.
     * @var array
     */
    protected $dates = [
        'created_at',
		'updated_at',
		'deleted_at',
    ];

    /**
     * @var array
     */
    protected $with = [

    ];

    /**
     * @var int
     */
    protected $perPage = 20;

    /**
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        //  We create and add Observer even if we wont use it.
        parent::observe(AuthenticationLoginMechanismObserver::class);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
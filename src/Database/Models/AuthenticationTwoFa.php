<?php

namespace NextDeveloper\Authentication\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Authentication\Database\Observers\AuthenticationTwoFaObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;

/**
 * Class AuthenticationTwoFa.
 *
 * @package NextDeveloper\Authentication\Database\Models
 */
class AuthenticationTwoFa extends Model
{
    use Filterable, UuidId;
    use SoftDeletes;
    

    public $timestamps = true;

    protected $table = 'authentication_two_fa';


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
        'id'         => 'integer',
		'uuid'       => 'string',
		'user_id'    => 'integer',
		'is_active'  => 'boolean',
		'expires_at' => 'datetime',
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'deleted_at' => 'datetime',
    ];

    /**
     * We are casting data fields.
     * @var array
     */
    protected $dates = [
        'expires_at',
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
        parent::observe(AuthenticationTwoFaObserver::class);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
<?php

namespace NextDeveloper\Account\Database\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Account\Database\Observers\UserObserver;

/**
 * Class User.
 *
 * @package NextDeveloper\Account\Database\Models
 */
class User extends Authenticatable
{
    use Filterable, UuidId;
    use HasApiTokens, Notifiable;
    
    protected $table = 'users';

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
        'id'                                   => 'integer',
		'id_ref'                               => 'string',
		'old_id'                               => 'integer',
		'name'                                 => 'string',
		'surname'                              => 'string',
		'fullname'                             => 'string',
		'email'                                => 'string',
		'username'                             => 'string',
		'password'                             => 'string',
		'about'                                => 'string',
		'birthday'                             => 'datetime',
		'nin'                                  => 'string',
		'cell_phone_code'                      => 'string',
		'cell_phone'                           => 'string',
		'default_locale'                       => 'string',
		'iam_dn'                               => 'string',
		'iam_uid'                              => 'integer',
		'country_id'                           => 'integer',
		'email_verification_date'              => 'datetime',
		'cellphone_verification_date'          => 'datetime',
		'nin_verification_date'                => 'datetime',
		'password_last_changed_at'             => 'datetime',
		'password_expiry_notification_sent_at' => 'datetime',
		'created_at'                           => 'datetime',
		'updated_at'                           => 'datetime',
		'suspended_at'                         => 'datetime',
    ];

    /**
     * We are casting data fields.
     * @var array
     */
    protected $dates = [
        'birthday',
		'email_verification_date',
		'cellphone_verification_date',
		'nin_verification_date',
		'password_last_changed_at',
		'password_expiry_notification_sent_at',
		'created_at',
		'updated_at',
		'suspended_at',
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
        parent::observe(UserObserver::class);
    }
}

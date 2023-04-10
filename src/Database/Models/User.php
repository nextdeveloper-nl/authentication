<?php

namespace NextDeveloper\Authentication\Database\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use NextDeveloper\Account\Database\Models\User as AccountModuleUser;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Authentication\Database\Observers\UserObserver;

/**
 * Class User.
 *
 * @package NextDeveloper\Authentication\Database\Models
 */
class User extends AccountModuleUser
{
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

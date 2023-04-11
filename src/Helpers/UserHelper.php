<?php

namespace NextDeveloper\Authentication\Helpers;

use Illuminate\Database\Eloquent\Collection;
use NextDeveloper\Account\Database\Models\User;

class UserHelper
{
    public static function me() :User {
        /**
         * This will return the User object of the loggen in user
         */
    }

    public static function teamMates() :Collection {
        /**
         * This will return the list of people that are in the same team with this user
         */
    }

    public static function all() :Collection {
        /**
         * This will return all users under master account and team accounts
         */
    }
}
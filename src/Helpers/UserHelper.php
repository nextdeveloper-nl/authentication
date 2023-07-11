<?php

namespace NextDeveloper\Authentication\Helpers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use NextDeveloper\Account\Database\Models\User;

class UserHelper
{
    /**
     * This function returns the User object for the current logged in user.
     *
     * @return User
     */
    public static function me() :User {
        /**
         * This will return the User object of the logged in user
         */

        return Auth::guard( 'api' )->user();
    }

    /**
     * This function returns the list of team mates of the User. This means that we return the list of Users
     * that are also the part of "Current account".
     *
     * @return Collection
     */
    public static function teamMates() :?Collection {
        /**
         * This will return the list of people that are in the same team with this user
         */
    }

    /**
     * This function will return all the users connected to master account and sub accounts. This list also
     * includes the current user. That is why it returns a collections.
     *
     * @return Collection Set of users in all accounts
     */
    public static function all() :Collection {
        /**
         * This will return all users under master account and team accounts
         */
    }
}
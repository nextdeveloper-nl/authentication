<?php

namespace NextDeveloper\Authentication\Helpers;

use Illuminate\Database\Eloquent\Collection;
use NextDeveloper\Account\Database\Models\Account;

class AccountHelper
{
    public static function current() :Account {
        /**
         * This will return the account object
         */
    }

    public static function teams() :Collection {
        /**
         * This will return the list of sub accounts or team accounts that are created under this account
         */
    }

    public static function master() :Account {
        /**
         * This will return the master account if the user is sending request with team account
         */
    }
}
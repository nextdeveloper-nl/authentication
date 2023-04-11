<?php

namespace NextDeveloper\Authentication\Helpers;

use Illuminate\Database\Eloquent\Collection;
use NextDeveloper\Account\Database\Models\Account;
use NextDeveloper\Authentication\Exceptions\AccountNotFoundException;
use NextDeveloper\Authentication\Exceptions\UserNotLoggedInException;

class AccountHelper
{
    /**
     * This function returns the current account within the request that is being sent. We are looking for account since
     * we may have multiple accounts.
     *
     * @return Account
     * @throw
     */
    public static function current() :Account {
        /**
         * This will return the account object
         */

        //  Eğer account'u bulamazsak;
        throw new AccountNotFoundException();

        // Eğer kullanıcı login değilse;
        throw new UserNotLoggedInException();
    }

    /**
     * This function returns the list of sub accounts or team accounts
     *
     * @return Collection
     */
    public static function teams() :?Collection {
        /**
         * This will return the list of sub accounts or team accounts that are created under this account
         */
    }

    /**
     * This returns the master account of the current account. This means that if we are working with a team account
     * or a sub account this function will return the master of that team account.
     *
     * @return Account
     */
    public static function master() :Account {
        /**
         * This will return the master account if the user is sending request with team account
         */
    }
}
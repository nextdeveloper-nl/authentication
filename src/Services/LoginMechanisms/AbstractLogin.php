<?php
/**
 * This file is part of the PlusClouds.Account library.
 *
 * (c) Semih Turna <semih.turna@plusclouds.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NextDeveloper\Authentication\Services\LoginMechanisms;


use NextDeveloper\Accounts\Database\Models\User;
use NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism;

/**
 * Interface ILoginService
 * @package PlusClouds\Account\Common\Services\OAuth2
 */
class AbstractLogin
{
    public $className;

    /**
     * Generates a password and updates the login mechanism objects
     *
     * @param AuthenticationLoginMechanism $mechanism
     * @return string
     */
    public static function generateStrongPassword() : string {
        return '';
    }

    /**
     * Returns the name of the class
     *
     * @param $obj
     * @return string
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public static function getName($obj) : string
    {
        $name = class_basename($obj);
        
        return $name;
    }
}
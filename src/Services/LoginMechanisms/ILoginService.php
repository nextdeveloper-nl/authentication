<?php
/**
 * This file is part of the PlusClouds.Account library.
 *
 * (c) Semih Turna <semih.turna@plusclouds.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NextDeveloper\Authentication\Services\OAuth2\LoginMechanisms;


use NextDeveloper\Accounts\Database\Models\User;

/**
 * Interface ILoginService
 * @package PlusClouds\Account\Common\Services\OAuth2
 */
interface ILoginService
{

    public function __construct($configuration, $loginData);

    /**
     * @return bool
     */
    public function attempt(array $loginData);

    /**
     * @return null
     */
    public function generatePassword();

    /**
     * @return mixed
     */
    public function create(User $user);
}
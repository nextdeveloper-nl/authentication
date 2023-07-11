<?php

namespace NextDeveloper\Authentication\Services\LoginMechanisms;

use NextDeveloper\Accounts\Database\Models\User;
use NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism;

class OneTimeEmail extends AbstractLogin implements ILoginService
{
    /**
     * Here we will create one time email type of login mechanism. To do that we need to first check if we have
     * the mechanism already. To do that we will check the mechanism with user_id. If the mechanism is already
     * created we will return the mechanism, if not we will create and return the mechanism.
     *
     * @param User $user
     * @return AuthenticationLoginMechanism
     */
    public function create(User $user) : AuthenticationLoginMechanism
    {
        $mechanismName = self::getName($this);

        /*
         * 1) Check if the OneTimeEmail mechanism exists for user
         * 2) If exists, return that mechanism
         * 3) If not exists create a new mechanism and return the mechanism
         */

        $latestMechanism = AuthenticationLoginMechanism::where([
            'user_id'               => $user->id,
            'login_mechanism'       => $mechanismName,
            'is_latest'             => 1
        ])->latest()->first();

        if (!$latestMechanism) {

            $newMechanism = AuthenticationLoginMechanism::create([
                'user_id'          => $user->id,
                'login_mechanism'  => $mechanismName,
               ]);

            return $newMechanism;
        }

        return $latestMechanism;

    }

    /**
     * Generates a password and updates the login mechanism objects
     *
     * @param AuthenticationLoginMechanism $mechanism
     * @return string
     */
    public function generatePassword(AuthenticationLoginMechanism $mechanism) : string
    {
        /**
         * For this service we will be sending an email to the user so that the user knows his/her password for the
         * login.
         */

        $password = random_int(100000, 999999);

        $updateMechanismLoginData = $mechanism->update([
            'login_data' => json_encode(["password" => bcrypt($password)])
        ]);

        // TODO: Send email to the user with the password

        return $password;
    }

    /**
     * Here we check if the user credentials are correct. Even if the credentials are correct or not we will log
     * this attempt.
     *
     * @param AuthenticationLoginMechanism $mechanism
     * @param $loginData
     * @return true
     */
    public function attempt(AuthenticationLoginMechanism $mechanism, $loginData)
    {

        return true;
        // TODO: Implement attempt() method.
    }
}
<?php

namespace NextDeveloper\Authentication\Services\OAuth2\Responses;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use PlusClouds\Account\Database\Models\User;

class BearerTokenResponse implements \League\OAuth2\Server\ResponseTypes\ResponseTypeInterface
{

    /**
     * @param AccessTokenEntityInterface $accessToken
     *
     * @return array
     */
    protected function getExtraParams(AccessTokenEntityInterface $accessToken) {
        $user = User::find( $this->accessToken->getUserIdentifier() );

        dd($user);

        // Kullanıcının master hesabı yoksa, o halde ldap ile giriş yapmış bir kullanıcıdır.
        // Bu durumda hesabı olmayan kullanıcının, dahil olduğu takımın master hesabını atıyoruz.
//        if( ! ( $account = $user->masterAccount()->first() ) ) {
//            [ , $domain ] = explode( '@', $user->email );
//
//            $account = getAccountByDomain( $domain );
//        }

        return [
            'account' => [
                'id'   => $account->id_ref,
                'name' => $account->name,
                'user' => [
                    'id'       => $user->id_ref,
                    'fullname' => $user->fullname,
                    'email'    => $user->email,
                    'username' => $user->username,
                ],
            ],
        ];
    }

}
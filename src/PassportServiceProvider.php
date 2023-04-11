<?php

namespace NextDeveloper\Authentication;

use Laravel\Passport\Bridge;
use Laravel\Passport\Passport;
use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\ImplicitGrant;
use NextDeveloper\Authentication\Services\OAuth2\Responses\BearerTokenResponse;
use NextDeveloper\Commons\AbstractServiceProvider;

/**
 * Class AuthenticationServiceProvider
 *
 * @package NextDeveloper\Authentication
 */
class PassportServiceProvider extends \Laravel\Passport\PassportServiceProvider {
    /**
     * Make the authorization service instance.
     *
     * @return \League\OAuth2\Server\AuthorizationServer
     */
    public function makeAuthorizationServer()
    {
        dd('asd');

        return new AuthorizationServer(
            $this->app->make(Bridge\ClientRepository::class),
            $this->app->make(Bridge\AccessTokenRepository::class),
            $this->app->make(Bridge\ScopeRepository::class),
            $this->makeCryptKey('oauth-private.key'),
            app('encrypter')->getKey(),
            new BearerTokenResponse()
        );
    }

    /**
     * @return ImplicitGrant
     */
    protected function makeImplicitGrant()
    {
        return new ImplicitGrant(Passport::tokensExpireIn(), '?');
    }
}

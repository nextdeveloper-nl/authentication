<?php

namespace NextDeveloper\Authentication\Services\AbstractServices;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\BitbucketProvider;
use Laravel\Socialite\Two\FacebookProvider;
use Laravel\Socialite\Two\GithubProvider;
use Laravel\Socialite\Two\GitlabProvider;
use Laravel\Socialite\Two\GoogleProvider;
use Laravel\Socialite\Two\LinkedInProvider;
use Laravel\Socialite\Two\TwitterProvider;
use NextDeveloper\Authentication\Services\UserService;

class AbstractUserSocialLoginService
{
    public static function socialLogin(string $provider)
    {
        $config = config("authentication.social_login.$provider");
        $providerClass = self::getProviderClass($provider);
        
        if ($providerClass) {
            return Socialite::buildProvider($providerClass, $config)->redirect();
        }
        
        return redirect('/authentication/user/login');
    }
    
    private static function getProviderClass(string $provider): ?string
    {
        $providerClasses = [
            'github' => GithubProvider::class,
            'google' => GoogleProvider::class,
            'facebook' => FacebookProvider::class,
            'gitlab' => GitlabProvider::class,
            'linkedin' => LinkedInProvider::class,
            'bitbucket' => BitbucketProvider::class,
            'twitter' => TwitterProvider::class,
        ];
        
        return $providerClasses[$provider] ?? null;
    }
    
    public static function socialLoginRedirect(string $provider): RedirectResponse
    {
        $config = config("authentication.social_login.$provider");
        $providerClass = self::getProviderClass($provider);
        
        $user = Socialite::buildProvider($providerClass, $config)->user();
        
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make('password')
        ];
        
        UserService::create($data);
        
        return redirect()->to('/');
    }
}

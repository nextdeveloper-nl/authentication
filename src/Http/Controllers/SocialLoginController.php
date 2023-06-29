<?php

namespace NextDeveloper\Authentication\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use NextDeveloper\Authentication\Services\UserSocialLoginService;
use NextDeveloper\Generator\Common\AbstractController;
use Illuminate\Http\Request;

class SocialLoginController extends AbstractController
{
    public function socialLogin($provider)
    {
      return UserSocialLoginService::socialLogin($provider);
    }
    
    public function socialLoginRedirect($provider): RedirectResponse
    {
       return UserSocialLoginService::socialLoginRedirect($provider);
    }
}

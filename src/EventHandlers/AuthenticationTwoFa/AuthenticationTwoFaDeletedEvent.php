<?php

namespace NextDeveloper\Authentication\EventHandlers\AuthenticationTwoFa;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AuthenticationTwoFaDeletedEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class AuthenticationTwoFaDeletedEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
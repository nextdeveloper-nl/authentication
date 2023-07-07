<?php

namespace NextDeveloper\Authentication\EventHandlers\AuthenticationLoginLog;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AuthenticationLoginLogDeletedEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class AuthenticationLoginLogDeletedEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
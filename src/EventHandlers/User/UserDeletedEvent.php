<?php

namespace NextDeveloper\Authentication\EventHandlers\User;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserDeletedEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class UserDeletedEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
}

<?php

namespace NextDeveloper\Authentication\EventHandlers\User;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserCreatingEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class UserCreatingEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
}

<?php

namespace NextDeveloper\Authentication\EventHandlers\User;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserCreatedEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class UserCreatedEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
}

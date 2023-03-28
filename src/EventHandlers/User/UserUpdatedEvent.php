<?php

namespace NextDeveloper\Authentication\EventHandlers\User;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserUpdatedEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class UserUpdatedEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
}

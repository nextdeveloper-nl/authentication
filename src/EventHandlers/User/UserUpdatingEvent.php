<?php

namespace NextDeveloper\Authentication\EventHandlers\User;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserUpdatingEvent
 * @package PlusClouds\Account\Handlers\Events
 */
class UserUpdatingEvent implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle($event)
    {

    }
}

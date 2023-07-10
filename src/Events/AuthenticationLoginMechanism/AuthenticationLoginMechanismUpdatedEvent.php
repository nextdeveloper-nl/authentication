<?php

namespace NextDeveloper\Authentication\Events\AuthenticationLoginMechanism;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism;

/**
 * Class AuthenticationLoginMechanismUpdatedEvent
 * @package NextDeveloper\Authentication\Events
 */
class AuthenticationLoginMechanismUpdatedEvent
{
    use SerializesModels;

    /**
     * @var AuthenticationLoginMechanism
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(AuthenticationLoginMechanism $model = null) {
        $this->_model = $model;
    }

    /**
    * @param int $value
    *
    * @return AbstractEvent
    */
    public function setTimestamp($value) {
        $this->timestamp = $value;

        return $this;
    }

    /**
    * @return int|null
    */
    public function getTimestamp() {
        return $this->timestamp;
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
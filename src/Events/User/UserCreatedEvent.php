<?php

namespace NextDeveloper\Authentication\Events\User;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Authentication\Database\Models\User;

/**
 * Class UserCreatedEvent
 * @package NextDeveloper\Authentication\Events
 */
class UserCreatedEvent
{
    use SerializesModels;

    /**
     * @var User
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(User $model = null) {
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
}
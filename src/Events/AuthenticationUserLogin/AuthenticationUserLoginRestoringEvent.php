<?php

namespace NextDeveloper\Authentication\Events\AuthenticationUserLogin;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin;

/**
 * Class AuthenticationUserLoginRestoringEvent
 * @package NextDeveloper\Authentication\Events
 */
class AuthenticationUserLoginRestoringEvent
{
    use SerializesModels;

    /**
     * @var AuthenticationUserLogin
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(AuthenticationUserLogin $model = null) {
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
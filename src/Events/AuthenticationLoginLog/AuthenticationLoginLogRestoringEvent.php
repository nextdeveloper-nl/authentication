<?php

namespace NextDeveloper\Authentication\Events\AuthenticationLoginLog;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Authentication\Database\Models\AuthenticationLoginLog;

/**
 * Class AuthenticationLoginLogRestoringEvent
 * @package NextDeveloper\Authentication\Events
 */
class AuthenticationLoginLogRestoringEvent
{
    use SerializesModels;

    /**
     * @var AuthenticationLoginLog
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(AuthenticationLoginLog $model = null) {
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
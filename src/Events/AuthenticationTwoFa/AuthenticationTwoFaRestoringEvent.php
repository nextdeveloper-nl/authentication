<?php

namespace NextDeveloper\Authentication\Events\AuthenticationTwoFa;

use Illuminate\Queue\SerializesModels;
use NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa;

/**
 * Class AuthenticationTwoFaRestoringEvent
 * @package NextDeveloper\Authentication\Events
 */
class AuthenticationTwoFaRestoringEvent
{
    use SerializesModels;

    /**
     * @var AuthenticationTwoFa
     */
    public $_model;

    /**
     * @var int|null
     */
    protected $timestamp = null;

    public function __construct(AuthenticationTwoFa $model = null) {
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
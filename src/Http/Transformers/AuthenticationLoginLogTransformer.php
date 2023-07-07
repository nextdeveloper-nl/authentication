<?php

namespace NextDeveloper\Authentication\Http\Transformers;

use NextDeveloper\Authentication\Database\Models\AuthenticationLoginLog;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AuthenticationLoginLogTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Authentication\Http\Transformers
 */
class AuthenticationLoginLogTransformer extends AbstractTransformer {

    /**
     * @param AuthenticationLoginLog $model
     *
     * @return array
     */
    public function transform(AuthenticationLoginLog $model) {
        return $this->buildPayload([
            'id'  =>  $model->uuid,
            'user_id'  =>  $model->user_id,
            'log'  =>  $model->log,
            'created_at'  =>  $model->created_at,
        ]);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
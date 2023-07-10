<?php

namespace NextDeveloper\Authentication\Http\Transformers;

use NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AuthenticationLoginMechanismTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Authentication\Http\Transformers
 */
class AuthenticationLoginMechanismTransformer extends AbstractTransformer {

    /**
     * @param AuthenticationLoginMechanism $model
     *
     * @return array
     */
    public function transform(AuthenticationLoginMechanism $model) {
        return $this->buildPayload([
            'id'  =>  $model->uuid,
            'user_id'  =>  $model->user_id,
            'login_client'  =>  $model->login_client,
            'login_data'  =>  $model->login_data,
            'login_mechanism'  =>  $model->login_mechanism,
            'is_latest'  =>  $model->is_latest == 1 ? true : false,
            'is_default'  =>  $model->is_default == 1 ? true : false,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
        ]);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
<?php

namespace NextDeveloper\Authentication\Http\Transformers;

use NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AuthenticationUserLoginTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Authentication\Http\Transformers
 */
class AuthenticationUserLoginTransformer extends AbstractTransformer {

    /**
     * @param AuthenticationUserLogin $model
     *
     * @return array
     */
    public function transform(AuthenticationUserLogin $model) {
        return $this->buildPayload([
            'id'  =>  $model->uuid,
            'user_id'  =>  $model->user_id,
            'login_client'  =>  $model->login_client,
            'login_data'  =>  $model->login_data,
            'login_type'  =>  $model->login_type,
            'is_latest'  =>  $model->is_latest == 1 ? true : false,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
        ]);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
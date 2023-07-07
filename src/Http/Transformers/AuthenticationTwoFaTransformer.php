<?php

namespace NextDeveloper\Authentication\Http\Transformers;

use NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class AuthenticationTwoFaTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Authentication\Http\Transformers
 */
class AuthenticationTwoFaTransformer extends AbstractTransformer {

    /**
     * @param AuthenticationTwoFa $model
     *
     * @return array
     */
    public function transform(AuthenticationTwoFa $model) {
        return $this->buildPayload([
            'id'  =>  $model->uuid,
            'user_id'  =>  $model->user_id,
            'twofa_data'  =>  $model->twofa_data,
            'is_active'  =>  $model->is_active == 1 ? true : false,
            'expires_at'  =>  $model->expires_at,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'deleted_at'  =>  $model->deleted_at,
        ]);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
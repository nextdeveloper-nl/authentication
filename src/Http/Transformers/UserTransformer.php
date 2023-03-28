<?php

namespace NextDeveloper\Authentication\Http\Transformers;

use NextDeveloper\Authentication\Database\Models\User;
use NextDeveloper\Commons\Http\Transformers\AbstractTransformer;

/**
 * Class UserTransformer. This class is being used to manipulate the data we are serving to the customer
 *
 * @package NextDeveloper\Authentication\Http\Transformers
 */
class UserTransformer extends AbstractTransformer {

    /**
     * @param User $model
     *
     * @return array
     */
    public function transform(User $model) {
        return $this->buildPayload([
            'id'  =>  $model->id_ref,
            'old_id'  =>  $model->old_id,
            'name'  =>  $model->name,
            'surname'  =>  $model->surname,
            'fullname'  =>  $model->fullname,
            'email'  =>  $model->email,
            'username'  =>  $model->username,
            'password'  =>  $model->password,
            'about'  =>  $model->about,
            'gender'  =>  $model->gender,
            'birthday'  =>  $model->birthday,
            'nin'  =>  $model->nin,
            'cell_phone_code'  =>  $model->cell_phone_code,
            'cell_phone'  =>  $model->cell_phone,
            'default_locale'  =>  $model->default_locale,
            'iam_dn'  =>  $model->iam_dn,
            'iam_uid'  =>  $model->iam_uid,
            'country_id'  =>  $model->country_id,
            'email_verification_date'  =>  $model->email_verification_date,
            'cellphone_verification_date'  =>  $model->cellphone_verification_date,
            'nin_verification_date'  =>  $model->nin_verification_date,
            'password_last_changed_at'  =>  $model->password_last_changed_at,
            'password_expiry_notification_sent_at'  =>  $model->password_expiry_notification_sent_at,
            'created_at'  =>  $model->created_at,
            'updated_at'  =>  $model->updated_at,
            'suspended_at'  =>  $model->suspended_at,
        ]);
    }
}

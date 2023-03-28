<?php

namespace NextDeveloper\Authentication\Http\Requests\User;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class UserCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules() {
        return [
            'old_id'                               => 'nullable|integer',
			'name'                                 => 'nullable|string|max:50',
			'surname'                              => 'nullable|string|max:50',
			'fullname'                             => 'nullable|string|max:101',
			'email'                                => 'required|string|max:255',
			'username'                             => 'nullable|string|max:20',
			'password'                             => 'nullable|string|max:60',
			'about'                                => 'nullable|string',
			'gender'                               => 'nullable',
			'birthday'                             => 'nullable|date',
			'nin'                                  => 'nullable|string|max:20',
			'cell_phone_code'                      => 'nullable|string|max:4',
			'cell_phone'                           => 'nullable|string|max:15',
			'default_locale'                       => 'string|max:2',
			'iam_dn'                               => 'nullable|string|max:255',
			'iam_uid'                              => 'nullable|integer',
			'country_id'                           => 'integer',
			'email_verification_date'              => 'nullable|date',
			'cellphone_verification_date'          => 'nullable|date',
			'nin_verification_date'                => 'nullable|date',
			'password_last_changed_at'             => 'date',
			'password_expiry_notification_sent_at' => 'date',
			'suspended_at'                         => 'nullable|date',
        ];
    }

}
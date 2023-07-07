<?php

namespace NextDeveloper\Authentication\Http\Requests\AuthenticationUserLogin;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AuthenticationUserLoginCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules() {
        return [
            'user_id'      => 'nullable|integer',
			'login_client' => 'nullable|string|max:1000',
			'login_data'   => 'nullable',
			'login_type'   => 'nullable|string|max:50',
			'is_latest'    => 'boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
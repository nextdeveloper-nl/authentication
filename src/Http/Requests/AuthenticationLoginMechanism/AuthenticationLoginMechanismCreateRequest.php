<?php

namespace NextDeveloper\Authentication\Http\Requests\AuthenticationLoginMechanism;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AuthenticationLoginMechanismCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules() {
        return [
            'user_id'         => 'nullable|integer',
			'login_client'    => 'nullable|string|max:1000',
			'login_data'      => 'nullable',
			'login_mechanism' => 'nullable|string|max:50',
			'is_latest'       => 'boolean',
			'is_default'      => 'boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
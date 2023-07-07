<?php

namespace NextDeveloper\Authentication\Http\Requests\AuthenticationTwoFa;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AuthenticationTwoFaUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules() {
        return [
            'user_id'    => 'nullable|integer',
			'twofa_data' => 'nullable',
			'is_active'  => 'boolean',
			'expires_at' => 'nullable|date',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
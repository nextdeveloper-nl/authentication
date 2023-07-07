<?php

namespace NextDeveloper\Authentication\Http\Requests\AuthenticationLoginLog;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AuthenticationLoginLogUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules() {
        return [
            'user_id' => 'nullable|integer',
			'log'     => 'nullable',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
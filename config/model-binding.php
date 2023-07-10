<?php

return [
    'authenticationloginlog' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\AuthenticationLoginLog::findByRef($value);
    },

'authenticationloginmechanism' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\AuthenticationLoginMechanism::findByRef($value);
    },

'authenticationtwofa' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::findByRef($value);
    },

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
];
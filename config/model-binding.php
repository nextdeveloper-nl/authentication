<?php

return [
    'authenticationuserlogin' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\AuthenticationUserLogin::findByRef($value);
    },

'authenticationtwofa' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\AuthenticationTwoFa::findByRef($value);
    },

'authenticationloginlog' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\AuthenticationLoginLog::findByRef($value);
    },

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
];
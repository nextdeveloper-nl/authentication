<?php

return [
    'user' => function ($value) {
        return NextDeveloper\Authentication\Database\Models\User::findByRef($value);
    },

//!APPENDHERE
];
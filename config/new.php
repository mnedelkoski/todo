<?php

return [
    'my_variable' => env('MY_VARIABLE', 'default'),

    'deeper-array' => [
        'value' => env("TEST", 'test')
    ],
    'default-email-from' => env('DEFAULT_FROM_EMAIL')
];
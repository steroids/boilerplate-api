<?php

return [
    'guest' => [
        'type' => 1,
        'children' => [
            'a::swagger',
            'a::api::init',
            'a::api::auth::login',
        ],
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'a::swagger',
            'a::api::init',
            'a::api::auth::login',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'a::swagger',
            'a::api::init',
            'a::api::auth::login',
            'a::api::admin',
        ],
    ],
];

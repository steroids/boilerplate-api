<?php

return [
    'components' => [
        'cors' => [
            'allowDomains' => [
                '127.0.0.1:9500',
                'localhost:9500',
            ]
        ],
    ],
    'modules' => [
        'file' => [
            'storages' => [
                'file' => [
                    'rootUrl' => 'http://boilerplate12345.loc/assets'
                ],
            ],
        ],
    ],
];

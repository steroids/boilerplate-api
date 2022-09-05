<?php

return [
    'components' => [
        'cors' => [
            'allowDomains' => [
                '127.0.0.1:9880',
                'localhost:9880',
                'boilerplate12345.kozhin.dev',
            ]
        ],
//        'log' => [
//            'targets' => [
//                [
//                    'class' => 'steroids\core\components\SentryTarget',
//                    'dsn' => 'https://aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@sentry.kozhindev.com/000',
//                    'levels' => ['error', 'warning'],
//                ],
//            ],
//        ],
    ],
    'modules' => [
        'file' => [
            'storages' => [
                'file' => [
                    'rootPath' => __DIR__ . '../../../../../files/uploaded',
                    'rootUrl' => 'https://boilerplate12345.kozhin.dev/files/uploaded',
                ],
            ],
        ],
    ],
];

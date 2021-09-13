<?php

return [
    'components' => [
        'cors' => [
            'allowDomains' => [
                'boilerplate12345.ru',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'steroids\core\components\SentryTarget',
                    'dsn' => 'https://aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa@sentry.kozhindev.com/000',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'modules' => [
        'file' => [
            'storages' => [
                'file' => [
                    'rootPath' => __DIR__ . '../../../../../files/uploaded',
                    'rootUrl' => 'https://boilerplate12345.ru/files/uploaded',
                ],
            ],
        ],
    ],
];

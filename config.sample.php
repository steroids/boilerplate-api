<?php

defined('YII_DEBUG') || define('YII_DEBUG', true);

return [
    'env' => 'dev',
    'components' => [
        'db' => [
            'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=boilerplate12345',
            'username' => 'boilerplate12345',
            'password' => '',
        ],
        'dbTest' => [
            'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=boilerplate12345-test',
            'username' => 'boilerplate12345-test',
            'password' => '',
        ],
    ],
];

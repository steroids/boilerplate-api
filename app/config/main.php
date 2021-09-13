<?php

use steroids\core\boot\Boot;

return Boot::getMainConfig([
    'id' => 'boilerplate12345',
    'name' => 'Boilerplate12345',
    'language' => 'ru',
    'components' => [
        'db' => [
            'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=boilerplate12345',
            'username' => '',
            'password' => '',
        ],
    ],
    'modules' => [
        'notifier' => [
            'providers' => [
                'mailer' => [
                    'from' => 'noreply@boilerplate12345.ru',
                ],
            ],
        ],
    ],
]);

<?php

namespace app\tests\unit;

use app\tests\BaseTestCase;
use app\user\models\User;
use steroids\auth\forms\LoginForm;
use yii\helpers\Json;

class AuthTest extends BaseTestCase
{
    public function testLogin()
    {
        /** @var LoginForm $response */
        $response = $this->callApi('POST /api/v1/auth/login', null, [
            'login' => 'admin@boilerplate12345.ru',
            'password' => '1',
        ]);
        $this->assertEquals('[]', Json::encode($response->errors));

        $user = User::findOrPanic(['email' => 'admin@boilerplate12345.ru']);
        $response = $this->callApi('POST /api/v1/init', $user->id);
        $this->assertEquals($user->id, $response['user']['id']);

        $response = $this->callApi('POST /api/v1/auth/logout');
        $this->assertTrue($response['success']);
    }

}

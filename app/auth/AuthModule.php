<?php

namespace app\auth;

use app\user\models\User;

class AuthModule extends \steroids\auth\AuthModule
{
    public string $userClass = User::class;
}
<?php

namespace app\user\helpers;

use app\user\enums\UserRole;
use app\user\models\Company;
use app\user\models\User;

class UserHelper
{
    public static function getQueryCondition($value, $alias = 'user'): array
    {
        $value = mb_strtolower(trim($value));

        $userCondition = [
            'or',
            ['like', "LOWER(\"$alias\".\"phone\")", $value],
            ['like', "LOWER(\"$alias\".\"email\")", $value],
            ['like', "LOWER(\"$alias\".\"firstName\")", $value],
            ['like', "LOWER(\"$alias\".\"lastName\")", $value],
            ['like', "LOWER(\"$alias\".\"middleName\")", $value],
        ];
        if (preg_match('/^[0-9]+$/', $value)) {
            $userCondition[] = ["$alias.id" => $value];
        }
        return $userCondition;
    }
}
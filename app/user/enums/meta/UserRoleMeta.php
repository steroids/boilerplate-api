<?php

namespace app\user\enums\meta;

use Yii;
use steroids\core\base\Enum;

abstract class UserRoleMeta extends Enum
{
    const ADMIN = 'admin';
    const USER = 'user';

    public static function getLabels()
    {
        return [
            self::ADMIN => Yii::t('app', 'Администратор'),
            self::USER => Yii::t('app', 'Водитель')
        ];
    }
}

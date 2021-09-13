<?php

namespace app\user\enums\meta;

use Yii;
use steroids\core\base\Enum;

abstract class UserRoleMeta extends Enum
{
    const ADMIN = 'admin';
    const DEALER = 'dealer';
    const MANAGER = 'manager';
    const USER = 'user';

    public static function getLabels()
    {
        return [
            self::ADMIN => Yii::t('app', 'Администратор'),
            self::DEALER => Yii::t('app', 'Дилер'),
            self::MANAGER => Yii::t('app', 'Руководитель'),
            self::USER => Yii::t('app', 'Водитель')
        ];
    }
}

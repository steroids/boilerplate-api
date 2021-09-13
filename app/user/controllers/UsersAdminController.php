<?php

namespace app\user\controllers;

use app\file\FileModule;
use app\user\enums\UserRole;
use app\user\forms\UsersSearch;
use app\user\models\User;
use steroids\core\base\CrudApiController;

class UsersAdminController extends CrudApiController
{
    public static $modelClass = User::class;
    public static $searchModelClass = UsersSearch::class;

    public static function apiMap()
    {
        return [
            'admin.user.users' => static::apiMapCrud('/api/v1/admin/user/users', [
                'items' => [
                    'avatar' => 'PUT /api/v1/admin/user/users/avatar',
                ],
            ]),
        ];
    }

    public function actionAvatar()
    {
        return FileModule::getInstance()->upload()->getExtendedAttributes();
    }
}
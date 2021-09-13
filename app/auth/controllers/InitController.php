<?php

namespace app\auth\controllers;

use Yii;
use app\user\models\User;
use yii\helpers\ArrayHelper;

class InitController extends \steroids\auth\controllers\InitController
{
    /**
     * @param $body
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    protected function getData($body)
    {
        /** @var User $user */
        $user = Yii::$app->user->model;

        // Default enums
        $body['enums'] = array_unique(array_merge(
            ArrayHelper::getValue($body, 'enums', []),
            [
                'app.user.enums.UserRole',
            ]
        ));
        $body['models'] = array_unique(array_merge(
            ArrayHelper::getValue($body, 'models', []),
            [
                'app.user.models.User',
            ]
        ));

        return array_merge(
            parent::getData($body),
            [
                // Context user
                'user' => $user ? $user->toFrontend() : null,
            ]
        );
    }
}

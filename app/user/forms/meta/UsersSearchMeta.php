<?php

namespace app\user\forms\meta;

use steroids\core\base\SearchModel;
use \Yii;
use app\user\models\User;

abstract class UsersSearchMeta extends SearchModel
{
    public ?string $query = null;
    public ?int $companyId = null;

    public function rules()
    {
        return [
            ...parent::rules(),
            ['query', 'string', 'max' => 255],
            ['companyId', 'integer'],
        ];
    }

    public function sortFields()
    {
        return [];
    }

    public function createQuery()
    {
        return User::find();
    }

    public static function meta()
    {
        return [
            'query' => [
                'label' => Yii::t('app', 'Имя / ид / емаил / телефон'),
                'isSortable' => false
            ],
            'companyId' => [
                'label' => Yii::t('app', 'Компания'),
                'appType' => 'integer',
                'isSortable' => false
            ]
        ];
    }
}

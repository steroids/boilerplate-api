<?php

namespace app\user\forms;

use app\user\forms\meta\UsersSearchMeta;
use app\user\helpers\UserHelper;
use app\user\models\User;

class UsersSearch extends UsersSearchMeta
{
    /**
     * @var User
     */
    public $user;

    public bool $isBanned = false;

    public function fields()
    {
        return [
            'id',
            'name',
            'role',
            'email',
            'createTime',
            'lastLogin',
        ];
    }

    public function prepare($query)
    {
        parent::prepare($query);

        $query
            ->alias('user')
            ->andWhere(['isBanned' => $this->isBanned])
            ->andFilterWhere(UserHelper::getQueryCondition($this->query))
            ->orderBy(['id' => SORT_DESC]);
    }
}

<?php

namespace app\user\models;

use app\user\enums\UserRole;
use app\user\models\meta\UserMeta;
use steroids\auth\UserInterface;
use steroids\auth\UserTrait;

/**
 * @inheritDoc
 */
class User extends UserMeta implements UserInterface
{
    use UserTrait;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ...parent::rules(),
            ['role', 'default', 'value' => UserRole::USER],
            [['!isUnSubscribed', '!role'], 'safe'],
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return implode(' ', array_filter([$this->firstName, $this->lastName])) ?: '#' . $this->primaryKey;
    }

    /**
     * @param string $templateName
     * @param array $params
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function sendNotify($templateName, $params = [])
    {
    }

    public function getIsBanned()
    {
        return $this->isBanned;
    }

    public function setIsBanned($value)
    {
        $this->isBanned = $value;
    }
}

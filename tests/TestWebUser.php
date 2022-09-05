<?php

namespace app\tests;

use app\user\models\User;
use yii\base\Component;

/**
 *
 * @property bool $isGuest
 * @property mixed $identity
 * @property mixed $model
 */
class TestWebUser extends Component
{
    public $id;
    public $accessToken;

    protected $_model;

    public function getId()
    {
        return $this->id;
    }

    public function getIsGuest()
    {
        return !$this->id;
    }

    public function login()
    {
    }

    public function logout()
    {
    }

    public function getIdentity()
    {
        return $this->getModel();
    }

    public function getModel()
    {
        if (!$this->_model || $this->_model->id !== $this->id) {
            $this->_model = User::findOne(['id' => $this->id]);
        }
        return $this->_model;
    }


}
<?php

namespace app\user\migrations;

use steroids\core\base\Migration;

class M000000000000User extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'role' => $this->string(),
            'lastName' => $this->string(),
            'firstName' => $this->string(),
            'middleName' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'gender' => $this->string(),
            'birthdate' => $this->date(),
            'avatarId' => $this->integer(),
            'language' => $this->string(10),
            'passwordHash' => $this->text(),
            'isBanned' => $this->boolean(),
            'isUnSubscribed' => $this->boolean(),
            'createTime' => $this->dateTime(),
            'updateTime' => $this->dateTime(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}

<?php

namespace app\user\models\meta;

use steroids\core\base\Model;
use app\user\enums\Gender;
use steroids\core\behaviors\TimestampBehavior;
use \Yii;
use yii\db\ActiveQuery;
use steroids\auth\models\AuthLogin;
use steroids\auth\models\AuthConfirm;
use steroids\file\models\File;
use app\user\models\Company;

/**
 * @property string $id
 * @property string $role
 * @property string $lastName
 * @property string $firstName
 * @property string $middleName
 * @property string $email
 * @property string $phone
 * @property string $passwordHash
 * @property string $language
 * @property boolean $isBanned
 * @property boolean $isUnSubscribed
 * @property string $createTime
 * @property string $updateTime
 * @property string $gender
 * @property string $birthdate
 * @property integer $avatarId
 * @property integer $companyId
 * @property string $licenseNumber
 * @property-read AuthLogin[] $logins
 * @property-read AuthConfirm[] $confirms
 * @property-read File $avatar
 * @property-read Company $company
 */
abstract class UserMeta extends Model
{
    public static function tableName()
    {
        return 'users';
    }

    public function fields()
    {
        return [
            'id',
            'role',
            'firstName',
            'email',
            'phone',
            'isBanned',
            'createTime',
        ];
    }

    public function rules()
    {
        return [
            ...parent::rules(),
            [['role', 'lastName', 'firstName', 'middleName', 'email', 'licenseNumber'], 'string', 'max' => 255],
            ['email', 'email'],
            ['phone', 'string', 'max' => 32],
            ['passwordHash', 'string'],
            ['language', 'string', 'max' => '10'],
            [['isBanned', 'isUnSubscribed'], 'steroids\\core\\validators\\ExtBooleanValidator'],
            ['gender', 'in', 'range' => Gender::getKeys()],
            ['birthdate', 'date', 'format' => 'php:Y-m-d'],
            [['avatarId', 'companyId'], 'integer'],
        ];
    }

    public function behaviors()
    {
        return [
            ...parent::behaviors(),
            TimestampBehavior::class,
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getLogins()
    {
        return $this->hasMany(AuthLogin::class, ['userId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getConfirms()
    {
        return $this->hasMany(AuthConfirm::class, ['userId' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getAvatar()
    {
        return $this->hasOne(File::class, ['id' => 'avatarId']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'companyId']);
    }

    public static function meta()
    {
        return array_merge(parent::meta(), [
            'id' => [
                'label' => Yii::t('app', '????'),
                'appType' => 'primaryKey',
                'isPublishToFrontend' => true
            ],
            'role' => [
                'label' => Yii::t('app', '????????'),
                'isPublishToFrontend' => true
            ],
            'lastName' => [
                'label' => Yii::t('app', '??????????????'),
                'isPublishToFrontend' => false
            ],
            'firstName' => [
                'label' => Yii::t('app', '??????'),
                'isPublishToFrontend' => true
            ],
            'middleName' => [
                'label' => Yii::t('app', '????????????????'),
                'isPublishToFrontend' => false
            ],
            'email' => [
                'label' => Yii::t('app', 'Email'),
                'appType' => 'email',
                'isPublishToFrontend' => true
            ],
            'phone' => [
                'label' => Yii::t('app', '??????????????'),
                'appType' => 'phone',
                'isPublishToFrontend' => true
            ],
            'passwordHash' => [
                'label' => Yii::t('app', '????????????'),
                'appType' => 'text'
            ],
            'language' => [
                'label' => Yii::t('app', '????????'),
                'stringLength' => '10'
            ],
            'isBanned' => [
                'label' => Yii::t('app', '?????????????????????????'),
                'appType' => 'boolean',
                'isPublishToFrontend' => true
            ],
            'isUnSubscribed' => [
                'appType' => 'boolean'
            ],
            'createTime' => [
                'label' => Yii::t('app', '???????? ??????????????????????'),
                'appType' => 'autoTime',
                'isPublishToFrontend' => true,
                'touchOnUpdate' => false
            ],
            'updateTime' => [
                'label' => Yii::t('app', '???????? ????????????????????'),
                'appType' => 'autoTime',
                'touchOnUpdate' => true
            ],
            'gender' => [
                'label' => Yii::t('app', '??????'),
                'appType' => 'enum',
                'isPublishToFrontend' => false,
                'enumClassName' => Gender::class
            ],
            'birthdate' => [
                'label' => Yii::t('app', '???????? ????????????????'),
                'appType' => 'date',
                'isPublishToFrontend' => false
            ],
            'avatarId' => [
                'label' => Yii::t('app', '????????????'),
                'appType' => 'file',
                'isPublishToFrontend' => false
            ],
            'companyId' => [
                'label' => Yii::t('app', '????????????????'),
                'appType' => 'integer'
            ],
            'licenseNumber' => [
                'label' => Yii::t('app', '?????????? ?????????????????????????? ??????????????????????????')
            ]
        ]);
    }
}

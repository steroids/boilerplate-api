<?php

namespace app\user\models;

use app\file\FileModule;
use app\notifier\NotifierModule;
use app\track\dto\FineDto;
use app\track\dto\FineSummaryDto;
use app\track\enums\TrackStatAttribute;
use app\track\models\TrackRating;
use app\track\TrackModule;
use app\user\enums\UserRole;
use app\user\models\meta\UserMeta;
use steroids\auth\models\AuthConfirm;
use steroids\auth\UserInterface;
use steroids\auth\UserTrait;
use steroids\notifier\NotifierMessage;
use yii\base\Exception;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * @property-read string $name
 * @property-read Car $lastCar
 * @property-read Car $currentCar
 * @property-read string $avatarUrl
 * @property-read TrackRating $rating
 * @property-read TrackRating $prevRating
 */
class User extends UserMeta implements UserInterface
{
    use UserTrait;

    /**
     * @return ActiveQuery
     */
    public static function getDriversQuery()
    {
        return static::find()
            ->where(['role' => UserRole::USER]);
    }


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

    public function fields()
    {
        return [
            ...parent::fields(),
            'name',
            'rating',
            'avatarUrl',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getSchedule()
    {
        return $this->hasMany(ScheduleShift::class, ['userId' => 'id']);
    }

    /**
     * @param $from
     * @param $to
     * @return ScheduleShift[]
     */
    public function getScheduleByInterval($from, $to)
    {
        return $this->getSchedule()
            ->andWhere(['<', 'fromTime', $to])
            ->andWhere([
                'or',
                ['>', 'toTime', $from],
                ['toTime' => null],
            ])
            ->andWhere([
                'or',
                [
                    'and',
                    ['>=', 'fromTime', $from],
                    ['<=', 'toTime', $to]
                ],
                [
                    'and',
                    ['<', 'fromTime', $from],
                    ['<', 'toTime', $to]
                ],
                [
                    'and',
                    ['>', 'fromTime', $from],
                    [
                        'or',
                        ['>', 'toTime', $to],
                        ['toTime' => null],
                    ],
                ],
                [
                    'and',
                    ['<', 'fromTime', $from],
                    [
                        'or',
                        ['>', 'toTime', $to],
                        ['toTime' => null],
                    ],
                ],
            ])
            ->all();
    }

    /**
     * @param $date
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getCar($date)
    {
        return $this->hasOne(Car::class, ['id' => 'carId'])
            ->viaTable(ScheduleShift::tableName(), ['userId' => 'id'], function ($query) use ($date) {
                /* @var $query \yii\db\ActiveQuery */
                $query
                    ->andWhere(['<=', 'fromTime', $date])
                    ->andWhere([
                        'or',
                        ['>', 'toTime', $date],
                        ['toTime' => null]
                    ]);
            });
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getCurrentCar($now = null)
    {
        return $this->getCar($now ?: date('Y-m-d H:i:s'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return implode(' ', array_filter([$this->firstName, $this->lastName])) ?: '#' . $this->primaryKey;
    }

    /**
     * @return string|null
     * @throws \steroids\file\exceptions\FileException
     * @throws \yii\base\Exception
     */
    public function getAvatarUrl()
    {
        return $this->avatarId
            ? $this->avatar->getImagePreview(FileModule::PREVIEW_DEFAULT)->url
            : null;
    }

    /**
     * @param string $templateName
     * @param array $params
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function sendNotify($templateName, $params = [])
    {
        // Skip notifications on disable
        if ($this->isUnSubscribed && $templateName !== AuthConfirm::TEMPLATE_NAME) {
            return;
        }

        NotifierModule::getInstance()->send(new NotifierMessage([
            'templateName' => $templateName,
            'params' => $params,
            'destinations' => [
                NotifierModule::PROVIDER_TYPE_STORE => $this->id,
            ],
            'userId' => $this->id,
        ]));

        // Default provider
        // TODO
        /*$types = [NotifierModule::PROVIDER_TYPE_MAIL];

        // Resolve provider types
        switch ($templateName) {
            case AuthConfirm::TEMPLATE_NAME:
                $confirm = $params['confirm'];
                if ($confirm->type === AuthAttributeTypeEnum::PHONE && UserModule::getInstance()->enableSms) {
                    $types = [NotifierModule::PROVIDER_TYPE_SMS];
                }
                break;
        }

        // Send
        $params['user'] = $this;
        foreach ($types as $type) {
            $to = $type === NotifierModule::PROVIDER_TYPE_SMS ? $this->phone : $this->email;

            // Skip user without email/phone
            if (!$to) {
                continue;
            }

            NotifierModule::getInstance()->send($type, $templateName, $to, $params, $this->language);
        }*/
    }

    /**
     * @return Car|null
     */
    public function getLastCar()
    {
        if ($this->role !== UserRole::USER) {
            return null;
        }

        $carId = ScheduleShift::find()
            ->select('carId')
            ->where(['userId' => $this->id])
            ->andWhere(['<', 'fromTime', date('Y-m-d H:i:s')])
            ->orderBy(['toTime' => SORT_DESC])
            ->limit(1)
            ->scalar();

        return $carId ? Car::findOne(['id' => $carId]) : null;
    }

    public function beforeSave($insert)
    {
        if ($insert || $this->isAttributeChanged('passwordHash')) {
            $this->passwordHash = $this->passwordHash
                ? \Yii::$app->security->generatePasswordHash($this->passwordHash)
                : $this->getOldAttribute('passwordHash');
        }

        return parent::beforeSave($insert);
    }

    /**
     * @param string|null $month
     * @return TrackRating
     */
    public function getRating(string $month = null): TrackRating
    {
        return TrackRating::findOrCreateForUser($this->id, $month ?? date('Y-m'));
    }

    /**
     * @return TrackRating
     */
    public function getPrevRating()
    {
        return $this->getRating(date('Y-m', strtotime('-1 months')));
    }

}

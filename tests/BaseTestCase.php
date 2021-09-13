<?php

namespace tests;

use app\user\enums\Gender;
use steroids\core\base\FormModel;
use steroids\file\FileModule;
use steroids\file\models\FileImage;
use steroids\file\structure\UploadOptions;
use Yii;
use app\billing\enums\CurrencyEnum;
use app\billing\enums\SystemAccountName;
use app\billing\enums\UserAccountName;
use app\billing\models\BillingAccount;
use app\marketing\enums\MarketingUnitType;
use app\user\models\User;
use PHPUnit\Framework\TestCase;
use steroids\billing\operations\ManualOperation;
use yii\web\Request;

abstract class BaseTestCase extends TestCase
{
    public static int $counter = 0;

    protected array $models = [];

    protected function deleteModels()
    {
        foreach ($this->models as $model) {
            $model->delete();
        }
    }

    protected function createUser($params = [])
    {
        $pseudoUniqueUserNumber = $this->nextNumber();
        $user = new User(array_merge(
            [
                'email' => 'test' . $pseudoUniqueUserNumber . 'test@example.com',
                'phone' => '+7' . $pseudoUniqueUserNumber,
                'role' => 'user',
                'birthdate' => '1985-03-15',
                'gender' => Gender::MALE,
            ],
            $params
        ));
        $user->saveOrPanic();
        $this->models[] = $user;

        return $user;
    }

    /**
     * Returns pseudo-unique number with the length of 10, suitable for phone numbers
     *
     * @return int
     * @example 9998887766
     */
    protected function nextNumber()
    {
        $timeArray = explode('.', microtime(true));

        // Get last 6 digits of the Unix timestamp
        $secondsPart = substr($timeArray[0], -6);

        // Get first 4 digits of microseconds
        $microseconds = count($timeArray) === 2 ? $timeArray[1] : '';
        $microsecondsPart = substr(str_pad($microseconds, 4, '0'), 0, 4);

        return $secondsPart . $microsecondsPart;
    }

    /**
     * @param $method
     * @param null $userId
     * @param array $params
     * @return array|FormModel
     */
    protected function callApi($method, $userId = null, $params = [])
    {
        Yii::$app->set('user', new TestWebUser(['id' => $userId]));

        $parts = explode(' ', $method);
        $httpMethod = count($parts) > 1 ? strtoupper($parts[0]) : 'GET';
        $method = end($parts);

        $url = ($method ? '/' . ltrim($method, '/') : '');
        $request = new Request([
            'pathInfo' => $url,
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
        ]);
        $request->headers->set('X-Http-Method-Override', $httpMethod);
        Yii::$app->set('request', $request);

        if ($httpMethod === 'GET') {
            $request->setQueryParams($params);
            Yii::$app->request->setQueryParams($params);
            Yii::$app->request->setBodyParams([]);
        } else {
            Yii::$app->request->setQueryParams([]);
            Yii::$app->request->setBodyParams($params);
        }

        list($route, $routeParams) = Yii::$app->urlManager->parseRequest($request);
        return Yii::$app->runAction($route, array_merge($params, $routeParams));
    }
}

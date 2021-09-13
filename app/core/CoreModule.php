<?php

namespace app\core;

use steroids\core\base\Module;
use steroids\core\base\WebApplication;
use steroids\core\middleware\AccessMiddleware;
use steroids\core\middleware\AjaxResponseMiddleware;
use yii\base\BootstrapInterface;

class CoreModule extends Module implements BootstrapInterface
{
    /**
     * @param WebApplication $app
     */
    public function bootstrap($app)
    {
        if ($app instanceof WebApplication && !YII_ENV_TEST) {
            AccessMiddleware::register($app);
            AjaxResponseMiddleware::register($app);
        }
    }

}
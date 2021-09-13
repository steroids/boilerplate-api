<?php

require(STEROIDS_VENDOR_DIR . '/steroids/core/base/BaseYii.php');

use steroids\core\base\BaseYii;
use steroids\core\base\WebApplication;
use steroids\core\base\ConsoleApplication;
use app\core\base\FakeApplication;

class Yii extends BaseYii
{
    /**
     * @var WebApplication|ConsoleApplication|FakeApplication
     */
    public static $app;
}
